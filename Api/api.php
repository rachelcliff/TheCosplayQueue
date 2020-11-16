<?php
header('Access-Control-Allow-Origin: https://localhost');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: apsplication/json'); // All echo statements are json_encode

// initiation of database and session
require('db.php');
$db = new cosplayQueueModel;
require('session.php');
$se = new cosplayQueueSession;


session_start();
// $_SESSION["login"] = "true";
// $_SESSION["loginID"] = 1;
// print_r($_SESSION);

if (!isset($_SESSION['sessionOBJ']))
    $_SESSION['sessionOBJ'] = new cosplayQueueSession;

if ($_SESSION['sessionOBJ']->Rate24HourCheck() === false) {
    http_response_code(429); //Too Many Requests
    die();
}

if ($_SESSION['sessionOBJ']->RateCheck() === false) {
    http_response_code(429); //Too Many Requests
    die();
}


// Base Case
// This section of the code acts as a central hub for the API utilising a switch statement to utilise multiple functions or cases within the program. It works by firstly defining the action type of each Fetch call created in the JS file. The action in this case is defined as GET by default, so if the case has an action type of GET it will run as GET automatically. For POST actions an additional line of code is needed to set the case to identify as POST. From there there is an an if statement that links to the correct function in the dp.php file where the needed variables are defined. Once the process is run it will hit another if else statement containing the http response codes for whether the result returns true and whether the response returns false. The case finishes with a break that tells the system that this is the end of this specific case and not to run any further. At the end of the overall base case there is a universal 501 error that will run in the event that the base case fails. 
if (isset($_GET["action"])) {

    switch ($_GET["action"]) {
        case "showDetails":
            // echo "show";
            if ($_SESSION['sessionOBJ']->is_joined()) {
                $result = $db->showDetails();
                if ($result == false) {
                    http_response_code(501);
                } else {
                    http_response_code(201);
                    echo json_encode($result);
                }
            } else {
                http_response_code(401);
            }
            break;

        case "fillupdate";
            $result = $_SESSION['sessionOBJ']->is_logged_in();
            if ($result == true) {
                $details = array(
                    "name" => $_SESSION["name"],
                    "cosplay_name" => $_SESSION["cosplay_name"],
                    "facebook" => $_SESSION["facebook"],
                    "instagram" => $_SESSION["instagram"],
                    "phone" => $_SESSION["phone"],
                    "email" => $_SESSION["email"]
                );
                if (is_array($details)) {
                    http_response_code(201);
                    echo json_encode($details);
                } else {
                    http_response_code(404);
                }
                // } else {
                //     http_response_code(401);
            }
            break;

            // admin panel - show details all
        case "showDetailsAll":
            // echo "showAll";
            if ($_SESSION['sessionOBJ']->is_logged_in()) {
                $result = $db->showDetails();
                if ($result == false) {
                    http_response_code(501);
                } else {
                    http_response_code(201);
                    echo json_encode($result);
                }
            } else {
                http_response_code(401);
            }
            break;

        case "join":
            // echo "join";
            if (isset($_POST["action"])) {
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
                $date = date('Y-m-d H:i:s');
                $browserAgent = $_SERVER['HTTP_USER_AGENT'];
                $actiontype = $_POST['joini'];

                if (isset($cosplay_name)) {
                        $db->join($name, $cosplay_name, $facebook, $instagram, $phone, $email, $character_name, $series, $genre, $r_group, $reference_photo, $photo_taken, $date, $browserAgent, $actiontype);
                        http_response_code(201);
                    } else {
                        http_response_code(501);
                    }
                }
            // }
            break;

        case "signup":
            // echo "signup";
            if (isset($_POST["action"])) {
                $name = $_POST['names'];
                $cosplay_name = $_POST['usernames'];
                $facebook = $_POST['facebooks'];
                $instagram = $_POST['instagrams'];
                $phone = $_POST['phones'];
                $email = $_POST['emails'];
                $password = $_POST['passwords'];
                $date = date('Y-m-d H:i:s');
                $browserAgent = $_SERVER['HTTP_USER_AGENT'];
                $actiontype = $_POST['registers'];

                    if (isset($email)) {
                        $db->register($name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype);
                        http_response_code(201);
                    } else {
                        http_response_code(501);
                    }
            }
            break;

        case "login":
            // echo "login";
            if (isset($_POST["action"])) {
                $cosplay_name = $_POST['namel'];
                $password = $_POST['passwordl'];
                $date = date('Y-m-d H:i:s');
                $browserAgent = $_SERVER['HTTP_USER_AGENT'];
                $actiontype = $_POST['loginl'];
                    if (isset($cosplay_name)) {
                        $success = $db->login($cosplay_name, $password, $date, $browserAgent, $actiontype);
                        if ($success) {
                            http_response_code(201);
                        } else {
                            http_response_code(501);
                        }
                    } else {
                        http_response_code(501);
                    }
                }
            break;

        case "update":
            // echo "update";
            $user_id = $_SESSION['userID'];

            if (isset($_POST["action"])) {
                $user_id = $_POST['user_id'];
                $name = $_POST['namer'];
                $cosplay_name = $_POST['usernamer'];
                $facebook = $_POST['facebookr'];
                $instagram = $_POST['instagramr'];
                $phone = $_POST['phoner'];
                $email = $_POST['emailr'];
                $password = $_POST['passwordr'];
                $date = date('Y-m-d H:i:s');
                $browserAgent = $_SERVER['HTTP_USER_AGENT'];
                $actiontype = $_POST['updater'];
                if ($_SESSION["login"] == "true") {
                    if (isset($cosplay_name)) {
                        $db->update($user_id, $name, $cosplay_name, $facebook, $instagram, $phone, $email, $password, $date, $browserAgent, $actiontype);
                        http_response_code(201);
                    } else {
                        http_response_code(501);
                    }
                }
            }
            break;

        case "dequeue":
            $user_id = $_SESSION['userID'];
            // echo $_SESSION['userID'];
            // echo "dequeue";
            if (isset($_POST["action"])) {
                $user_id = $_POST['user_id'];
                $photo_taken = $_POST['photo_taken'];
                if (isset($photo_taken)) {
                    $db->dequeue($user_id, $photo_taken);
                    http_response_code(201);
                } else {
                    http_response_code(501);
                }
            }
            break;

            // photo_taken admin panel
        case "photo_taken":
            $user_id = $_SESSION['userID'];
            // echo $_SESSION['userID'];
            // echo "photo_taken";
            if (isset($_POST["action"])) {
                $user_id = $_POST['user_id'];
                $photo_taken = $_POST['photo_taken'];
                if (isset($photo_taken)) {
                    $db->photo_taken($user_id, $photo_taken);
                    http_response_code(201);
                } else {
                    http_response_code(501);
                }
            }
            break;

        case "placequeue":
            $user_id = $_SESSION['userID'];
            // echo $_SESSION['userID'];
            // echo "placequeue";
            if ($_SESSION['sessionOBJ']->is_joined()) {
                $result = $db->placequeue();
                if ($result == false) {
                    http_response_code(501);
                } else {
                    http_response_code(201);
                    echo json_encode($result);
                }
            } else {
                http_response_code(401);
            }
            break;

        case "logout":
        if($_SESSION[ 'sessionOBJ' ] -> is_logged_in()){
             $_SESSION[ 'sessionOBJ'] -> logout();
             http_response_code(201);
		  }else{
			  http_response_code(502);
		  }
    }
} else {
    http_response_code(501);
}
?>