<?php
namespace Controller;

use View\ToDoView;
use Dao\ToDoDao;

class BaseController
{
    public function render()
    {
        ToDoView::renderIndex(ToDoDao::showAllTasks());
    }
}