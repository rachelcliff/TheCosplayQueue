<?php
class cosplayQueueModel {
    private $dbconn;
    public function __construct() {
        $servername="localhost";
        $dbusername="root";
        $dbpassword="";
        $this->dbconn = new PDO("mysql:host=$servername;dbname=cosplay_queue", $dbusername, $dbpassword);
        // debug code; comment out once complete
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection successful";
    }
    
}
?>