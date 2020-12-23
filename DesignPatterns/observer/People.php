<?php


namespace observer;


class People implements ObserverInterface
{
    public function watch()
    {
        echo "People watches TV<hr/>";
    }
}