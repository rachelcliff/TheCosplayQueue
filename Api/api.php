<?php
require('db.php'); $db = new db0bj;
require('session.php'); $se = new sess0b;
if(!isset($_GET['action])) { //wrong usage
    http_response_code(501);
    die;
}
switch($_GET['action']) {
    case 'resteraunts':
    //echo json here
    break;
    case 'dishes':
    //echo json here
    break;
    case 'order':
    http_response_code(202);
    break;
    case 'login':
    http_response_code(202);
    break;
    case 'register':
    http_response_code(201);
    break;
    default:
    http_response_code(501);
    break;
}
?>