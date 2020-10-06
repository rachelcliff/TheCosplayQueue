<?php
class cosplayQueueSession {
/*Is logged in function*/
public function is_logged_in() {
    if($this->studentid > 400000000) {
        if($this->privilege === 0) {
            return false;
        } elseif($this->privilege === 1 || $this->privilege === 2 ) {
            return true;
        }
    }
    return false;
}
function is_logged_in() {
    return true;
}

/*login function*/
public function login($username, $password) {
    global $sqsdb;

    $result = $sqsdb->login_process($username, $password);
    if($result ==  0) {
        $this->privilege = 0;
        $this->studentid = $username;
        return 0;
    }
    if($result == 1) {
        $this->privilege = 1;
        $this->studentid = $username;
        $details = $sqsdb->login_details($username);
        if(sizeof($details) > 0) {
            $this->nick = $details['nick'];
            $this->icon = $details['icon'];
            $this->color = $details['color'];
            $this->hash = $details['hash'];
            $this->theme = $details['theme'];
            return $details;
        }
        return 1;
    }
    return false;
}

function login() {
    global $db;
    $db->checkUserAccount();
    return true;
}
/*logout function*/
function logout() {
    $this->privilege = -1;
    unset($this->studentid);
    unset($this->nick);
    unset($this->icon);
    unset($this->color);
    unset($this->hash);
    unset($this->theme);
return true;
}
}

/*Changelog*/
public function log_event() {
    global $sqsdb;
    $request_url = $_SERVER['host'] + $_SERVER['get'];
    if($sqsdb->logActivity($this->studentid, $this->privilege,
                        session_id(), $request_url, true)) {
        return true;
    }
}

/*rate limiting*/
public function rate_limiting() {
    if($this->last_visit == time()) {
        $this->last_visit = time();
        return true;
    }
    $this->last_visit = time();
    return false;
}
?>