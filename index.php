<?php
// Overide Config
date_default_timezone_set("Asia/Bangkok");
error_reporting(E_ERROR | E_PARSE);
ini_set('memory_limit', '512M');
ob_start("ob_gzhandler");

$CurrentRoot = dirname(__FILE__);
$BackTracking = 30 ;      //Minute
$TimeOut = 3 ;                //Seconds
$MinuteCheck = 300;     //seconds
//$HostGroup = (isset($_GET["group"]) && $_GET["group"]!="")? strtoupper($_GET["group"]):'HDC' ;
define('_HOSTGROUP_',((isset($_GET["group"]) && $_GET["group"]!="")? strtoupper($_GET["group"]):'HDC')) ;

include "include/db.connect.php";

$Sql = "SELECT * FROM cchangwat ORDER BY changwatcode";
$result = $dbconnect->query($Sql);
$Changwat = [];
while ($row = $result->fetch_assoc()) {
    $Changwat[$row["changwatcode"]] = $row["changwatname"];
}
$result->close();

$Sql = "SELECT * FROM host_group WHERE name='"._HOSTGROUP_."' LIMIT 0,1 ";
$result = $dbconnect->query($Sql);
$row = $result->fetch_assoc() ;
$TitleBand = $row["group_title"];
$TitlePage = $row["page_title"];
$GroupTopic = $row["group_topic"];
$IsShowMap = $row["showmap"];
$result->close();
include "include/header.php";
?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1><?=$TitlePage;?></h1>
                <ol class="breadcrumb">
                    <li><a href="?r=map"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Status</a></li>
                    <li class="active"><?=$_GET["r"];?></li>
                </ol>
            </section>
            <div class="content">
<?php
switch ($_GET["r"]) {
    case 'login':
        include "admin/login.php";
        break;

    case 'list':
    case 'check':
    case 'alive':
    case 'history':
    case 'map':
        include "host_".$_GET["r"].".php";
        break;

    case 'log':
        echo '<div class="box box-warning">';
        if (is_file("host_check_log.html") ) {
            include "host_check_log.html";
        } else {
            echo '<h2> Wait for background checking complete.</h2>';
        }
        echo '</div>';
        break;

    default:
        echo "<h2>Error 404</h2>";
        break;
}
$dbconnect->close();
?>
</div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
    include "include/footer.php";
?>
