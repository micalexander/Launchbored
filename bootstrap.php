<?php

require_once("config/parameters.php");
require_once('php/autoloader.php');
require_once('includes/functions.php');

// Load out custom autoloader file
spl_autoload_register('launchbored_autoload');

// Create global simple pie variable
$simplepie = new SimplePie();

$simplepie->enable_cache(true);
$simplepie->set_cache_location('cache');
$simplepie->set_cache_duration(1800); // Set the cache time

$database = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$current_page = (isset($_REQUEST['page']))
    ? $_REQUEST['page']
    : 'index';