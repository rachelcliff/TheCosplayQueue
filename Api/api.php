<?php

header('Access-Control-Allow-Origin: https://localhost');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json'); // All echo statemes are json_encode

require('db.php'); $db = new cosplayQueueModel;
require('session.php'); $se = new cosplayQueueSession;

session_start();
// $_SESSION["login"] = "true";
// 	$_SESSION["loginID"] = 1;

// if(!isset($_SESSION['sessionOBJ'])) 
//         $_SESSION['sessionOBJ'] = new cosplayQueueSession; 

//         if($_SESSION['sessionOBJ']->Rate24HourCheck() === false) {
//             http_response_code(429);//Too Many Requests
//             die();
//         }
        

// Base Case
if(!isset($_GET['action'])) { //wrong usage
    http_response_code(501);
    die;
}
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        switch ($_GET["action"]){
            case "showDetails":
                if($_SESSION['sessionOBJ']->is_logged_in()) {
                    $result = $dbconn->showDetails();
                    if($result == false) {
                        http_response_code(204);
                    } elseif(is_array($result)) {
                        echo json_encode($result);
                    }
                } else {
                    http_response_code(401);
                }
                break;
            }
        }
else if($_SERVER["REQUEST_METHOD"] == "POST") {
	switch ($_POST["action"]) {
        case "join":
         
            $name = $_POST['namei'];
            $cosplay_name = $_POST['usernamei'];
            $facebook = $_POST['facebooki'];
            $instagram = $_POST['instagrami'];
            $phone = $_POST['phonei'];
            $email = $_POST['emaili'];
            $character_name = $_POST['characteri'];
            $series = $_POST['seriesi'];
            $genre = $_POST['genrei'];
            $r_group = $_POST['groupi'];
            $reference_photo = $_POST['photo'];
            $photo_taken = $_POST['photo_taken'];
            $date=date('Y-m-d H:i:s');
            $browserAgent = $_SERVER['HTTP_USER_AGENT'];
            $actiontype = $_POST['joini'];

            if(isset($cosplay_name)){
                $db->join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character_name, $series, $genre, $r_group, $reference_photo, $photo_taken, $date, $browserAgent, $actiontype);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
            break;

        case "login":
        $cosplay_name = $_POST['namel'];
        $password = $_POST['passwordl'];
            // http_response_code(404);

        if(isset($cosplay_name)){
            $db->login($cosplay_name, $password);
            http_response_code(202);
        }else{
            http_response_code(501);
        }
        break;

        case "signup":
            $name = $_POST['names'];
            $cosplay_name = $_POST['usernames'];
            $facebook = $_POST['facebooks'];
            $instagram = $_POST['instagrams'];
            $phone = $_POST['phones'];
            $email = $_POST['emails'];
            $password = $_POST['passwords'];
            $date=date('Y-m-d H:i:s');
            $browserAgent = $_SERVER['HTTP_USER_AGENT'];
            $actiontype = $_POST['registers'];

            if(isset($cosplay_name)){
                $db->signup($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
        break;
        case "update":
            $_SESSION['id'] = $userID;
            $name = $_POST['namer'];
            $cosplay_name = $_POST['usernamer'];
            $facebook = $_POST['facebookr'];
            $instagram = $_POST['instagramr'];
            $phone = $_POST['phoner'];
            $email = $_POST['emailr'];
            $password = $_POST['passwordr'];
            $date=date('Y-m-d H:i:s');
            $browserAgent = $_SERVER['HTTP_USER_AGENT'];
            $actiontype=$_POST['updater'];

            if($_SESSION["login"] == "true"){
            if(isset($cosplay_name)){
                $db->update($userID, $name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
            break;
	}
}
}
else if($_SERVER["REQUEST_METHOD"] == "UPDATE") {
    switch ($_UPDATE["action"]) {
        case "dequeue":
        http_response_code(201);
    break;
    }
} else {
    http_response_code(501);
}
?>