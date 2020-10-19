<?php
session_start();
require ("database-connect.php");
require ("functions.php");
require ("filterInput.php");
if (!empty([$_POST])) {
    $name = !empty($_POST['name']) ? testInput(($_POST['name'])) : null;
    $username = !empty($_POST['username']) ? testInput(($_POST['username'])) : null;
    $facebook = !empty($_POST['facebook']) ? testInput(($_POST['facebook'])) : null;
    $instagram = !empty($_POST['instagram']) ? testInput(($_POST['instagram'])) : null;
    $phone = !empty($_POST['phone']) ? testInput(($_POST['phone'])) : null;
    $email = !empty($_POST['email']) ? testInput(($_POST['email'])) : null;
    $password = !empty($_POST['password']) ? testInput(($_POST['password'])) : null;
    $password = !empty($_POST['password']) ? testInput(($_POST['password-re'])) : null;
    //password hashing
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = $conn->prepare("SELECT username FROM user WHERE username = :username");
    $query->bindValue(":username", $username);
    $query->execute();
    if ($query->rowCount() < 1) {
        newUser($name, $username, $facebook, $instagram, $phone, $email, $password, $password-re);
        echo "User Account has been created";
        header('location:signUpForm.php');
    } else {
        echo "User already exists";
        header('location: signUpForm.php');
    }
}
?>