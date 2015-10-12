<?php
date_default_timezone_set("Asia/Bangkok");
error_reporting(E_ERROR | E_PARSE);
ob_start("ob_gzhandler");

echo '<h3><b>Start: ',date("Y-m-d H:i:s"),'</b></h3>';
$CurrentRoot = dirname(__FILE__);
$TimeOut = 12 ;        //Seconds
include "include/db.connect.php";

$time = explode(" ", microtime());
$starttime = $time[1] + $time[0];

$result = $dbconnect->query("SELECT * FROM host_detail WHERE host_detail.active='1' ORDER BY host_detail.host");
$Return = [];
$Return['success'] = true;
$Return['date_start'] = date("Y-m-d H:i:s");
$nRecno = 0;
while ($row = $result->fetch_assoc()) {
    $time = explode(" ", microtime());
    $startCheck = $time[1] + $time[0];
    $Ports = explode(",",$row["port"]);
    $cHost = $row['host'];
    echo " host: " . $cHost;
    $IsOn = 0;
    $Today = date("Y-m-d H:i:s");
    foreach ($Ports as $key => $port) {
        $time = explode(" ", microtime());
        $startping = $time[1] + $time[0];

        $IsPing = pingPort($cHost,$port,$TimeOut);

        $time = explode(" ", microtime());
        $totaltime = ($time[1] + $time[0] - $startping);

        $Return["data"][$cHost]["port"]["$port"] = $IsPing;

        $IsOn += $IsPing? 1:0;
        echo '  [',$port. ':'.($IsPing? '<font color="green">On</font>':'<font color="red">Off</font>'),']';
        $Sql = "INSERT INTO host_status (host,port,result,date,duration) ".
                                    " VALUES ('".$row["ref"]."' , '".$port."' , '".$IsPing."' , '".$Today."' ,'".$totaltime."')";
        $dbconnect->query($Sql);
    }
    $Sql = "UPDATE host_detail SET lastcheck = now(), laststatus=$IsOn WHERE host='$cHost' ";
    $dbconnect->query($Sql);

    $time = explode(" ", microtime());
    $totaltime = ($time[1] + $time[0] - $startCheck);
//    $Return["data"][$nRecno]['timeused'] = $totaltime;
    $Return["data"][$row['host']]['timeused'] = $totaltime;
    echo ' ',number_format($totaltime,2)." Secs. <br>";
}
$dbconnect->close();

$time = explode(" ", microtime());
$totaltime = ($time[1] + $time[0] - $starttime);
$Return['date_end'] = date("Y-m-d H:i:s");
$Return['timeused'] = $totaltime;
echo '<hr>End: ',date("Y-m-d H:i:s"),' time used: ',$totaltime;

return;

//----------------------------------------------------------------------------
    function pingPort($host,$port=80,$timeout=10)
//----------------------------------------------------------------------------
{
    $fp = @fsockopen($host, $port, $errno, $errstr, $timeout);
    $Result = $fp?  1:0;
    fclose($fp);

    return $Result;
}
?>
