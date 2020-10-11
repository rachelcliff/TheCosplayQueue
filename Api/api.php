<?php
header('Access-Control-Allow-Origin: https://localhost');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json'); // All echo statemes are json_encode

require('db.php'); $db = new cosplayQueueModel;
require('session.php'); $se = new cosplayQueueSession;

session_start();
/*Base Case*/
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

/*login*/
case 'login':
    if(count($_POST) > 0) {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            if(is_numeric($_POST['username'])) {
                $result = $_SESSION['session_object']->login($_POST['username'], $_POST['password']);
                if($result == 0) {
                    // need to register
                    http_response_code(203);
                } elseif(sizeof($result) > 1) {
                    // success
                    echo json_encode($result);
                } else {
                    $_SESSION['session_object']->do_logout();
                    http_response_code(401);
                }
            } else {
                $_SESSION['session_object']->do_logout();
                http_response_code(401);
            }
        } else {
            http_response_code(501);
        }
    } else {
        http_response_code(501);
    }
    break;

/*register*/
case 'register':
    if($_SESSION['session_object']->is_account_unregistered()) {
        if(isset($_POST['password'])) {
            $result = $_SESSION['session_object']->register($_POST['password']);
            if($result == true) {
                http_response_code(201);
            } else {
                http_response_code(401);
            }
        } else {
            http_response_code(501);
        }
    } else {
        http_response_code(403);
    }
    break;

/*logout*/
case 'logout':
    if($_SESSION['session_object']->is_logged_in()) {
        $_SESSION['session_object']->do_logout();
        http_response_code(200);
    } else {
        http_response_code(401);
    }
    break;
case 'isloggedin':
    $result = $_SESSION['session_object']->is_logged_in();
    if($result == true) {
        $details = $_SESSION['session_object']->login_details();
        if(is_array($details)) {
            echo json_encode($details);
        } else {
            http_response_code(404);
        }
    } else {
        http_response_code(401);
    }
    break;
case 'sessiondestroy':
    session_destroy();
    break;
case 'queuehash':
    $result = $sqsdb->queueHash();
    echo json_encode(Array("hash"=>$result));
    break;
default:
    http_response_code(501);
    break;
}
} else {
http_response_code(501);
}
?>