<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-tasks"></i><b> <?=$GroupTopic;?>.</b></h3>
        </div>
        <div class="box-body">

<?php
$result = $dbconnect->query("SELECT * FROM view_host_detail WHERE active='1' and groupname='"._HOSTGROUP_."'  ORDER BY host");
$Return = [];
$Return['success'] = true;
$Return['date_start'] = date("Y-m-d H:i:s");
$nRecno = 0;
while ($row = $result->fetch_assoc()) {
    $Color = ($row["laststatus"] ==1)? 'yellow':'aqua';
    $Color = ($row["laststatus"] ==4)? 'green':$Color;
    $ico = ($row["laststatus"] > 1)? 'thumbs-o-up':'flag-o';
    $ico = ($row["laststatus"] < 1)? 'thumbs-o-down':$ico;
?>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-<?=$Color;?>"><i class="fa fa-<?=$ico;?>"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">
              <a href="?r=history&host=<?=$row["host"];?>&group=<?=_HOSTGROUP_;?>" alt="link">
              <?=$row["name"];?> </a></span>
          <span class="info-box-number"><?=$row["laststatus"];?></span>
          <span class="info-box-date"><small><?=$row["lastcheck"];?></small></span>

        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->

<?php
}
?>


</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col-md-6 -->
