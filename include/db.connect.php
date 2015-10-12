<?php
    $dbconnect = new mysqli($db["host"],$db["username"], $db["password"], $db["dbname"],$db["port"])
    	or die ('Could not connect to the database server' . mysqli_connect_error());

    $dbconnect->query("SET NAMES ".$db["charset"]);
?>
