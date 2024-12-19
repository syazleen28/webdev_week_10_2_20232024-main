<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'Database.php';
include 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);

$db->close();
header("Location: read.php");
exit();
?>
