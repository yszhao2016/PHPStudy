<?php

/*
 *
 */

function gen1()
{
    yield 1;
    echo "i\n";
    yield 2;
    yield 3 + 1;
}

//$gen = gen1();
//foreach ($gen as $key => $value)
//{
//    echo "{$key} - {$value}\n";
//}


$gen = gen1();
var_dump($gen->valid());
echo $gen->key().' - '.$gen->current()."\n";
$gen->next(); 
var_dump($gen->valid());
echo $gen->key().' - '.$gen->current()."\n";
$gen->next(); 
var_dump($gen->valid());
echo $gen->key().' - '.$gen->current()."\n";
$gen->next(); 
var_dump($gen->valid());