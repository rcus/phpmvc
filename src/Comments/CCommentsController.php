<?php

namespace Anax\Comments;

/**
 * A controller for comments.
 *
 */
class CCommentsController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->comments = new \Anax\Comments\CComments();
        $this->comments->setDI($this->di);
    }

    /**
     * View all comments in a page.
     * Puts comments in a array and sends to the viewtemplate.
     *
     * @param string $page Gets current page.
     *
     * @return void
     */
    public function indexAction($page = '')
    {
        // Get the form
        $form = self::commentsForm();

        // Check the status of the form
        $status = $form->check();

        if ($status === true) {
            $now = date('Y-m-d H:i');

            $this->comments->save([
                'page'    => $page,
                'content' => $form->value('content'),
                'name'    => $form->value('name'),
                'email'   => $form->value('email'),
                'web'     => $form->value('web'),
                'time'    => $now,
                'ip'      => $this->request->getServer('REMOTE_ADDR')
            ]);

            $this->response->redirect($this->url->create($page));
        }

        $comments = $this->comments->findComments($page);
        $this->views->add('comments/comments', [
            'comments' => $comments
        ]);

        $this->views->addString("<h3>Lämna en kommentar</h3>" . $form->getHTML());
    }

    /**
     * Edit a comment.
     *
     * @param string $page Name of the page where the comment is placed.
     * @param int $id ID of the comment.
     *
     * @return void
     */
    public function editAction($page = '', $id)
    {
        $comment = $this->comments->findID($id);

        // Get the form
        $form = self::commentsForm($comment);

        // Check the status of the form
        $status = $form->check();

        if ($status === true) {
            $this->comments->save([
                'id'      => $id,
                'page'    => $page,
                'content' => $form->value('content'),
                'name'    => $form->value('name'),
                'email'   => $form->value('email'),
                'web'     => $form->value('web'),
            ]);

            $this->response->redirect($this->url->create($page));
        }

        $this->views->addString("<h3>Redigera kommentaren</h3>" . $form->getHTML());
    }

    /**
     * Delete a comment from the database.
     *
     * @param string $page Get referral page.
     * @param int $id Get the ID of the comment to delete.
     *
     * @return void
     */
    public function deleteAction($page, $id)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $this->comments->delete($id);
        $this->response->redirect($this->url->create($page));
    }

    /**
     * Reset the database
     *
     * @param string @param If set, some dummycomments will be inserted in the database
     *
     * @return void
     */
    public function setupAction($param = null)
    {
        $this->comments->createCommentsTable($param);
        $this->response->redirect($this->url->create(''));
    }

    /**
     * Commentform.
     *
     * @param object $comment Comment to edit.
     *
     * @return object The form.
     */
    private function commentsForm($comment = null) {
        if (!is_null($comment)) {
            $comment = $comment->getProperties();
        }
        $form = new \Mos\HTMLForm\CForm([], [
                'content' => [
                    'type'       => 'textarea',
                    'label'      => 'Kommentar',
                    'value'      => $comment['content'],
                    'validation' => ['not_empty']
                ],
                'name' => [
                    'type'       => 'text',
                    'label'      => 'Namn',
                    'value'      => $comment['name'],
                    'validation' => ['not_empty']
                ],
                'email' => [
                    'type'       => 'text',
                    'label'      => 'E-post',
                    'value'      => $comment['email'],
                    'validation' => ['email_adress']
                ],
                'web' => [
                    'type'       => 'text',
                    'label'      => 'Hemsida',
                    'value'      => $comment['web']
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
}