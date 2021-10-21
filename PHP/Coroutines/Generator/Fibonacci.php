<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//function fbnq($prevnum,$nextnum)
//{
//    $second = $prevnum + $nextnum;
//    if($second>99999999999999999999){
//        exit;
//    }
//    echo $second.PHP_EOL;
//    fbnq($nextnum,$second);
//}
//fbnq(1, 1);


function fbnq($prevnum,$nextnum)
{
    while($nextnum< pow(2,512))
    {
        $temp = $nextnum;
        $nextnum = $prevnum+$nextnum;
        $prevnum = $temp;
//        echo $nextnum;
        yield $nextnum;
    }
}
var_dump(fbnq(1,1));exit;
foreach (fbnq(1,1) as $value){
//    var_dump($value);exit;
    echo $value.PHP_EOL;
}