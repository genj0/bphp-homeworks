<?php
/**
 * frontfile of order create
 *
 * @var array $menu
 * @var array $post
 */
require_once 'const.php';
require_once 'loadJSON.php';
require_once 'renderView.php';
require_once 'CountSum.php';
$menu = loadJSON('menu');
$post = $_POST;
$countSum = new CountSum($menu, $post);
renderView('default','order', [ 'order' => $countSum->countTotalAmount() ]);