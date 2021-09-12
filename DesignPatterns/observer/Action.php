<?php


namespace observer;


class Action implements SubjectInterface
{
    public $_observers = [];

    public function register(Observer $observer)
    {
        $this->_observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->watch();
        }
    }
}