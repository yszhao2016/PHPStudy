<?php
/**
 * Created by PhpStorm
 * USER: Zhaoys
 * Date: 2021/10/22 14:11
 */
namespace PimpleClass;
class Fly implements Power
{
    public $base;

    public function __construct($run)
    {
        $this->base = $run;

    }

    public function run()
    {
        // TODO: Implement run() method.
        echo "起飞技能启动了";
    }
}