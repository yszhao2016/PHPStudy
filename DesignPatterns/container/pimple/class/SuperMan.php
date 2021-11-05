<?php
/**
 * Created by PhpStorm
 * USER: Zhaoys
 * Date: 2021/10/22 14:01
 */
namespace PimpleClass;
class SuperMan
{
    public $skill;
    public function __construct(Power $nl)
    {
        $this->skill = $nl;
    }


    public function showFly()
    {
        $this->skill->run();
    }
}