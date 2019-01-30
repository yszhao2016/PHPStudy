<?php

class C
{
    public function doSomething()
    {
        echo __METHOD__, '我是C类|';
    }
}

class B
{
    private $c;

    public function __construct(C $c)
    {
        $this->c = $c;
    }

    public function doSomething()
    {
        $this->c->doSomething();
        echo __METHOD__, '我是B类|';
    }
}
class A
{
    private $b;

    public function __construct(B $b)
    {
        $this->b = $b;
    }

    public function doSomething()
    {
        $this->b->doSomething();
        echo __METHOD__, '我是A类|';;
    }
}

//这段代码使用了魔术方法，在给不可访问属性赋值时，__set() 会被调用。读取不可访问属性的值时，__get() 会被调用。
class Container
{
    private $s = array();

    function __set($k, $c)
    {
        $this->s[$k] = $c;
    }

    function __get($k)
    {
        return $this->s[$k]($this);
    }
}

$class = new Container();

$class->c = function () {
    return new C();
};
$class->b = function ($class) {
    return new B($class->c);
};
$class->a = function ($class) {
    return new A($class->b);
};

// 从容器中取得A
$model = $class->a;
$model->doSomething(); // C::doSomething我是C类|B::doSomething我是B类|A::doSomething我是A类|