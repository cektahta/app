<?php
namespace View;

session_start();


class ToDoView
{
    public static function renderIndex($row, $count)
    {

        ?>

        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <head>
            <meta charset="UTF-8">
            <title>To Do List</title>
            <link rel="stylesheet" type="text/css" href="View/assets/css/reset.css">
            <link rel="stylesheet" type="text/css" href="View/assets/css/ViewStyle.css">
            <link rel="stylesheet" href="View/assets/font-awesome-4.7.0/css/font-awesome.min.css">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        </head>
        <body>
        <div class="wrapper">
            <form id="todoform" method="post" action="index.php?controller=todo&action=add">
                <input id="task" name="whattodo" placeholder="What needs to be done?">
            </form>
            <div class="answer-wrapper">
                <?php foreach ($row as $key => $value) : ?>
                    <?php $check = ""; ?>
                    <div class="answer">
                       <div class="answer-input">
                           <input
                               id="<?php echo $value['task_id']; ?>"
                               name="checked" type="checkbox"
                               <?php if ($value['task_status'] != 0): ?>
                                   <?= "checked"; ?>
                               <?php endif; ?>
                           >
                           <label for="<?php echo $value['task_id']; ?>"><?php echo $value['task_text']; ?></label>
                       </div>
                        <a href="index.php?controller=todo&action=delete&id=<?php echo $value['task_id']; ?>">
                             <span id="deletesign" class="fa fa-times fa-1x delete" aria-hidden="true">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="info">
                <div class="itemsleft">
                    <span><span id="itemscount"><?php echo $count; ?></span> Items left</span>
                </div>
                <div id="buttons">
                    <div class="stats">
                        <a href="index.php?controller=todo&action=done">
                            <p>Completed</p>
                        </a>
                    </div>
                    <div class="stats">
                        <a href="index.php?controller=todo&action=left">
                            <p>Active</p>
                        </a>
                    </div>
                    <div class="stats">
                        <a href="index.php?controller=todo&action=render">
                            <p>All</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="View/assets/js/script.js"></script>
        </body>
        </html>

        <?php
    }
}

?>