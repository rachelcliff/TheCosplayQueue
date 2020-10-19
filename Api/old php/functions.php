<?php
//database connection
$dbusername="root";
$dbpassword="";
try {
    $conn = new PDO("mysql:host=localhost;dbname=cosplayqueue", $dbusername, $dbpassword);
    //set attributes//
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

catch(PDOException $e)
{ 
    $error_message=$e->getMessage();
    ?>
    <h1>Database Connection Error</h1>
    <p>There was an error connecting to the database</p>
    <p>Error Message: <?php echo $error_message;?></p>
    <?php
    exit();
}

//maximum number of allowed requests
public function getRateLimit($request, $action)
{
    return [$this->rateLimit, 1]; // $rateLimit requests per second
}
//loads the number of allowed requests and the timestamp
public function loadAllowance($request, $action)
{
    return [$this->allowance, $this->allowance_updated_at];
}
//save allowance -> save number of allowed quests and the timestamp
public function saveAllowance($request, $action, $allowance, $timestamp)
{
    $this->allowance = $allowance;
    $this->allowance_updated_at = $timestamp;
    $this->save();
}

//changelog
function changelog($IP, $browser, $timestamp, $action) {
global $conn; 
try {
$IP = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
 $timestamp=date('Y-m-d H:i:s');
 echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
 $browser = get_browser(null, true);
 $stmt=$conn->prepare("INSERT INTO changelog(IP, browser, timestamp, action) Values (:IP, :browser, :timestamp, :action)");
 $stmt->bindValue(':IP', $IP);
 $stmt->bindValue(':browser', $browser);
 $stmt->bindValue(':timestamp', $timestamp);
 $stmt->bindValue(':action', $action);
 $stmt->execute();
  } catch(PDOException $ex) {
       throw $ex;
    }
}
//new user function
function newUser($name, $username, $facebook, $instagram, $phone, $email, $password, $password-re, $accessRights) {
    global $conn;
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("INSERT INTO users(name, username, facebook, instagram, phone, email, password, password-re, accessRights) values (:name, :username, :facebook, :instagram, :phone, :email :password, :password-re, :accessRights)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':facebook', $facebook);
        $stmt->bindValue(':instagram', $instagram);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':password-re', $password-re);
        $stmt->bindValue(':accessRights', $accessRights);
        $stmt->execute();
    }
    catch(PDOException $ex) {
        $conn->rollBack();
        throw $ex;
    }
    $conn = null;
}

//new user function
function update($name, $username, $facebook, $instagram, $phone, $email, $password, $password-re) {
    global $conn;
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("update users SET name=:name, cosplayName=:username, facebook=:facebook, instagram=:instagram, phone=:phone, email=:email, password=:password, passwordRe=:password-re) values (:name, :username, :facebook, :instagram, :phone, :email :password, :password-re)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':facebook', $facebook);
        $stmt->bindValue(':instagram', $instagram);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':password-re', $password-re);
        $stmt->bindValue(':accessRights', $accessRights);
        $stmt->execute();
    }
    catch(PDOException $ex) {
        $conn->rollBack();
        throw $ex;
    }
    $conn = null;
}

?>