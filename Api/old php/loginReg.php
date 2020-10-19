<?php
require("database-connect.php");
require("functions.php");
require("filterInput.php");
//date_default_timezone_set('Australia/Brisbane');
//$date=date('Y-m-d H:i:s');

if (!empty([$_POST])) {
//input sanitation via filterInput
//login table
$name = testInput($_POST['name']);
$password= testInput($_POST['password']);

if($_POST['actiontype']== 'add') {
    //$query=$conn->prepare("select name, password from user where name=:name and password=:password");
    $query->bindValue(':name', $name);
    $query->bindValue(':password', $password);
    $query->execute();
    $row=$query->fetch();
    
   //function call
   if ($_REQUEST['actiontype'] == 'login') {
    //function call
    try {
        changelog($IP, $browser, $timestamp, $action);
        $_SESSION['message']= "Success";
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
?>