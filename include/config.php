<?php
// Overide Default Config

date_default_timezone_set("Asia/Bangkok");
error_reporting(E_ERROR | E_PARSE);
ini_set('memory_limit', '512M');
ob_start("ob_gzhandler");

include ($CurrentRoot."/include/default.values.php");
include ($CurrentRoot."/include/db.connect.php");
