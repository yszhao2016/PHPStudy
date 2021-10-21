<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function __autoload($class)
{
    echo "Class Name:".$class.PHP_EOL;
    $file = __DIR__.DIRECTORY_SEPARATOR.$class.".php";
    if(file_exists($file)){
        require $file;
    }
}
