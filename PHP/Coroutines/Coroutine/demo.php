<?php

function logger($fileName)
{
    $fileHandle = fopen($fileName, 'a');
    while (true)
    {
        $data = yield;
        fwrite($fileHandle, $data . "\n");
    }
}

$logger = logger(__DIR__ . '/log');
$logger->send('Foo');
$logger->send('Bar');
