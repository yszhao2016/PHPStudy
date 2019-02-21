<?php

/**
 * 
 * 来生成一些集合对象，节约一些内存  xrange  range
 */
function Xrange($start, $end, $step = 1)
{
    for ($start; $start <= $end; $start += $step)
    {
        yield $start;
    }
}

foreach (Xrange(1, 100) as $key => $value)
{
    echo $key . '=>' . $value . PHP_EOL;
}