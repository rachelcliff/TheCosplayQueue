<?php
class cosplayQueueModel {
    private $dbconn;

    public function __construct()
    {
        // $servername = "localhost";
        // $dbusername = "root";
        // $dbpassword = "";
        $this->dbconn = new PDO("mysql:host=localhost;dbname=cosplay_queue", "root", "");
        // set the PDO error mode to exception 
        // (debug - comment out in production)
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully!!";
    }
//join function
    function join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character, $series, $genre, $group, $photo, $photo_taken) {
        try {
            $this->dbconn->beginTransaction();
            $stmt = $this->dbconn->prepare("INSERT INTO users(name, cosplay_name, facebook, instagram, phone, email) values (:name, :cosplay_name, :facebook, :instagram, :phone, :email)");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':cosplay_name', $cosplay_name);
            $stmt->bindValue(':facebook', $facebook);
            $stmt->bindValue(':instagram', $instagram);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $lastuserID = $this->dbconn->lastInsertId();
            $stmt = $this->dbconn->prepare("INSERT INTO queue(character_name, series, genre, group_y/n, photo, userID) values (:character_name, :series, :genre, :group, :reference_photo, :userID)");
            $stmt->bindValue(':character_name', $character_name);
            $stmt->bindValue(':series', $series);
            $stmt->bindValue(':genre', $genre);
            $stmt->bindValue(':group_y/n', $group);
            $stmt->bindValue(':reference_photo', $photo);
            $stmt->bindValue(':photo_taken', $photo_taken);
            $stmt->bindValue(':userId', $lastuserID );
            $stmt->execute();
            $this->dbconn->commit();
        }
        catch (PDOException $ex){
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // login function
    function login($username, $password) {
        try {
            $this->dbconn->beginTransaction();
            $stmt = $this->dbconn->prepare("INSERT INTO logins(username, password) values (:username,:password)");
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $this->dbconn->commit();
        }
        catch (PDOException $ex) {
            $this->dbconn->rollback();
            throw $ex;
    }
}

        //new user function
        function signup($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password) {
    
            try {
                $this->dbconn->beginTransaction();
                $stmt = $this->dbconn->prepare("INSERT INTO users(name, cosplay_name, facebook, instagram, phone, email, password) values (:name, :cosplay_name, :facebook, :instagram, :phone, :email :password)");
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':cosplay_name', $cosplay_name);
                $stmt->bindValue(':facebook', $facebook);
                $stmt->bindValue(':instagram', $instagram);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $password);
                $stmt->execute();
                $this->dbconn->commit();
            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
        }
        
        //update user function
        function update($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password) {

            try {
                $this->dbconn->beginTransaction();
                $stmt = $this->dbconn->prepare("update users SET name=:name, cosplay_name=:cosplay_name, facebook=:facebook, instagram=:instagram, phone=:phone, email=:email, password=:password, values (:name, :username, :facebook, :instagram, :phone, :email :password)");
                $stmt->bindValue(':name', $namer);
                $stmt->bindValue(':cosplay_name', $cosplay_name);
                $stmt->bindValue(':facebook', $facebook);
                $stmt->bindValue(':instagram', $instagram);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $password);
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

?>