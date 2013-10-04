<?php
namespace Controller;

use Controller\BaseController;
use Doctrine\DBAL\Connection;


class MainController extends BaseController
{
    public function saveAction($data) {
        $query = "INSERT INTO comments  (`username`, `thumbnail`, `post_date`, `comment`, `approved`) VALUES (?, ?, NOW(), ?, 1)";
        $this->app['db']->executeUpdate($query, array($data['username'], $data['thumbnail'], $data['comment']));

        $returnData = array();
        /* @var Connection db */
        $db = $this->app['db'];
        $returnData['id'] = $db->lastInsertId();
        $returnData['username'] = $data['username'];
        $returnData['thumbnail'] = $data['thumbnail'];
        $returnData['comment'] = $data['comment'];

        return $returnData;
    }

    public function fetchAction(){
        $query = "SELECT * FROM comments WHERE approved = 1";
        $comments = $this->app['db']->fetchAll($query);
        return $comments;
    }


}