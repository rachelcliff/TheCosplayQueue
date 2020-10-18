<?php
class cosplayQueueSession {
// rate limiting
// public function setStartTime($startTime)
// {
//     $this->_startTime=$startTime;
// }
// public function getStartTime()
// {
//     return $this->_startTime;
// }
// public function setRequestCounters($requestCounter) 
// {
//     $this->_requestCounter = $requestCounter;
// }
// public function getRequestCounter() 
// {
//     return $this->_requestCounters;
// }

// public function Rate24HourCheck() {
//     if ($this->_startTime == null) {
//         $this->_startTime = time();
//     }

//     $this->requestCounter++;
//     $hours = (time() - $this->_startTime /3600);

//     $this->_startTime=time();
//     if ($hours <24 && $this ->_requestCounter >1000){
//         return false;
//     } else if ($hours >=24){
//         $this->_requestCounter=0;
//     }
//     return $this->_requestCounter;
// }


// // Is logged in function
// public function is_logged_in() {
//     if($this->studentid > 400000000) {
//         if($this->privilege === 0) {
//             return false;
//         } elseif($this->privilege === 1 || $this->privilege === 2 ) {
//             return true;
//         }
//     }
//     return false;
// // }
// function is_logged_in() {
//     return true;
// }

// // logout function
// function logout() {
//     $this->privilege = -1;
//     unset($this->studentid);
//     unset($this->nick);
//     unset($this->icon);
//     unset($this->color);
//     unset($this->hash);
//     unset($this->theme);
// return true;
// }
// }

}
?>