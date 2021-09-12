<?php

require_once "../autoload.php";
use observer\Action;
use observer\Cat;
use observer\People;
use observer\Dog;
// 调用实例
$action=new Action();
$action->register(new Cat());
$action->register(new People());
$action->register(new Dog());
$action->notify();