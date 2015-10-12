<?php
    include ($CurrentRoot.'/include/db.php');

    $dbconnect = new mysqli($db["host"],$db["username"], $db["password"], $db["dbname"],$db["port"])
    	or die ('Could not connect to the database server' . mysqli_connect_error());

//    $dbconnect = new mysqli($db["host"],$db["username"], $db["password"], $db["dbname"],$db["port"]);
    if ($dbconnect->connect_errno) {
        echo "Failed to connect to MySQL: (" . $dbconnect->connect_errno . ") " . $dbconnect->connect_error;
        exit;
    }
    $dbconnect->query("SET NAMES ".$db["charset"]);
?>
