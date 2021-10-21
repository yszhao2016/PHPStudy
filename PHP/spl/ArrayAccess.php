<?php


class Foo implements ArrayAccess
{
    public function offsetExists($offset)
    {
        echo "这里是 offsetExists() 方法 你输入的参数是 {$offset}".PHP_EOL;
    }

    public function offsetGet($offset)
    {
        echo "这里是 offsetGet() 方法 你输入的参数是 $offset".PHP_EOL;
    }

    public function offsetSet($offset, $value)
    {
        echo "这里是 offsetSet() 方法 你输入的 {$offset}={$value}".PHP_EOL;
    }

    public function offsetUnset($offset)
    {
        echo "这里是 offsetUnset() 方法 你输入的参数是 {$offset}".PHP_EOL;
    }
}


$foo = new Foo();
$t = isset($foo['how']);// 输出: 这里是 offsetExists() 方法 你输入的参数是 how
var_dump($t);// 输出: boolean false
echo PHP_EOL.PHP_EOL;




$foo = new Foo();
$foo['what'];// 输出: 这里是 offsetGet() 方法 你输入的参数是 what
echo PHP_EOL.PHP_EOL;



$foo = new Foo();
$foo['when'] = 'today';// 输出: 这里是 offsetSet() 方法 你输入的 when=today
echo PHP_EOL.PHP_EOL;


$foo = new Foo();
unset($foo['wow']);// 输出: 这里是 offsetUnset() 方法 你输入的参数是 wow