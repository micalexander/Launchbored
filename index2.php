<?php

// load bootstrap file
require('bootstrap.php');

// get controller
$controller = null;

// load the controller based on the current page as needed
switch ($current_page)
{
    case 'ajax': break;
    case 'index':
    default:
        $controller = new BoredController($database, $simplepie);
}

if ($controller)
{
    $controller->displayPage();
}


mysql_close($database->getConnection());