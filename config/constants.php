<?php

// start the session
session_start();

define('HOME_URL', 'http://localhost/food-ordering-system/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');


$con = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());        //for connecting  localhost

$db_select = mysqli_select_db($con,DB_NAME) or die(mysqli_error());    //selecting database

?>