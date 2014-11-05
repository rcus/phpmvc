<?php

namespace Anax\Comments;
 
/**
 * Model for Comments.
 *
 */
class CComments extends \Anax\MVC\CDatabaseModel
{

    /**
     * Find and return specific.
     *
     * @param string $page find comments in a page
     *
     * @return array
     */
    public function findComments($page)
    {
        $this->db->select()
                 ->from($this->getSource())
                 ->where("page = ?");

        $this->db->execute([$page]);
        $this->db->setFetchModeClass(__CLASS__);
        return $this->db->fetchAll();
    }

    /**
     * If exists, drop table, then create a new in the database
     *
     * @param mixed $dummy If variable is not null, there will be dummycomments in the table.
     *
     * @return void
     */
    public function createCommentsTable($dummy = null)
    {
        $this->db->dropTableIfExists($this->getSource())->execute();
        $this->db->createTable(
            $this->getSource(),
            [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'page' => ['varchar(20)', 'not null'],
                'content' => ['text', 'not null'],
                'name' => ['varchar(80)'],
                'email' => ['varchar(80)'],
                'web' => ['varchar(80)'],
                'time' => ['datetime'],
                'ip' => ['varchar(15)']
            ]
        )->execute();

        if (!is_null($dummy)) {
            $this->dummyComments();
        }
    }

    /**
     * Insert dummycomments into the table
     *
     * @return void
     */
    public function dummyComments()
    {
        $this->db->insert(
            $this->getSource(),
            ['page', 'content', 'name', 'email', 'web', 'time', 'ip']
        );
        $now = date('Y-m-d H:i');
        $this->db->execute([
            '',
            'Lämna gärna en kommentar!',
            'Marcus Törnroth',
            'm@rcus.se',
            'http://www.student.bth.se/~matg12/phpmvc',
            $now,
            '100.100.100.100'
        ]);
        $this->db->execute([
            'kmom04',
            'Ett första meddelande',
            'Marcus Törnroth',
            'm@rcus.se',
            'http://www.student.bth.se/~matg12/phpmvc',
            $now,
            '100.100.100.100'
        ]);
        $this->db->execute([
            'kmom04',
            'Och ett andra. Pröva att ta bort detta...',
            'Marcus Törnroth',
            'm@rcus.se',
            'http://www.student.bth.se/~matg12/phpmvc',
            $now,
            '100.100.100.100'
        ]);
    }

}