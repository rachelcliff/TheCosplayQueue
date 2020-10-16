<?php
class cosplayQueueSession {
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

// // Changelog
// public function log_event() {
//     global $db;
//     $request_url = $_SERVER['host'] + $_SERVER['get'];
//     if($db->logActivity($this->user_ID, session_id(), $request_url, true)) {
//                             echo "success";
//         return true;
//     }
// }

// rate limiting
// public function rate_limiting() {
//     if($this->last_visit == time()) {
//         $this->last_visit = time();
//         return true;
//     }
//     $this->last_visit = time();
//     return false;
// }
}
?>