<?php
namespace Dao;

use Database\DBConnection;
use Model\ToDoList;

class ToDoDao
{
   public static function add($text)
   {
        if (!empty($_POST)) {
            $connection = DBConnection::getInstance();
            $queryInsert = "INSERT INTO tasks
							(task_text,task_status)
							VALUES (:task_text,:task_status);";
            $stm = $connection->prepare($queryInsert);
            $doit = $stm->execute([
                ':task_text' => $text->getTask(),
                ':task_status' => 0
            ]);

        }
   }

    public static function showAllTasks ()
    {
        $connection = DBConnection::getInstance();
        $queryTakeAll = "SELECT * FROM tasks ORDER BY task_id ASC ";
        $sth = $connection->prepare($queryTakeAll);
        $sth->execute();
        $row = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $row;


    }

    public static function deleteTasks($id)
    {
        $connection = DBConnection::getInstance();
        $query = 'DELETE  FROM tasks WHERE task_id=:id';
        $sth = $connection->prepare($query);
        $sth->execute([':id' => $id]);
        $count = $sth->rowCount();


    }

    public static function check($id)
    {
        $connection = DBConnection::getInstance();
        $query = 'UPDATE tasks
                  SET task_status=:task_status
                  WHERE task_id=:id;';
        $stm = $connection->prepare($query);
        $sucess = $stm->execute([
            ':task_status' => 1,
            ':id' => $id,
        ]);



    }
    public static function uncheck($id)
    {
        $connection = DBConnection::getInstance();
        $query = 'UPDATE tasks
                  SET task_status=:task_status
                  WHERE task_id=:id;';
        $stm = $connection->prepare($query);
        $sucess = $stm->execute([
            ':task_status' => 0,
            ':id' => $id,
        ]);
    }

    public static function itemsLeft ()
    {
        $numba = 0;
        $connection = DBConnection::getInstance();
        $queryTakeAll = "SELECT task_id FROM tasks WHERE task_status = :numba";
        $sth = $connection->prepare($queryTakeAll);
        $doit = $sth->execute([
            ':numba' => $numba,
        ]);
        $count = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return count($count);
    }

    public static function showDone ()
    {
        $numba = 1;
        $connection = DBConnection::getInstance();
        $queryTakeAll = "SELECT * FROM tasks WHERE task_status = :numba  ";
        $sth = $connection->prepare($queryTakeAll);
        $doit = $sth->execute([
            ':numba' => $numba,
        ]);
        $row = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
    public static function showLeft ()
    {
        $numba = 0;
        $connection = DBConnection::getInstance();
        $queryTakeAll = "SELECT * FROM tasks WHERE task_status = :numba  ";
        $sth = $connection->prepare($queryTakeAll);
        $doit = $sth->execute([
            ':numba' => $numba,
        ]);
        $row = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
}
