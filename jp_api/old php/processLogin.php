<?php
require ("filterInput.php");
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$conn = new PDO("mysql:host=localhost;dbname=portfolio", $dbusername, $dbpassword);
//debug only
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //debug
if (!empty($_POST)) {
    $username = testInput($_POST['username']);
    $password = testInput($_POST['password']);
    $stmt = $conn->prepare("SELECT * FROM login INNER JOIN users ON login.loginID = users.loginID WHERE username=:user");
    $stmt->bindParam(':user', $username);
    $stmt->execute();
    $row = $stmt->fetch();
    if (password_verify($password, $row['password'])) {
        //assign session variables
        $_SESSION["adminuser"] = $username;
        $_SESSION["loginID"] = $row['loginID'];
        $_SESSION["accessrights"] = $row["accessRights"];
        $_SESSION["login"] = 'yes';
        $_SESSION["userID"] = $row['userID'];

        $_SESSION['message']= "Welcome   . $_SESSION['adminuser']";
        header('location:../view/pages/dashboard.php');
    } else {
        echo "Cannot log in";
        header('location:../index.php');
    }
}
?>