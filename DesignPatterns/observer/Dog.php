<?php


namespace observer;


class Dog implements ObserverInterface
{
    public function watch()
    {
        echo "Dog1 watches TV<hr/>";
    }
}