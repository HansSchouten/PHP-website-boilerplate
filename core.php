<?php
// debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// set locale
setlocale(LC_ALL, 'nl_NL');

// require functions
require_once dirname(__FILE__) . '/functions.php';

// database connection
$db_name = '';
$db_user = '';
$db_pass = '';
$db = new PDO('mysql:host=localhost;dbname='.$db_name, $db_user, $db_pass);