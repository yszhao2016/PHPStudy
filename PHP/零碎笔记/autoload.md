#为什么要用spl_autoload_register

    在PHP开发中我们经常需要引用一些类库，通常通过require来进行引用，那么我们会发现在使用一些框架的时候，我们不写require也可以实例化各种类，这是怎么做到的呢？
    
    就是通过__autoload()和spl_autoload_register()
    
    __autoload($class_name)会在类找不到的时候自动调用这个函数，自动为参数赋值为未引用的类名
    
    例如 $a = new API();
    
    这时候API并没有引用，所以会调用__autoload函数，并且$class_name的值会变成‘API’。我们可以通过在
    __autoload函数中写require $class_name来达到自动引用的目的。
    spl_autoload_register()的，可以注册多个autoload函数，并且会使默认的__autoload函数失效。
    
    那我们会想，为什么不都写在__autoload函数里呢。
    
    
    原因如下：
    
        1、如果你的类放在不同的目录下__autoload里的函数逻辑会变得越来越复杂。
        
        2、如果你引用了第三方类库，第三方类库中如果使用了spl_autoload_register()会使你的autoload函数失效。
        
        3、使用spl_autoload_register()会使逻辑更清晰，每个类库可以有自己的autoload方法。