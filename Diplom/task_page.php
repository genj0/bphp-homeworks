<?php

include 'const.php';

if ($login === null) {
    header('Location: ./login.php');
}

if ($delete === 'delete_manager') {
    $delete = new action($login, $employee_id, $idOfTask, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query);
    $delete->deleteTask(); 
    $delete->saveData();
    header('Location: ./index.php');
}

if ($employee === MANAGER) {
    $task = new taskManager($login, $employee_id, $idOfTask, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query);
} else {
    $task = new taskTranslator($login, $employee_id, $idOfTask, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query);
}

$refFilter = preg_replace('/\w.+[?]\w+[=]/', '', $_SERVER['HTTP_REFERER']);

include 'header.php';
include 'aside.php';

?>

    <div class="wrap">
        <h1 class="title">Информационная система «Бюро переводов»</h1>
        <?php echo $task->showTask($refFilter) ?>
    </div>

<?php

include 'footer.php';

?>