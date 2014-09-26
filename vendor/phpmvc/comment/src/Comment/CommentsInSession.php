<?php

namespace Phpmvc\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentsInSession implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;


    /**
     * Find and return all comments.
     *
     * @param string $page page for comments.
     *
     * @return array with all comments.
     */
    public function findAll($page)
    {
        $comments = $this->session->get('comments', []);
        return (isset($comments[$page])) ? $comments[$page] : [];
/*        if (isset($comments[$page])) {
            return $comments[$page];
        }
        else {
            return;
        }
*/    }



    /**
     * Add a new comment.
     *
     * @param array $comment with all details.
     * @param string $page page for comments.
     * 
     * @return void
     */
    public function add($comment, $page)
    {
        $comments = $this->session->get('comments', []);
        $comments[$page][] = $comment;
        $this->session->set('comments', $comments);
    }



    /**
     * Edit a comment.
     *
     * @param array $comment with all details.
     * @param int $id id in comments[] for this comment.
     * @param string $page page for comments.
     * 
     * @return void
     */
    public function update($comment, $id, $page)
    {
        $comments = $this->session->get('comments', []);
        $comments[$page][$id] = $comment;
        $this->session->set('comments', $comments);
    }



    /**
     * Find and return a comment.
     *
     * @param string $page page for comments.
     *
     * @return array with a comment.
     */
    public function findComment($page, $id)
    {
        $comments = $this->session->get('comments', []);
        return $comments[$page][$id];
    }



    /**
     * Delete a comment.
     *
     * @param string $page page for comments.
     *
     * @return void
     */
    public function delete($page, $id)
    {
        $comments = $this->session->get('comments', []);
        unset($comments[$page][$id]);
        $this->session->set('comments', $comments);
    }



    /**
     * Delete all comments.
     *
     * @param string $page page for comments.
     *
     * @return void
     */
    public function deleteAll($page)
    {
        $comments = $this->session->get('comments', []);
        unset($comments[$page]);
        $this->session->set('comments', $comments);
    }
}
