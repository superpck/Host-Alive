<?php
    $db = [
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'',
        'port'=>'3306',
        'dbname'=>'monitoring',
        'charset'=>'utf8',
        'socket'=>""
    ];

    $defaultValues = [
        'siteName'=>'HOST Alive',
        'siteVersion'=>'1.02b',                                    // !!! Don't change
        'defaultMail' =>'superpck@yahoo.com',
        'defaultGroup'=>'HDC',
        'backTracking' => 30,            // Read Minute
        'TimeOut' => 8,                       // try to check port in Seconds
        'minuteCheck' => 300,            // duration checking period in seconds
        'screenRefresh' => 300,        // refresh website for new data in Seconds
        'homeUrl'=>'list',
    ];

    $BanedIP = [
        "66.249.",
    ];

    $BanedUrlString = [
        "Google favicon",
        'Bot'
    ];
?>
