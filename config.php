<?php

$current_page = end(explode('/', $_SERVER['REQUEST_URI']));

$dbname = 'library';
$dbuser = 'root';
$dbpass = '';
$dbserver = 'localhost';

ini_set('session.cookie_httponly', true);
session_start();
?>