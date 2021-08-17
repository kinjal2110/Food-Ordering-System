<?php
// includes constants.php
include('../config/constants.php');

// destroy the session 
session_destroy();

// redirect to login page
header('Location: '.HOME_URL.'admin/login.php');
include('../config/constants.php')
?>