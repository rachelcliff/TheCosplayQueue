<?php
class cosplayQueueSession {
// rate limiting
public function setStartTime($startTime)
{
    $this->_startTime=$startTime;
}
public function getStartTime()
{
    return $this->_startTime;
}
public function setRequestCounters($requestCounter) 
{
    $this->_requestCounter = $requestCounter;
}
public function getRequestCounter() 
{
    return $this->_requestCounters;
}

public function Rate24HourCheck() {
    if ($this->_startTime == null) {
        $this->_startTime = time();
    }

    $this->requestCounter++;
    $hours = (time() - $this->_startTime /3600);

    $this->_startTime=time();
    if ($hours <24 && $this ->_requestCounter >1000){
        return false;
    } else if ($hours >=24){
        $this->_requestCounter=0;
    }
    return $this->_requestCounter;
}

// checking if someone is already logged in. This comes from the session variable "login" that is set when someone successfully interacts with one of the 3 database facing forms on the site. If it is set to true it will return a response code of 201, and if it false it will return a response code of 401. The second half of the function lives within the api.php file.  

function is_logged_in() {
    // if($_SESSION["login"] == true) {
    //         return true;

    //     } else { 
    //     ($_SESSION["login"] ==  false); 
    //     {
    //         return false;
    //     }
    // }
    return true;
}

// logout function
function logout() {
//     $this->privilege = -1;
//     unset($this->name);
//     unset($this->cosplay_name);
//     unset($this->facebook);
//     unset($this->instagram);
//     unset($this->phone);
//     unset($this->email);
//     unset($this->userID);
//     unset($this->character_name);
//     unset($this->series);
//     unset($this->genre);
//     unset($this->r_group);
//     unset($this->queueID);
// return true;
session_destroy();
}
}
?>