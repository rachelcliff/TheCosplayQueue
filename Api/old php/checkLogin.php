<?php
function checkLogin($username, $password) {
    global $conn;
    try {
        $stmt=$conn->prepare("SELECT LoginID, Password, accessRights from login where Username="username");
        $stmt->bindParam(':user', $username);
        $stmt->execute();
        $row=$stmt ->fetch();
        if (password_verify($password, $row['Password'])){

            //assign session variables
            $_SESSION["username"] = $username;
            $_SESSION["LoginID"] = $row["LoginID"];
            $_SESSION["login"] = 'yes';
        }
}

catch (PDOException $ex) {
    throw $ex;
}
}

?>