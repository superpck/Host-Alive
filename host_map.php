<?php
$Sql = "SELECT * FROM view_host_detail WHERE active='1' and groupname='"._HOSTGROUP_."' ORDER BY host";
$resultdetail = $dbconnect->query($Sql);
$HostStatus = [];
$HostStatus["status"]["00"]=0;
$HostStatus["status"]["10"]=0;
while ($row = $resultdetail->fetch_assoc()) {
    $Prov = substr($row["host"],-2);
    $HostStatus["status"]["$Prov"] = 0;
    $HostStatus["port"]["$Prov"] = ',';
    $GroupName = $row["groupname"];

//    $Sql = "UPDATE host_detail SET name = 'HDC.".substr($row["host"],-3).".".$Changwat[$Prov]."' WHERE host='".$row["host"]."' ";
//    echo $Sql;
//    $dbconnect->query($Sql);
}
$resultdetail->close();

$dDate = date("Y-m-d H:i:s", mktime(date("H"),date("i")-$BackTracking,date("s"),date("m"),date("d"),date("Y") ) );
$Sql = "SELECT * FROM ". $db["dbname"].".view_host_status WHERE date>'".$dDate."' and groupname='"._HOSTGROUP_."' ORDER BY date DESC, port";
$result = $dbconnect->query($Sql);

$dDate = "";
while ($rowStatus = $result->fetch_array()) {
    $Prov = substr($rowStatus["host"],-2);
    $dDate = $dDate==""? $rowStatus["date"]:$dDate;
    if (($rowStatus["port"] == '80' || $rowStatus["port"]=='8080') && $rowStatus["result"]>0 ) {
        if ($rowStatus["result"]>0 ) {
            $HostStatus["port"][$Prov] .= $rowStatus["port"].',';
        }
    }
}
$result->close();

foreach ($HostStatus["port"] as $Prov => $port) {
    if (strstr($port,",80,8080,")) {
        $HostStatus["status"]["$Prov"] = 2 ;
    } elseif (strstr($port,",80,")) {
        $HostStatus["status"]["$Prov"] = 1 ;
    }
}

$Chart = '';
foreach ($HostStatus["status"] as $Prov => $Status) {
    $Chart .= (($Chart==""? '':',')."['".$Changwat[$Prov]."',".$Status."]");
}
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i><b> <?=$GroupTopic;?> in 30 minutes ealier.</b>
            <br /><small>Last check: <?=$dDate;?></h3>
    </div>

    <div class="box-body">
        <div id="map_host"></div>
    </div>

</div>

<script type='text/javascript' src='https://www.google.com/jsapi'></script>
  <script type='text/javascript'>
   google.load('visualization', '1', {'packages': ['geomap']});
   google.setOnLoadCallback(drawMap);

    function drawMap() {
      var data = google.visualization.arrayToDataTable([
        ['Province', 'Port Status (1=80 , 2=80,8080)'],<?=$Chart;?>
     ]);

      var options = {};
      options['region'] = 'TH';
      options['colors'] = [0xFF0000, 0xFFA360 ,0x23FF1F]; //orange colors
      options['width'] = 600;
      options['height'] = 600;
      options['showZoomOut'] = false;

      var container = document.getElementById('map_canvas');
      var geomap = new google.visualization.GeoMap(map_host);
      geomap.draw(data, options);
    };

  </script>

<script src="include/js/jquery.js"></script>
