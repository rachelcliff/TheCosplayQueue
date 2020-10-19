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

            //         $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, user_ID, actiontype) Values (:date, :browser, :user_id, :actiontype)");
            //    $stmt->bindValue(':date', $date);
            //   $stmt->bindValue(':browser', $browserAgent);
            //    $stmt->bindValue(':user_id', $lastuserID);
            //    $stmt->bindvalue(':actiontype', $actiontype);
            //     $stmt->execute();
            $this->dbconn->commit();
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
        }
    }

    // login function
    function login($cosplay_name, $password)
    {
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
                echo 'success';
            } else {
                echo "Cannot log in";
            }

            //  $lastuserID = $this->dbconn->$_SESSION["userID"];
            //         $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, actiontype user_ID) Values (:date, :browser, :actiontype :user_id)");
            //         $stmt->bindValue(':date', $date);
            //         $stmt->bindValue(':browser', $browserAgent);
            //         $stmt->bindValue(':actiontype', $actiontype);
            //         $stmt->bindValue(':user_id', $lastuserID);
            //         $stmt->execute();
            $this->dbconn->commit();
        } catch (PDOException $ex) {
            $this->dbconn->rollback();
            throw $ex;
        }
    }

    //new user function
    function signup($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype)
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

            // $lastuserID = $this->dbconn->lastInsertID();
            // $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, actiontype user_ID) Values (:date, :browser, :actiontype :user_id)");
            // $stmt->bindValue(':date', $date);
            // $stmt->bindValue(':browser', $browserAgent);
            // $stmt->bindValue(':actiontype', $actiontype);
            // $stmt->bindValue(':user_id', $lastuserID);
            // $stmt->execute();
            $this->dbconn->commit();
<<<<<<< HEAD:Api/Changes/db.php

            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
        }
        
        public function showDetails() {
			$query->$this->$dbconn->prepare("SELECT character, series, genre, r_group FROM queue");
            $result = $query->fetchAll();
            $result = Array(
                          Array('character_name'=>$character_name,
                                'series'=>$series,
                                'genre'=>$genre,
                                'r_group'=>$r_group),
                      );
            return $result;
=======
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
>>>>>>> origin/master:Api/db.php
        }
    }

<<<<<<< HEAD:Api/Changes/db.php
//update user function
        function update($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $user_id, $date, $browserAgent) {
            try {
                $this->dbconn->beginTransaction();
            $stmt= $this->dbconn->prepare("UPDATE users SET name, cosplay_name, facebook, instagram, phone, email, password values :name, :username, :facebook, :instagram, :phone, :email :password) WHERE user_id= :uid");

                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':cosplay_name', $cosplay_name);
                $stmt->bindValue(':facebook', $facebook);
                $stmt->bindValue(':instagram', $instagram);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $password);
                $stmt->bindValue(':user_id', $user_id);
				$stmt->bindValue(':uid', $_SESSION['user-id']);
                $stmt->execute();

                // $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, user_id) Values (:date, :browser, :user_id)");
                // $stmt->bindValue(':date', $date);
                // $stmt->bindValue(':browser', $browserAgent);
                // $stmt->bindValue(':user_id', $user_id);
                // $this->dbconn->commit();

                $this->dbconn->commit();
            }
            catch (PDOException $ex){
                $this->dbconn->rollBack();
                throw $ex;
            }
=======
    public function showDetails($character_name, $series, $genre, $r_group)
    {
        $result = array(
            array(
                'character_name' => $character_name,
                'series' => $series,
                'genre' => $genre,
                'r_group' => $r_group
            ),
        );
        return $result;
    }

    //update user function
    function update($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $user_id, $date, $browserAgent)
    {
        try {
            $this->dbconn->beginTransaction();
            $stmt = $this->dbconn->prepare("UPDATE users SET name=:name, cosplay_name=:cosplay_name, facebook=:facebook, instagram=:instagram, phone=:phone, email=:email, password=:password) WHERE user_id= :u_id");

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':cosplay_name', $cosplay_name);
            $stmt->bindValue(':facebook', $facebook);
            $stmt->bindValue(':instagram', $instagram);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':u_id', ($_SESSION['userID']));
            $stmt->execute();

            // $stmt = $this->dbconn->prepare("INSERT INTO changelog(date, browser, user_id) Values (:date, :browser, :user_id)");
            // $stmt->bindValue(':date', $date);
            // $stmt->bindValue(':browser', $browserAgent);
            // $stmt->bindValue(':user_id', $user_id);
            // $this->dbconn->commit();

            $this->dbconn->commit();
        } catch (PDOException $ex) {
            $this->dbconn->rollBack();
            throw $ex;
>>>>>>> origin/master:Api/db.php
        }
    }
}

// function dequeue($photo_taken) {
//     Try {
//         $this->dbconn->beginTransaction();
//         $stmt= $this->dbconn->prepare("UPDATE queue SET photo_taken=:photo_taken") values (:photo_taken);
//         value='void';


//     }
// }
