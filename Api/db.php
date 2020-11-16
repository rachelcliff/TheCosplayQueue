<?php
class cosplayQueueModel
{
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
        // echo "Connected successfully!!";
    }
    //join function
    function join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character_name, $series, $genre, $r_group, $reference_photo, $photo_taken, $date, $browserAgent, $actiontype)
    {
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
            $stmt = $this->dbconn->prepare("INSERT INTO queue(character_name, series, genre, r_group, reference_photo, photo_taken, user_id) values (:character_name, :series, :genre, :r_group, :reference_photo, :photo_taken, :user_id)");
            $stmt->bindValue(':character_name', $character_name);
            $stmt->bindValue(':series', $series);
            $stmt->bindValue(':genre', $genre);
            $stmt->bindValue(':r_group', $r_group);
            $stmt->bindValue(':reference_photo', $reference_photo);
            $stmt->bindValue(':photo_taken', $photo_taken);
            $stmt->bindValue(':user_id', $lastuserID);
            $stmt->execute();

            $lastqueueID = $this->dbconn->lastInsertId();
            $_SESSION["character_name"] = $character_name;
            $_SESSION["series"] = $series;
            $_SESSION["genre"] = $genre;
            $_SESSION["r_group"] = $r_group;
            $_SESSION["userID"] = $lastuserID;
            $_SESSION["queueID"] = $lastqueueID;
            $_SESSION["join"] = "true";
         
            $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, user_id, actiontype) Values (:date, :browser, :user_id, :actiontype)");
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':browser', $browserAgent);
            $stmt->bindValue(':user_id', $lastuserID);
            $stmt->bindvalue(':actiontype', $actiontype);
            $stmt->execute();

            $this->dbconn->commit();
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    //new user function
    function register($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype)
    {

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

            $lastuserID = $this->dbconn->lastInsertID();
            $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, actiontype, user_ID) Values (:date, :browser, :actiontype, :user_id)");
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':browser', $browserAgent);
            $stmt->bindValue(':actiontype', $actiontype);
            $stmt->bindValue(':user_id', $lastuserID);
            $stmt->execute();

            $_SESSION["cosplay_name"] = $cosplay_name;
            $_SESSION["name"] = $name;
            $_SESSION["facebook"] = $facebook;
            $_SESSION["instagram"] = $instagram;
            $_SESSION["userID"] = $lastuserID;
            $_SESSION["phone"] = $phone;
            $_SESSION["email"] = $email;
            $_SESSION["login"] = 'true';
            

            $this->dbconn->commit();
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // login function
    function login($cosplay_name, $password, $date, $browserAgent, $actiontype)
    {
        try {
            $this->dbconn->beginTransaction();
            $stmt = $this->dbconn->prepare("SELECT logins.cosplay_name, logins.password, logins.login_id, users.user_id, users.name, users.facebook, users.instagram, users.phone, users.email FROM logins inner join users on logins.login_id = users.login_id WHERE logins.cosplay_name = :cosplay_name");
            $stmt->bindParam(':cosplay_name', $cosplay_name);
            $stmt->execute();
            $row = $stmt->fetch();

            if (password_verify($password, $row['password'])) {
                $_SESSION["cosplay_name"] = $cosplay_name;
                $_SESSION["loginID"] = $row['login_id'];
                $_SESSION["login"] = 'true';
                $_SESSION['userID'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['facebook'] = $row['facebook'];
                $_SESSION['instagram'] = $row['instagram'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['email'] = $row['email'];

                $userID = $_SESSION["userID"];
                $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, actiontype, user_ID) Values (:date, :browser, :actiontype, :user_id)");
                $stmt->bindValue(':date', $date);
                $stmt->bindValue(':browser', $browserAgent);
                $stmt->bindValue(':actiontype', $actiontype);
                $stmt->bindValue(':user_id', $userID);
                $stmt->execute();
                $this->dbconn->commit();

                return true;
            } else {
                echo "Cannot log in";
                return false;
            }
        } catch (PDOException $ex) {
            $this->dbconn->rollback();
            throw $ex;
        }
    }

    public function showDetails()
    {
        $user_id = $_SESSION['userID'];
        $query = $this->dbconn->prepare("SELECT character_name, series, genre, r_group, reference_photo FROM queue where user_id = $user_id");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showDetailsAll()
    {
        $query = $this->dbconn->prepare("SELECT character_name, series, genre, r_group FROM queue");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    //update user function
    function update($user_id, $name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype)
    {
        try {
            $this->dbconn->beginTransaction();
            $user_id = $_SESSION['userID'];
            $stmt = $this->dbconn->prepare("UPDATE users SET name=:name, cosplay_name=:cosplay_name, facebook=:facebook, instagram=:instagram, phone=:phone, email=:email WHERE user_id=:user_id");

            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':cosplay_name', $cosplay_name);
            $stmt->bindValue(':facebook', $facebook);
            $stmt->bindValue(':instagram', $instagram);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $_SESSION["name"] = $name;
            $_SESSION['cosplay_name'] = $cosplay_name;
            $_SESSION['facebook'] = $facebook;
            $_SESSION['instagram'] = $instagram;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;


            $login_id = $_SESSION['loginID'];
            $stmt = $this->dbconn->prepare("UPDATE logins SET cosplay_name=:cosplay_name, password=:password WHERE login_id =:login_id");
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindValue(':login_id', $login_id);
            $stmt->bindValue(':cosplay_name', $cosplay_name);
            $stmt->bindValue(':password', $password);
            $stmt->execute();

            $user_id = $_SESSION['userID'];
            $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, actiontype, user_id) Values (:date, :browser, :actiontype, :user_id)");
            $stmt->bindValue(':date', $date);
            $stmt->bindValue(':browser', $browserAgent);
            $stmt->bindValue(':actiontype', $actiontype);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->execute();
            $this->dbconn->commit();
            return;
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // Function dequeue
    function dequeue($user_id, $photo_taken)
    {
        try {
            $user_id = $_SESSION['userID'];
            $stmt = $this->dbconn->prepare("UPDATE queue SET photo_taken=:photo_taken WHERE user_id=:user_id");
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':photo_taken', $photo_taken);
            $stmt->execute();
            return;
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // Photo Taken - admin panel
    function photo_taken($user_id, $photo_taken)
    {
        try {
            $user_id = $_SESSION['userID'];
            $stmt = $this->dbconn->prepare("UPDATE queue SET photo_taken=:photo_taken WHERE user_id=:user_id");
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':photo_taken', $photo_taken);
            $stmt->execute();
            return;
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // function place in queue
    function placequeue()
    {
        try {
            $this->dbconn->beginTransaction();
            $lastqueueID = $_SESSION['queueID'];
            // $user_id = $_SESSION['userID'];
            $stmt = $this->dbconn->prepare("SELECT COUNT(user_id) as place FROM queue WHERE photo_taken = 'no' AND queue_id <= $lastqueueID");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }
}