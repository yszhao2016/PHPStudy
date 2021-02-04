<?php
    $file = './123.png';
    $fileinfo = pathinfo($file);
//    var_dump(@getimagesize($file));exit;
//    var_dump($fileinfo);
    $test = 'abc'+"12";
    echo $test.'---';
    if(!$test){
       echo "false---";
    }
    echo $test;


    new CURLFile();