<?php


use samplefactory\ShoeFactory;

require_once '../autoload.php';
$sports = ShoeFactory::produce('sports');
$sports->create();

$leather = ShoeFactory::produce('leather');
$leather->create();