<?php


namespace adapter\test1;


class RedAdapter implements RedTargetInterface
{
    private $adaptee;

    function __construct(Toy $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    //委派调用Adaptee的sampleMethod1方法
    public function doMouthOpen()
    {
        $this->adaptee->openMouth();
    }

    public function doMouthClose()
    {
        $this->adaptee->closeMouth();
    }
}