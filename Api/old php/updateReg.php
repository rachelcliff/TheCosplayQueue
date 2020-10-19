<?php
//update query statement
session_start();
require ("database-connect.php");
require ("functions.php");
require ("filterInput.php");
date_default_timezone_set('Australia/Brisbane');
$date=date('Y-m-d H:i:s');

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // DEBUG

if (!empty([$_POST])) {
    //input sanitation via filterInput
    //users table
    $name = testInput(($_POST['name']));
    $username = testInput(($_POST['username']));
    $facebook = testInput(($_POST['facebook']));
    $instagram = testInput(($_POST['instagram']));
    $phone = testInput(($_POST['phone']));
    $email = testInput(($_POST['email']));
    $password = testInput(($_POST['password']));
    $password-re = testInput(($_POST['password-re']));
    //function call
    if ($_REQUEST['actiontype'] == 'update') {
        //function call
        try {
            update($name, $username, $facebook, $instagram, $phone, $email, $password, $password-re);
            changelog($IP, $browser, $timestamp, $action);            
            $_SESSION['message']= " Updated Successfully";
            header('location:loginForm.php');
            }
        catch(PDOException $e) {
            echo  $e;
        }
    } else {
        $_SESSION['message'] = "Update Failed.";
        header('location:loginForm.php');
    }
}
?>