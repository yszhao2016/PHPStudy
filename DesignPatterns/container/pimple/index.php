<?php

require __DIR__ . '/vendor/autoload.php';

use EasyWeChat\OfficialAccount\Application;
use Pimple\Container;
use PimpleClass\Fly;
use PimpleClass\Run;
use PimpleClass\SuperMan;
use PimpleClass\Walk;
use yii\web\Request;

$container = new Container();
//$walk = new Walk();
//$run = new Run($walk);
//$fly = new Fly($run);
//$people = new SuperMan($fly);
//$people->showFly();

$container['walk'] = function ($c){
    return new Walk();
};

$container['run'] = function ($c){
    return new Run($c['walk']);
};
$container['fly'] = function ($c){
    return new Fly($c['run']);
};

$container['superman'] = function ($c){
    return new SuperMan($c['fly']);
};
//$container['superman']->showFly();
//$container['superman']->showFly();
//$container['superman']->showFly();

new Application();

