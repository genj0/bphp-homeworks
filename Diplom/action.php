<?php

include 'const.php';

if ($login === null) {
    header('Location: ./login.php');
}

switch ($statusOfForm) {
    case 'done_translator':
        $status = 'check';
        break;
    case 'save_translator':
        $status = $status;
        break;
    case 'done_manager':
        $status = 'done';
        break;
    case 'finalize_manager':
        $status = 'finalize';
        break;
    case 'dont_change_manager':
        $status = $status;
        break;
    default:
        $status = 'new';
}

$action = new action($login, $employee_id, $idOfTask, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query);

if ($query->datatitle->last_task_id < $idOfTask) {
    $action->createTask();
} else {
    $action->writeTask();
}

$action->saveData();

header('Location: ./index.php');