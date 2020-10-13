<?php
header('Access-Control-Allow-Origin: https://localhost');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json'); // All echo statemes are json_encode

require('db.php'); $db = new cosplayQueueModel;
require('session.php'); $se = new cosplayQueueSession;

session_start();

// Base Case
if(!isset($_GET['action'])) { //wrong usage
    http_response_code(501);
    die;
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    switch ($_GET["action"]) {
        case "login":
            http_response_code(202);
        break;
        case "display-place":
            http_response_code(202);
        break;
        case "refresh":
            http_response_code(202);
        break;
        case "autofill":
            http_response_code(202);
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
            $group = $_POST['groupi'];
            $photo = $_POST['photo'];
            $photo_taken = $_POST['photo_taken'];

            // http_response_code(404);

            if(isset($cosplay_name)){
                $db->join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character_name, $series, $genre, $group, $photo, $photo_taken);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
            break;
        case "login":
        $username = $_POST['namel'];
        $password = $_POST['passwordl'];

        if(isset($username)){
            $db->login($username, $password);
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
            $email = $_POST['email'];
            $password = $_POST['passwordr'];

            if(isset($cosplay_name)){
                $db->update($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password);
                http_response_code(202);
            }else{
                http_response_code(501);
            }
            break;
	}
} else if($_SERVER["REQUEST_METHOD"] == "UPDATE") {
    switch ($_DELETE["action"]) {
        case "dequeue":
        http_response_code(201);
    break;
    }
} else {
    http_response_code(501);
}
// switch($_GET['action']) {
// case 'enqueue':
//     if($_SESSION['session_object']->is_logged_in()) {
//         if(count($_POST) > 0) {
//             if(isset($_POST['queuetopic'])) {
//                 $result = $sqsdb->enqueue($_POST['queuetopic']);
//                 if($result == true) {
//                     http_response_code(201);
//                 } else {
//                     http_response_code(400);
//                 }
//             }
//         } else {
//             http_response_code(501);
//         }
//     } else {
//         http_response_code(401);
//     }
//     break;
// case 'dequeue':
//     if($_SESSION['session_object']->is_logged_in()) {
//         if($_SERVER['REQUEST_METHOD'] === 'DELETE') {;
//             if(isset($_GET['queueitem'])) {
//                 if(is_numeric($_GET['queueitem'])) {
//                     $result = $sqsdb->dequeue($_GET['queueitem']);
//                     if($result == true) {
//                         http_response_code(202);
//                     } else {
//                         http_response_code(400);
//                     }
//                 } else {
//                     http_response_code(501);
//                 }
//             } else {
//                 http_response_code(501);
//             }
//         } else {
//             http_response_code(501);
//         }
//     } else {
//         http_response_code(401);
//     }
//     break;
// case 'updateprofile':
//     if($_SESSION['session_object']->is_logged_in()) {
//         if(count($_POST) > 0) {
//             if(isset($_POST['nick']) &&
//                isset($_POST['theme']) &&
//                isset($_POST['icon']) &&
//                isset($_POST['color'])) {
//                 http_response_code(201);
//             } else {
//                 http_response_code(400);
//             }
//         } else {
//             http_response_code(400);
//         }
//     } else {
//         http_response_code(401);
//     }
//     break;
?>