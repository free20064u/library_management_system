<?php
$hostname = 'localhost';
$user = 'root';
$password = '';
$database = 'wbm_zion';

$connection = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
