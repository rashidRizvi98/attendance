<?php
//development connection
$host = 'localhost';
$db = 'attendance_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

//remote database connnection
//$host = 'remotemysql.com';
//$db = 'wolfTuNUbm';
//$user = 'wolfTuNUbm';
//$pass = '6SlBw3OOOH';
//$charset = 'utf8mb4';


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';

$crud = new crud($pdo);
$user = new user($pdo);

$user->insertUser("admin","passsword");
?>