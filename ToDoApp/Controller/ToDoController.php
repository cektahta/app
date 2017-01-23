<?php
namespace Controller;

use View\ToDoView;
use Dao\ToDoDao;
use Model\ToDoList;

class ToDoController
{
    public function render()
    {
        ToDoView::renderIndex(ToDoDao::showAllTasks(),ToDoDao::itemsLeft());
    }
    public function add()
    {
        $text = $_POST['whattodo'];
        var_dump($text);
        $task = new ToDoList($text);
        ToDoDao::add($task);
        $errors = [];
        if (empty($errors)) {
            header("Location: index.php?controller=todo&action=render");
        } else {
            echo "something went wrong";
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        ToDoDao::deleteTasks($id);
        $errors = [];
        if (empty($errors)) {
            header("Location: index.php?controller=todo&action=render");
        } else {
            echo "something went wrong";
        }
    }

    public function update ()
    {
        $id = $_GET['id'];
        $checked = $_GET['checked'];
        if ($checked == 1) {
            ToDoDao::check($id);
        } else {
            ToDoDao::uncheck($id);
        }

        echo ToDoDao::itemsLeft();
    }

    public function done()
    {
        ToDoView::renderIndex(ToDoDao::showDone(),ToDoDao::itemsLeft());
    }
    public function left()
    {
        ToDoView::renderIndex(ToDoDao::showLeft(),ToDoDao::itemsLeft());
    }
}


