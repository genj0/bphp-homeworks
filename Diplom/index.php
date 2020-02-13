<?php

include 'const.php';

if ($login === null) {
    header('Location: ./login.php');
}

$exit = (isset($_GET['exit'])) ? $_GET['exit'] : false;

if ($exit) {
    session_unset();
    session_destroy();
    header('Location: ./login.php');
}

include 'header.php';
include 'aside.php';

$render = new render($login, $employee, $employee_id, $filter, $query);

?>

    <div class="wrap">
        <h1 class="title">Информационная система «Бюро переводов»</h1>
        <?php echo $render->showRenderTasks() ?>
    </div>

<?php 

include 'footer.php';

?>