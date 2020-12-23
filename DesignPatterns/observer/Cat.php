<?php


namespace observer;


// 观察者
class Cat implements ObserverInterface
{
    public function watch()
    {
        echo "Cat watches TV<hr/>";
    }
}