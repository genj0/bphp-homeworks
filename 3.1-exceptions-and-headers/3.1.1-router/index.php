<?php
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} /*else { или так :)
    header('Location: error.php', true, 400);
    include ('./error.php');
    
    return false;
}*/
include './Router.php';
$router = new Router($availableLinks);
try {   
    $checkPage = $router->isAvailablePage($page);
    echo "Вы находитесь на странице <b>$page</b>";
} catch (BadReq $e) {
    header('Location: ./error.php', true, 400);
    include ('./error.php');
} catch (NotFound $e) {
    header('Location: ./404.php', true, 404);
    include ('./404.php');
} 