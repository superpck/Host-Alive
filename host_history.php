<?php
$result = $dbconnect->query("SELECT * FROM view_host_status WHERE host='".$_GET["host"]."' ORDER BY date DESC LIMIT 0,200");
$HostHistory = [];
$Ports = [];
while ($row = $result->fetch_assoc()) {
    $HostHistory[$row["date"]][$row["port"]]["result"] = $row["result"] ;
    $HostHistory[$row["date"]][$row["port"]]["host"] = $row["host"] ;
    $HostHistory[$row["date"]][$row["port"]]["name"] = $row["name"] ;
    $Ports[$row["port"]] = $row["port"];
    $ServerName = $row["name"];
    $ServerHost = $row["host"];
}
?>
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tasks"></i>
                <b> History of <?=$GroupTopic;?>:
                    <?=$ServerHost;?>
                    (<a href="http://<?=$ServerHost;?>" target="_blank"><?=$ServerName;?></a>)
                </b></h3>
        </div>
        <div class="box-body">

<table class="table table-hover">
<thead>
    <tr class="info">
        <td rowspan="2">วันที่</td>
        <td colspan="<?=sizeof($Ports);?>" align="center">Port</td>
    </tr>
    <tr class="info">
<?php
        foreach ($Ports as $Port) {
            echo '<td width="20">',$Port,'</td>';
        }
?>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($HostHistory as $Date => $row) {
    echo '<tr>';
    echo '<td>',$Date,'</td>';
    foreach ($Ports as $Port) {
        $Color = ($row[$Port]["result"] == 1)? 'success':'danger';
//        $ico = ($row[$Port]["result"]== 1)? 'thumbs-o-up':'thumbs-o-down';
        $ico = ($row[$Port]["result"] ==1)? 'check':'times';
        echo '<td width="50" class="'.$Color.'" align="center"><i class="fa fa-',$ico,'"></i></td>';
    }
//    echo '<td><i class="fa fa-'.$ico.'"></i></td>';
    echo '</tr>';
}
?>
    </tbody>
</table>

</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col-md-6 -->
