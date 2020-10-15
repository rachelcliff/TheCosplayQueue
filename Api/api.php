<?php
// session_start();
// session_destroy();

header('Access-Control-Allow-Origin: https://localhost');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json'); // All echo statemes are json_encode

require('db.php'); $db = new cosplayQueueModel;
require('session.php'); $se = new cosplayQueueSession;


// echo "testing";
// die;


// Base Case
if(!isset($_GET['action'])) { //wrong usage
    http_response_code(501);
    die;
}

$_SESSION["login"] = "true";
	$_SESSION["loginID"] = 1;
    
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        switch ($_GET["action"]){
            case "login":
                http_response_code(202);
				
                break;
            case "viewfix":				
				http_response_code(418);
				
                break;
            case "viewlad":
				http_response_code(200);
				
                break;
            case "prefill":
				http_response_code(200);
				
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

            // http_response_code(404);

            if(isset($cosplay_name)){
                $db->join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character_name, $series, $genre, $r_group, $reference_photo, $photo_taken);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
            break;

        case "login":
        $cosplay_name = $_POST['namel'];
        $password = $_POST['passwordl'];

        if(isset($username)){
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

            if(isset($cosplay_name)){
                $db->signup($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
        break;
        case "update":
            $name = $_POST['namer'];
            $cosplay_name = $_POST['usernamer'];
            $facebook = $_POST['facebookr'];
            $instagram = $_POST['instagramr'];
            $phone = $_POST['phoner'];
            $email = $_POST['emailr'];
            $password = $_POST['passwordr'];

            if($_SESSION["login"] == "true"){
            if(isset($cosplay_name)){
                $db->update($userID, $name, $cosplay_name, $facebook, $instagram, $phone, $email, $password);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
            break;
	}
} }
else if($_SERVER["REQUEST_METHOD"] == "UPDATE") {
    switch ($_DELETE["action"]) {
        case "dequeue":
        http_response_code(201);
    break;
    }
} else {
    http_response_code(501);
}
