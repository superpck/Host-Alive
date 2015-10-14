<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i><b> Last log from
            <font color="green" size="+1">crontab</font> for host in group <?=_HOSTGROUP_;?></b>
            <br /><small>Crontab start every <?=$defaultValues["MinuteCheck"]/60;?> minutes.</h3>
    </div>
    <div class="box-body">
        <table class="table">
    <?php
        include "host_check_log.html";

        $Sql = "SELECT * FROM ".$db["dbname"].".view_host_detail WHERE active='1' and groupname='"._HOSTGROUP_."' ORDER BY host";
        $resultdetail = $dbconnect->query($Sql);
        while ($row = $resultdetail->fetch_assoc()) {
            echo '<tr><td>',$row["lastcheck"],
                                '</td><td>',$row["host"],'</td><td>',
                                $row["name"],'</td><td>',
                                $row["detail"],'</td><td>';

            $Lastlog = preg_replace("/:On/",":<font color='green'>On</font>",$row["lastlog"]);
            $Lastlog = preg_replace("/:Off/",":<font color='red'><b>Off</b></font>",$Lastlog);

            $Ports = explode(",",$row["lastlog"]);
            foreach ($Ports as $Port) {
                $Value = explode(":",$Port);
                echo '<span class="badge bg-'.($Value[1]=='On'? 'green':'red').'">'.$Value[0].'</span> ';
            }
//            echo '<tr><td>',$row["lastcheck"],
//                    '</td><td>',$row["host"],'</td><td>',
//                    $row["name"],'</td><td>',
//                    $row["detail"],'</td><td>',$Lastlog,'</td></tr>';
            echo '</td></tr>';
        }
        $resultdetail->close();
    ?>
    </table>
    </div>
</div>
