协程(Coroutines)

迭代器(Iterator)

    PHP 提供了一个统一的迭代器接口   Iterator
    
    Iterator extends Traversable {
        /* 方法 */
        abstract public mixed current ( void )//返回当前元素
        abstract public scalar key ( void )//返回当前元素的键
        abstract public void next ( void )//向前移动到下一个元素
        abstract public void rewind ( void )//返回到迭代器的第一个元素
        abstract public boolean valid ( void )//检查当前位置是否有效
    }
    
    有了迭代器，只要这个类继承这个接口，就可以直接遍历该对象获取学生数组，
    并且可以在获取之前在类的内部就对输出的数据做好处理工作。

生成器(Generator)

    关键字 yield 表明这是一个 generator
    
    1.yield只能用于函数内部，在非函数内部运用会抛出错误。
    2.如果函数包含了yield关键字的，那么函数执行后的返回值永远都是一个Generator对象。
    3.如果函数内部同事包含yield和return 该函数的返回值依然是Generator对象，
      但是在生成Generator对象时，return语句后的代码被忽略。
    4.Generator类实现了Iterator接口。
    5.可以通过返回的Generator对象内部的方法，获取到函数内部yield后面表达式的值。
    6.可以通过Generator的send方法给yield 关键字赋一个值。
    7.一旦返回的Generator对象被遍历完成，便不能调用他的rewind方法来重置
    8.Generator对象不能被clone关键字克隆
