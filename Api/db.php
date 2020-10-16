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
    function join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character_name, $series, $genre, $r_group, $reference_photo, $photo_taken) {
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
            $stmt = $this->dbconn->prepare("INSERT INTO queue(character_name, series, genre, r_group, reference_photo, photo_taken, user_ID) values (:character_name, :series, :genre, :r_group, :reference_photo, :photo_taken, :user_ID)");
            $stmt->bindValue(':character_name', $character_name);
            $stmt->bindValue(':series', $series);
            $stmt->bindValue(':genre', $genre);
            $stmt->bindValue(':r_group', $r_group);
            $stmt->bindValue(':reference_photo', $reference_photo);
            $stmt->bindValue(':photo_taken', $photo_taken);
            $stmt->bindValue(':user_ID', $lastuserID );
            $stmt->execute();
            $this->dbconn->commit();
        }
        catch (PDOException $ex){
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // login function
    function login($cosplay_name, $password) {
        try {
     $this->dbconn->beginTransaction();           
    $stmt = $this->dbconn->prepare("SELECT * FROM logins  WHERE cosplay_name=:cosplay_name");
    $stmt->bindParam(':cosplay_name', $cosplay_name);
    $stmt->execute();
    $row = $stmt->fetch();
    if (password_verify($password, $row['password'])) {
        $_SESSION["cosplay_name"] = $cosplay_name;
        $_SESSION["loginID"] = $row['loginID'];
        $_SESSION["login"] = 'yes';
        $_SESSION["userID"] = $row['userID'];

    } else {
        echo "Cannot log in";
    }
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
            $stmt = $this->dbconn->prepare("INSERT INTO logins(cosplay_name, password) values (:cosplay_name,:password)");
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindValue(':cosplay_name', $cosplay_name);
            $stmt->bindValue(':password', $password);
            $stmt->execute();

            $lastloginID = $this->dbconn->lastInsertId();
            $stmt = $this->dbconn->prepare("INSERT INTO users(name, cosplay_name, facebook, instagram, phone, email, login_id) values (:name, :cosplay_name, :facebook, :instagram, :phone, :email, :login_id)");
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':cosplay_name', $cosplay_name);
            $stmt->bindValue(':facebook', $facebook);
            $stmt->bindValue(':instagram', $instagram);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':login_id', $lastloginID);
            $stmt->execute();
            $this->dbconn->commit();

            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
        }
        
        // public function showDetails() {
        //     $result = Array(
        //                   Array('character_name'=>$character_name,
        //                         'series'=>$_series,
        //                         'genre'=>$_genre,
        //                         'r_group'=>$r_group),
        //               );
        //     return $result;
        // }

        //update user function
        function update($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $user_ID) {
            try {
                $this->dbconn->beginTransaction();
                $stmt = $this->dbconn->prepare("UPDATE users SET name=:name, cosplay_name=:cosplay_name, facebook=:facebook, instagram=:instagram, phone=:phone, email=:email, password=:password, userID=:userID values (:name, :username, :facebook, :instagram, :phone, :email :password) WHERE user_ID = :user_ID");

                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':cosplay_name', $cosplay_name);
                $stmt->bindValue(':facebook', $facebook);
                $stmt->bindValue(':instagram', $instagram);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':user_ID', $user_ID);
                $stmt->execute();


                $this->dbconn->commit();
            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
        }
}

// //changelog
// function changelog($browser, $date, $action, $user_ID) {
//     try {
//         $date=date('Y-m-d H:i:s');
//         $browserAgent = $_SERVER['HTTP_USER_AGENT'];
// echo $browserAgent;
//         $this->dbconn->beginTransaction();
//        $stmt=$conn->prepare("INSERT INTO changelog(date, browser, action, user_ID) Values (:date, :browser, :action, :user_ID)");
//        $stmt->bindValue(':date', $date);
//       $stmt->bindValue(':browser', $browserAgent);
//        $stmt->bindValue(':action', $action);
//        $stmt->bindValue(':user_ID', $user_ID);
//         $stmt->execute();
//     }
//     catch(PDOException $ex) {
//         throw $ex;
//    }
// }

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