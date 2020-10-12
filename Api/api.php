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
            $name = $_POST['name']
            break;
        case "sign-in"
        http_response_code(202);
        break;
        case "sign-up":
            http_response_code(202);
        break;
        case "update":
            http_response_code(202);
        break;
	}
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
}
?>