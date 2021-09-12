<?php

namespace observer;

interface  SubjectInterface
{
    public function register(Observer $observer);

    public function notify();
}