<?php
require_once '../autoload.php';
use factoryabstract\factory\FactoryBenz;
use factoryabstract\factory\FactoryBmw;



//生产奔驰跑车
$benzFactory = new FactoryBenz();
$benzCar = $benzFactory->makeSportCar();
$benzCar->driver();

//生产宝马MINI
//$bmwFactory = new FactoryBmw();
//$bmwCar = $bmwFactory->makeMiniCar();
//$bmwCar->playMusic();