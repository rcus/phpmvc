<?php

namespace Anax\Users;

/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Users\User();
        $this->users->setDI($this->di);
        $this->theme->addStylesheet('css/users.css');
    }

    /**
     * List all users.
     *
     * @return void
     */
    public function indexAction()
    {
        // Check the status of the selector
        $sel = self::listSelector();
        if ($sel->check() === true) {
            $url = 'users';
            if (!empty($sel->value('view'))) {
                $url .= '/' . $sel->value('view');
            }
            $this->response->redirect($this->url->create($url));
        }
        
        $users = $this->users->findAll();

        $this->theme->setTitle("Alla användare");
        $this->views->add('users/list', [
            'users' => $users,
            'title' => "Alla användare",
            'selector' => $sel->getHTML()
        ], 'main-fullwidth');
    }

    /**
     * List all active and not deleted users.
     *
     * @return void
     */
    public function activeAction()
    {
        // Check the status of the selector
        $sel = self::listSelector("active");
        if ($sel->check() === true) {
            $url = 'users';
            if (!empty($sel->value('view'))) {
                $url .= '/' . $sel->value('view');
            }
            $this->response->redirect($this->url->create($url));
        }
        
        $users = $this->users->query()
            ->where('active IS NOT NULL')
            ->andWhere('deleted IS NULL')
            ->execute();
     
        $this->theme->setTitle("Aktiva användare");
        $this->views->add('users/list', [
            'users' => $users,
            'title' => "Aktiva användare",
            'selector' => $sel->getHTML()
        ], 'main-fullwidth');
    }

    /**
     * List all deactivated (and not deleted) users.
     *
     * @return void
     */
    public function deactivatedAction()
    {
        // Check the status of the selector
        $sel = self::listSelector("deactivated");
        if ($sel->check() === true) {
            $url = 'users';
            if (!empty($sel->value('view'))) {
                $url .= '/' . $sel->value('view');
            }
            $this->response->redirect($this->url->create($url));
        }
        
        $users = $this->users->query()
            ->where('active IS NULL')
            ->andWhere('deleted IS NULL')
            ->execute();

        $this->theme->setTitle("Inaktiverade användare");
        $this->views->add('users/list', [
            'users' => $users,
            'title' => "Inaktiverade användare",
            'selector' => $sel->getHTML()
        ], 'main-fullwidth');
    }

    /**
     * List all users in trash.
     *
     * @return void
     */
    public function trashAction()
    {
        // Check the status of the selector
        $sel = self::listSelector("trash");
        if ($sel->check() === true) {
            $url = 'users';
            if (!empty($sel->value('view'))) {
                $url .= '/' . $sel->value('view');
            }
            $this->response->redirect($this->url->create($url));
        }
        
        $users = $this->users->query()
            ->where('deleted IS NOT NULL')
            ->execute();

        $this->theme->setTitle("Användare i papperskorgen");
        $this->views->add('users/list', [
            'users' => $users,
            'title' => "Användare i papperskorgen",
            'selector' => $sel->getHTML()
        ], 'main-fullwidth');
    }

    /**
     * Get selector for listview
     *
     * @param string $selected current listview.
     *
     * @return string the selector.
     */
    private function listSelector($sel='index')
    {
        $selector = new \Mos\HTMLForm\CForm([], [
            'view' => [
                'type'    => 'select',
                'label'   => '',
                'options' => [
                    'index'       => 'Alla',
                    'active'      => 'Aktiva',
                    'deactivated' => 'Inaktiverade',
                    'trash'       => 'Papperskorgen'
                ],
                'value' => $sel
            ],
            'submit' => [
                'type'       => 'submit',
                'value'      => 'Visa',
                'callback'   => function ($selector) {
                    $selector->saveInSession = true;
                    return true;
                }
            ]
        ]);
        return $selector;
    }

    /**
     * List user with id.
     *
     * @param int $id of user to display
     *
     * @return void
     */
    public function idAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $user = $this->users->findID($id);
        //$user = $this->users->find(['id', $id]);

        $this->theme->setTitle("Visa användare");
        $this->views->add('users/view', [
            'user' => $user
        ]);
    }

    /**
     * Add new user.
     *
     * @return void
     */
    public function addAction()
    {
        // Get the form
        $form = self::userForm();

        // Check the status of the form
        $status = $form->check();
         
        if ($status === true) {
            $now = date('Y-m-d H:i:s');

            $this->users->save([
                'acronym' => $form->value('acronym'),
                'email' => $form->value('email'),
                'name' => $form->value('name'),
                'password' => password_hash( $form->value('password'), PASSWORD_DEFAULT),
                'created' => $now,
                'active' => $now,
            ]);

            $this->response->redirect($this->url->create('users'));

        }

        $this->theme->setTitle('Lägg till användare');
        $this->views->addString("<h1>Lägg till användare</h1>" . $form->getHTML(), 'main');
    }

    /**
     * Edit a user.
     *
     * @param integer $id of user to edit.
     *
     * @return void
     */
    public function editAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $user = $this->users->findID($id);

        // Get the form
        $form = self::userForm($user);

        // Check the status of the form
        $status = $form->check();
         
        if ($status === true) {
            $now = date('Y-m-d H:i:s');

            $this->users->save([
                'acronym' => $form->value('acronym'),
                'email' => $form->value('email'),
                'name' => $form->value('name'),
                'updated' => $now
            ]);

            if ($form->value('password') <> '') {
                $this->users->save([
                    'password' => password_hash( $form->value('password'), PASSWORD_DEFAULT)
                ]);
            }

            $this->response->redirect($this->url->create('users'));

        }

        $this->theme->setTitle('Ändra användare');
        $this->views->addString("<h1>Ändra användare</h1>" . $form->getHTML(), 'main');
    }

    /**
     * Userform.
     *
     * @param object $user user to edit.
     *
     * @return object the form.
     */
    private function userForm($user = null) {
        $info = null;
        if (!is_null($user)) {
            $info = $user->getProperties();
        }
        $form = new \Mos\HTMLForm\CForm([], [
                'name' => [
                    'type'       => 'text',
                    'label'      => 'Namn',
                    'value'      => $info['name'],
                    'validation' => ['not_empty']
                ],
                'acronym' => [
                    'type'       => 'text',
                    'label'      => 'Användarnamn',
                    'value'      => $info['acronym'],
                    'validation' => ['not_empty']
                ],
                'email' => [
                    'type'       => 'text',
                    'label'      => 'E-post',
                    'value'      => $info['email'],
                    'validation' => ['not_empty', 'email_adress']
                ],
                'password' => [
                    'type'       => 'password',
                    'label'      => 'Lösenord'
                ],
                'submit' => [
                    'type'       => 'submit',
                    'value'      => 'Skicka',
                    'callback'   => function ($form) {
                        $form->saveInSession = true;
                        return true;
                    }
                ]
            ]);
        return $form;
    }

    /**
     * Activate user.
     *
     * @param integer $id of user to activate.
     *
     * @return void
     */
    public function activateAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $now = date('Y-m-d H:i:s');

        $user = $this->users->findID($id);

        $user->active = $now;
        $user->save();

        $this->response->redirect($this->url->create('users'));
    }

    /**
     * Deactivate user.
     *
     * @param integer $id of user to deactivate.
     *
     * @return void
     */
    public function deactivateAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $user = $this->users->findID($id);

        $user->active = null;
        $user->save();

        $this->response->redirect($this->url->create('users'));
    }

    /**
     * Delete (soft) user.
     *
     * @param integer $id of user to delete.
     *
     * @return void
     */
    public function softDeleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }
     
        $now = date('Y-m-d H:i:s');
     
        $user = $this->users->findID($id);
     
        $user->deleted = $now;
        $user->save();

        $this->response->redirect($this->url->create('users'));
    }

    /**
     * Restore (soft-)deleted user.
     *
     * @param integer $id of user to restore.
     *
     * @return void
     */
    public function restoreAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $user = $this->users->findID($id);

        $user->deleted = null;
        $user->save();

        $this->response->redirect($this->url->create('users'));
    }

    /**
     * Delete user.
     *
     * @param integer $id of user to delete.
     *
     * @return void
     */
    public function deleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $this->users->delete($id);
        $this->response->redirect($this->url->create('users'));
    }

    /**
     * Restore database
     *
     * @return void
     */
    public function setupAction()
    {
        $this->db->dropTableIfExists('user')->execute();
        $this->db->createTable(
            'user',
            [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'acronym' => ['varchar(20)', 'unique', 'not null'],
                'email' => ['varchar(80)'],
                'name' => ['varchar(80)'],
                'password' => ['varchar(255)'],
                'created' => ['datetime'],
                'updated' => ['datetime'],
                'deleted' => ['datetime'],
                'active' => ['datetime'],
            ]
        )->execute();
        $this->db->insert(
            'user',
            ['acronym', 'email', 'name', 'password', 'created', 'active']
        );
        $now = date('Y-m-d H:i:s');     // DATE_RFC2822
        $this->db->execute([
            'admin',
            'admin@dbwebb.se',
            'Administrator',
            password_hash('admin', PASSWORD_DEFAULT),
            $now,
            $now
        ]);
        $this->db->execute([
            'doe',
            'doe@dbwebb.se',
            'John/Jane Doe',
            password_hash('doe', PASSWORD_DEFAULT),
            $now,
            $now
        ]);
        $this->response->redirect($this->url->create('users'));
    }
}