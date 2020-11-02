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

// This rate limiting function starts by checking to see if there is an existing rate limiting session in place, if there is one existing it will continue to add additional requests to the request counter. If the start time is null it will set the current time as the start time. The 3600 in the equation refers to how many seconds in an hour. The rate limiting code functions by determining the $hours variable set in the previous section of the function. If the $hours variable is more than 24 and the number of requests of the page is less than 1000, it will return a false result allowing for the request counter to continue working. If the $hours variable is more than 24 (hours in a day), then the counter will reset to 0 and the rate limiting will continue. 
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

public function RateCheck() {
    if ($this->_startTime == null) {
        $this->_startTime = time();
    }
    $this->requestCounter++;
    $seconds = (time() - $this->_startTime/60);
    $this->_startTime=time();
    if ($seconds >1 && $this ->_requestCounter <1) {
        return false;
    } else if ($seconds <=1) {
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
