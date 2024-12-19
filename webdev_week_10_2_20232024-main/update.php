<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $updateResult = $user->updateUser($matric, $name, $role);

    $db->close();

    if ($updateResult === true) {
        header("Location: read.php?message=update_success");
        exit();
    } else {
        echo "Error updating user: " . $updateResult;
    }
}
?>
