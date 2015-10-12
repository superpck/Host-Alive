<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="300">
    <title>Status of <?=$TitleBand;?> (<?=date("Y-m-d H:i:s");?>)</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="AdminLTE/documentation/style.css">
    <link rel="stylesheet" href="AdminLTE/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-yellow-light fixed sidebar-mini sidebar-collapse" data-spy="scroll" data-target="#scrollspy">
<!--body class="hold-transition skin-blue sidebar-mini sidebar-collapse"-->
<div class="wrapper">
<header class="main-header">
    <nav class="navbar navbar-static-top fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="?r=map&group=<?=_HOSTGROUP_;?>" class="navbar-brand"><?=$TitleBand;?></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-spinner"></i> Status <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="?r=list&group=<?=_HOSTGROUP_;?>"><i class="fa fa-folder-open-o"></i> Status by list</a></li>
                            <?php
                            if ($IsShowMap>0){ ?>
                            <li><a href="?r=map&group=<?=_HOSTGROUP_;?>"><i class="fa fa-globe"></i> Status by Map</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="?r=login&group=<?=_HOSTGROUP_;?>"><i class="fa fa-key"></i> Login</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
