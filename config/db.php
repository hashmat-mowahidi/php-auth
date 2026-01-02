<?php

$host = 'localhost';
$dbname = 'user_auth';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create database if not exists
    $pdo->exec("create database if not exists ". $dbname);
    $pdo->exec("use ". $dbname);

} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}