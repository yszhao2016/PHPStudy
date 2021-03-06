# PHP Design Patterns

简介
--------

什么是设计模式？

    设计模式是一套代码设计「经验的总结」。项目中「合理的」运用设计模式可以「巧妙的解决很多问题」
    经验的总结：抱着「代码虐我千百遍，我待代码如初恋」的心态，最终得出来的「套路」。



解决  代码之间的耦合问题

高内聚,低耦合？

    内聚是从功能角度来度量模块内的联系，一个好的内聚模块应当恰好做一件事。它描述的是模块内的功能联系；

    耦合是软件结构中各模块之间相互连接的一种度量，耦合强弱取决于模块间接口的复杂程度、进入或访问一个模块的点以及通过接口的数据



模式3大类

    1. 创建型
    
        在软件工程中，创建型设计模式是处理对象创建机制的设计模式，试图以适当的方式来创建对象。
        对象创建的基本形式可能会带来设计问题，亦或增加了设计的复杂度。
        创建型设计模式通过控制这个对象的创建方式来解决此问题。
        
        1. 单例模式
        2. 工厂模式
        3. 抽象工厂模式
                
            适用：       一个系统要独立于它的产品的创建、组合和表示时
                
                         一个系统要由多个产品系列中的一个来配置时
                
                         需要强调一系列相关的产品对象的设计以便进行联合使用时
                
                         提供一个产品类库，而只想显示它们的接口而不是实现时

    2. 结构型
    
        在软件工程中，结构型设计模式是通过识别实体之间关系来简化设计的设计模式。
        
        1.适配器模式
        
            特点：
            
                将各种截然不同的函数接口封装成统一的API。
            
            应用：
            
                PHP中的数据库操作有MySQL,MySQLi,PDO三种，可以用适配器模式统一成一致，使不同的数据库操作，统一成一样的API。
                类似的场景还有cache适配器，可以将memcache,redis,file,apc等不同的缓存函数，统一成一致。
            
            
        2.装饰器模式
        
        
        
        
        

    3. 行为型
    
        在软件工程中，行为设计模式是识别对象之间的通用通信模式并实现这些模式的设计模式。
        通过这样做，这些模式增加了执行此通信的灵活性。
        
        1.观察者模式
       
                特点：
                    观察者模式(Observer)，当一个对象状态发生变化时，依赖它的对象全部会收到通知，并自动更新。
                    观察者模式实现了低耦合， 非侵入式的通知与更新机制。
                
                
                应用：
                    一个事件发生后，要执行一连串更新操作。传统的编程方式，就是在事件的代码之后直接加入处理的逻辑。
                    当更新的逻辑增多之后，代码会变得难以维护。这种方式是耦合的，侵入式的，增加新的逻辑需要修改事件的主体代码。
                
                
        2.策论模式



