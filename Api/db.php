<?php
class cosplayQueueModel {
    private $dbconn;

    public function __construct()
    {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $this->dbconn = new PDO("mysql:host=$servername;dbname=cosplay_queue", $dbusername, $dbpassword);
        // set the PDO error mode to exception 
        // (debug - comment out in production)
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully!!";
    }
//join function
    function join($namei, $usernamei, $facebooki, $instagrami, $phonei, $emaili, $characteri, $seriesi, $genrei, $groupi, $photo) {
        try {
            $this->dbconn->beginTransaction();
            $stmt = $this->dbconn->prepare("INSERT INTO queue(name, username, facebook, instagram, phone, email, character, series, genre, group, photo) values (:name, :username, :facebook, :instagram, :phone, :email :character, :series, :genre, :group, :photo)");
            $stmt->bindValue(':name', $namei);
            $stmt->bindValue(':username', $usernamei);
            $stmt->bindValue(':facebook', $facebooki);
            $stmt->bindValue(':instagram', $instagrami);
            $stmt->bindValue(':phone', $phonei);
            $stmt->bindValue(':email', $emaili);
            $stmt->bindValue(':character', $characteri);
            $stmt->bindValue(':series', $seriesi);
            $stmt->bindValue(':genre', $genrei);
            $stmt->bindValue(':group', $groupi);
            $stmt->bindValue(':photo', $photo);
            $stmt->execute();
            $this->dbconn->commit();
        }
        catch (PDOException $ex){
            $this->dbconn->rollBack();
            throw $ex;
        }
    } 

    // login function
    function log-in($usernamel, $passwordl) {
        try {
            $this->dbconn->beginTransaction();
            $stmt = $this->dbconn->prepare("INSERT INTO logins(username, password) values (:username,:password)");
            $stmt->bindValue(':username', $usernamel);
            $stmt->bindValue(':password', $passwordl);
            $stmt->execute();
            $this->dbconn->commit();
        }
        catch (PDOException $ex) {
            $this->dbconn->rollback();
            throw $ex;
    }
}

        //new user function
        function sign-up($names, $usernames, $facebooks, $instagrams, $phones, $emails, $passwords) {
    
            try {
                $this->dbconn->beginTransaction();
                $stmt = $this->dbconn->prepare("INSERT INTO users(name, username, facebook, instagram, phone, email, password) values (:name, :username, :facebook, :instagram, :phone, :email :password)");
                $stmt->bindValue(':name', $names);
                $stmt->bindValue(':username', $usernames);
                $stmt->bindValue(':facebook', $facebooks);
                $stmt->bindValue(':instagram', $instagrams);
                $stmt->bindValue(':phone', $phones);
                $stmt->bindValue(':email', $emails);
                $stmt->bindValue(':password', $passwords);
                $stmt->execute();
                $this->dbconn->commit();
            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
        }
        
        //update user function
        function update($namer, $usernamer, $facebookr, $instagramr, $phoner, $emailr, $passwordr) {

            try {
                $this->dbconn->beginTransaction();
                $stmt = $this->dbconn->prepare("update users SET name=:name, cosplayName=:username, facebook=:facebook, instagram=:instagram, phone=:phone, email=:email, password=:password, values (:name, :username, :facebook, :instagram, :phone, :email :password)");
                $stmt->bindValue(':name', $namer);
                $stmt->bindValue(':username', $usernamer);
                $stmt->bindValue(':facebook', $facebookr);
                $stmt->bindValue(':instagram', $instagramr);
                $stmt->bindValue(':phone', $phoner);
                $stmt->bindValue(':email', $emailr);
                $stmt->bindValue(':password', $passwordr);
                $stmt->execute();
                $this->dbconn->commit();
            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
        }
}

// function checkLogin($username, $password) {
//     try {
//         $this->dbconn->beginTransaction();
//         $stmt=$conn->prepare("SELECT LoginID, Password, accessRights from login where username="username");
//         $stmt->bindParam(':user', $username);
//         $stmt->execute();
//         $row=$stmt ->fetch();
//         if (password_verify($password, $row['Password'])){

//             //assign session variables
//             $_SESSION["username"] = $username;
//             $_SESSION["LoginID"] = $row["LoginID"];
//             $_SESSION["login"] = 'yes';
//         }
// }

// catch (PDOException $ex) {
//     throw $ex;
// }
}

?>