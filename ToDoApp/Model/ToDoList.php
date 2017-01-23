<?php
namespace Model;
class ToDoList
{
    private $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }
}