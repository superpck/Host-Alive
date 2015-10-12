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
        'DefaultMail' =>'superpck@yahoo.com',
        'BackTracking' => 30,          //Read Minute
        'TimeOut' => 8,                   //try to check port in Seconds
        'MinuteCheck' => 300,        //duration checking period in seconds
        'Group'=>'HDC',
        'Home'=>'list'
    ];
?>
