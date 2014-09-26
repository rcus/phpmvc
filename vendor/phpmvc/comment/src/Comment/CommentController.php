<?php

namespace Phpmvc\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;



    /**
     * View all comments.
     *
     * @return void
     */
    public function viewAction($page)
    {
        $comments = new \Phpmvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $all = $comments->findAll($page);

        $this->views->add('comment/comments', [
            'comments' => $all,
        ]);
    }



    /**
     * Get a comment.
     *
     * @param int $id id in comments[] for this comment.
     *
     * @return void
     */
    public function editAction($page, $id)
    {
        $comments = new \Phpmvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comment = $comments->findComment($page, $id);
        $comment['output']  = '<input type=hidden name="page" value="'.$page.'">';
        $comment['output'] .= '<input type=hidden name="id" value="'.$id.'">';

        $this->views->add('comment/form', $comment);
    }



    /**
     * Delete a comment.
     *
     * @param int $id id in comments[] for this comment.
     *
     * @return void
     */
    public function deleteAction($page, $id)
    {
        $comments = new \Phpmvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->delete($page, $id);

        $this->response->redirect($this->request->getBaseUrl().'/'.$page);
    }



    /**
     * Add a comment.
     *
     * @return void
     */
    public function addAction()
    {
        $isPosted = $this->request->getPost('doCreate');
        
        if (!$isPosted) {
            $this->response->redirect($this->request->getBaseUrl().'/'.$this->request->getPost('referer'));
        }

        $comment = [
            'content'   => $this->request->getPost('content'),
            'name'      => $this->request->getPost('name'),
            'web'       => $this->request->getPost('web'),
            'mail'      => $this->request->getPost('mail'),
            'timestamp' => time(),
            'ip'        => $this->request->getServer('REMOTE_ADDR'),
        ];

        $comments = new \Phpmvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $ifUpdate = $this->request->getPost('page');
        if (!$ifUpdate) {
            $comments->add($comment, $this->request->getPost('referer'));
        }
        else {
            $comments->update($comment, $this->request->getPost('id'), $this->request->getPost('page'));
        }

        $redirect = (!$ifUpdate) ? $this->request->getPost('referer') : $this->request->getPost('page');
        $this->response->redirect($this->request->getBaseUrl().'/'.$redirect);
    }



    /**
     * Remove all comments.
     *
     * @return void
     */
    public function removeAllAction()
    {
        $isPosted = $this->request->getPost('doRemoveAll');
        
        if (!$isPosted) {
            $this->response->redirect($this->request->getBaseUrl().'/'.$this->request->getPost('referer'));
        }

        $comments = new \Phpmvc\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->deleteAll($this->request->getPost('referer'));

        $this->response->redirect($this->request->getBaseUrl().'/'.$this->request->getPost('referer'));
    }
}
