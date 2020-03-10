<?php   

session_start();

const MANAGER = 1;
const TRANSLATOR = 2;

include 'autoload.php';
include 'сonfig/SystemConfig.php';

$data = new data();
$query = $data->readJson();
$login = (isset($_SESSION['login'])) ? $_SESSION['login'] : null;
$employee = (isset($_SESSION['employee'])) ? $_SESSION['employee'] : null;
$employee_id = (isset($_SESSION['employee_id'])) ? $_SESSION['employee_id'] : null;
$statusOfForm = (isset($_POST['statusOfForm'])) ? $_POST['statusOfForm'] : null;
$idOfTask = (isset($_POST['id'])) ? $_POST['id'] : null;
$status = (isset($_POST['status'])) ? $_POST['status'] : null;
$client = (isset($_POST['client'])) ? $_POST['client'] : null;
$translator = (isset($_POST['translator'])) ? $_POST['translator'] : null;
$date = (isset($_POST['date'])) ? $_POST['date'] : null;
$originalLang = (isset($_POST['original_lang'])) ? $_POST['original_lang'] : null;
$translationLanguages = (isset($_POST['translation_languages'])) ? $_POST['translation_languages'] : null;
$text = (isset($_POST['text'])) ? $_POST['text'] : null;
$translationTexts = (isset($_POST['translation_texts'])) ? $_POST['translation_texts'] : null;
$delete = (isset($_POST['statusOfForm'])) ? $_POST['statusOfForm'] : null;
$createTask = ($employee === MANAGER) ? '<li><a href="./task_page.php">Создать задачу</a></li>' : null;
$filter = isset($_GET['filter']) ? $_GET['filter'] : null;

?>