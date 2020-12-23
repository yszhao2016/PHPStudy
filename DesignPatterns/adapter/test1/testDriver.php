<?php


namespace adapter\test1;


class testDriver
{
    public function run()
    {
        //实例化一只狗玩具
        $adaptee_dog = new Dog();
        echo "给狗套上红枣适配器\n";
        $adapter_red = new RedAdapter($adaptee_dog);
        //张嘴
        $adapter_red->doMouthOpen();
        //闭嘴
        $adapter_red->doMouthClose();
        echo "给狗套上绿枣适配器\n";
        $adapter_green = new GreenAdapter($adaptee_dog);
        //张嘴
        $adapter_green->operateMouth(1);
        //闭嘴
        $adapter_green->operateMouth(0);
    }
}

//调用
$test = new testDriver();
$test->run();