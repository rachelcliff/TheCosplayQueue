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

switch($_GET['action']) {
    case 'order':
        if($_SESSION['se']->is_logged_in()) {
            if(isset($_POST['dish'])) {
                if($db->acceptOrder($_POST['dish'])) {
                    http_response_code(202);
                } else {
                    http_response_code(400);
                }
                } else {
            http_response_code(501);
        }
        } else {
            http_response_code(401);
        }
    break;
    case 'resteraunts':
    echo $db->getRestaurants(); 
    break;
    case 'dishes':
        if(isset($_GET['restaurant'])) {
            if($db->getDishes() == false) {
                http_response_code(404);
            } else {
                http_response_code(200);
                echo $db->getDishes();
            }
        } else { 
            http_response_code(501);
        }
    break;
    case 'login':
        if($se->login()) {
            http_response_code(202);
        } else {
            http_response_code(401);
        }
    break;
    case 'register':
    http_response_code(201);
    break;
    default:
    http_response_code(501); //wrong usage
    break;
}

?>