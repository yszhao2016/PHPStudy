<?php
/**
 * Created by PhpStorm
 * USER: Zhaoys
 * Date: 2021/10/22 14:14
 */
namespace PimpleClass;
class Run
{
    public $base;
    public function __construct($wlak)
    {
        $this->base =$wlak;
        echo "初始化奔跑技能".PHP_EOL;
    }

}