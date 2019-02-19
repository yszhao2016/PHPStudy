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

