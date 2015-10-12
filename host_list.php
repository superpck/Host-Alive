<?php
$Sql = "SELECT * FROM ".$db["dbname"].".view_host_detail WHERE active='1' and groupname='"._HOSTGROUP_."' ORDER BY host";
$resultdetail = $dbconnect->query($Sql);
$HostStatus = [];
while ($row = $resultdetail->fetch_assoc()) {
    $HostStatus[$row["host"]]["name"] = $row["name"];
}
$resultdetail->close();

$dDate = date("Y-m-d H:i:s", mktime(date("H"),date("i")-$BackTracking,date("s"),date("m"),date("d"),date("Y") ) );
$Sql = "SELECT * FROM ". $db["dbname"].".view_host_status WHERE date>'".$dDate."' and groupname='"._HOSTGROUP_."' ORDER BY date DESC, port";
$result = $dbconnect->query($Sql);
$Ports = [];
while ($row = $result->fetch_array()) {
    if (!isset($HostStatus[$row["host"]]["date"]))
        $HostStatus[$row["host"]]["date"] = $row["date"];
    if (!isset($HostStatus[$row["host"]][$row["port"]])){
        $HostStatus[$row["host"]][$row["port"]] = $row["result"];
    }
    $Ports[$row["port"]]++ ;
}
$result->close();
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i><b> <?=$GroupTopic;?> in 30 minutes ealier.</b>
            <br /><small>Host checking every <?=$MinuteCheck/60;?> minutes.</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-stripped">
            <tr class="info">
                <th>Last Check</th>
                <th nowrap>Host</th>
                <th>Name</th>
                <th>Port Status</th>
            </tr>
            <tbody>
            <?php
            foreach ($HostStatus as $host => $row) {
                $Chart .= (($Chart==""? '':',')."['".$Changwat[$Prov]."',".$Status."]");
                echo '<tr>';
                echo '<td>',$HostStatus[$host]["date"],'</td>';
                echo '<td><a href="?r=history&host='.$host.'&group='._HOSTGROUP_.'" alt="link">'.
                        $host.'</a></td>';
                echo '<td>',$row["name"],'</td>';
                echo '<td>';
                foreach ($Ports as $port => $value) {
                    if (isset($HostStatus[$host][$port])){
                        $txt = $HostStatus[$host][$port]+0==0? 'red':'green';
                        if ($port=='80' || $port=='8080'){
                            echo '<a href="http://'.$host.':'.$port.'" target="_blank"><span class="badge bg-'.$txt.'">'.$port.'</span></a> ';
                        } else {
                            echo '<span class="badge bg-'.$txt.'">'.$port.'</span> ';
                        }
                    }
                }
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
      </table>


    </div>
</div>
