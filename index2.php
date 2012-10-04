<?php

// load bootstrap file
require('bootstrap.php');

// get controller
$controller = null;

// load the controller based on the current page as needed
switch ($current_page)
{
    case 'ajax': break;
    default:
        $current_page = 'homepage';
        $controller = new BoredController($database, $simplepie, $view);
}

$view->assign('current_page', $current_page);

if ($controller)
{
    $controller->displayPage();
}


mysql_close($database->getConnection());