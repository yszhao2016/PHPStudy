
1.不实例化类如何调用方法
    
    静态方法
    利用类的放射机制
    
2. 跨域问题


    1、jsonp跨域
        JSONP（JSON with Padding：填充式JSON)，应用JSON的一种新方法，
        JSON、JSONP的区别：
          1、JSON返回的是一串数据、JSONP返回的是脚本代码(包含一个函数调用)
          2、JSONP 只支持get请求、不支持post请求
          (类似往页面添加一个script标签，通过src属性去触发对指定地址的请求,故只能是Get请求)


    2.PHP端修改header(CORS 跨域资源共享)
        header(‘Access-Control-Allow-Origin:*’);//允许所有来源访问
        header(‘Access-Control-Allow-Method:POST,GET’);//允许访问的方式      
    
    
    3、nginx反向代理：
    　　www.baidu.com/index.html需要调用www.sina.com/server.php，
        可以写一个接口www.baidu.com/server.php，
        由这个接口在后端去调用www.sina.com/server.php并拿到返回值，
        然后再返回给index.html
     
    4.chrome  Cookie 的 SameSite 属性  问题 
         当设置SameSite=None时，必须同时设置Secure   使用https
         
           
         
3.接口安全性 

    请求来源(身份)是否合法？
    请求参数被篡改？
    请求的唯一性(不可复制)   
  
  
    重放攻击  
            md5(timestamp+rand(0, 1000)); 
            
            服务端
            服务端第一次在接收到这个nonce的时候做下面行为：
            1 去redis中查找是否有key为nonce:{nonce}的string
            2 如果没有，则创建这个key，把这个key失效的时间和验证timestamp失效的时间一致，比如是60s。
            3 如果有，说明这个key在60s内已经被使用了，那么这个请求就可以判断为重放请求。
    
    幂等性问题
    
    数据合法性（参数篡改） 
            签名
            
    限流机制 
        常用的限流算法有令牌桶和漏桶算法    
        
    黑名单机制
        如果此appid进行过很多非法操作，或者说专门有一个中黑系统，经过分析之后直接将此appid列入黑名单，所有请求直接返回错误码；
        
            
     https://zhuanlan.zhihu.com/p/96803302

4.更擅长

    mysql 业务逻辑     服务器


5 thinkPHP  yii2  larvel 差异  
 
    速度 thinkphp  yii2  larvel
    
    thinkphp
        简单易上手
        1.借助成熟的Java思想
        2.易于上手，有丰富的中文文档；学习成本低，社区活跃度高
        3.框架的兼容性较强，PHP4和PHP5完全兼容、完全支持UTF8等。
        4.适合用于中小项目的开发
        
     yii2
        1.纯OOP
        2.用于大规模Web应用
        3.模型使用方便
        4.开发速度快，运行速度也快。性能优异且功能丰富
        5.使用命令行工具。
        6.支持composer包管理工具
        
     laravel 
        优点
        1.laravel的设计思想是很先进的，非常适合应用各种开发模式TDD, DDD 和BDD
        2.支持composer包管理工具
        3.集合了php 比较新的特性，以及各种各样的设计模式，Ioc 容器，依赖注入等。
        
        缺点
        1.基于组件式的框架，所以比较臃肿    
    
6 http请求的三种方法
 
    socket编程  fsockopen  fputs
    curl扩展  curl_init  curl_url  curl_setopt  curl_exec()  curl_close()
    第三方类库

7.过滤数组空元素
    
    array_filter 

    
8.多对多关系  表设计  

     2张表设计 数据量小的时候   find_in_set()
     3张表     数据量大
     
     
9.攻击 
    
    XSS 跨站脚本攻击
    
        addslashes  给单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符）加上反斜线转义, 防止SQL注入
        
        strip_tags、       删除html 标签
        htmlspecialchars   转换为html实体
        去除 HTML 和 PHP 标记并转换为 HTML 实体
        
    DDOS
    
    
    CSRF（Cross-site request forgery），中文名称：跨站请求伪造
    
                    可以通过通过判断来源和加 Token 的方式来防范。
    
    SQL注入
    
    
    中间人攻击（Man-in-the-middle attack 缩写：MITM）
    https://blog.csdn.net/qq_26816591/article/details/83685299

    
10.web防止表单重复提交问题 
    
    1.防止表单重复提交问题
    
    
    2.接口幂等性
    
        接口幂等性就是用户对于同一操作发起的一次请求或者多次请求的结果是一致的，不会因为多次点击而产生了副作用
        
        2.1 什么情况下需要保证接口的幂等性
            
            在增删改查4个操作中，尤为注意就是增加或者修改
            
        2.2 那么如何设计接口才能做到幂等呢？
                2.2.1 通过代码逻辑判断实现    
                
                2.2.2 使用token机制实现
                

11.设计模式
    
    单列
    工厂
    依赖注入
    容器
    面板
    服务定位
    
    
12.加密

    单向加密：通过对数据进行摘要计算生成密文，密文不可逆推还原。算法代表：Base64，MD5，SHA;
    
    双向加密：与单向加密相反，可以把密文逆推还原成明文，双向加密又分为对称加密和非对称加密。
    
    对称加密：指数据使用者必须拥有相同的密钥才可以进行加密解密，就像彼此约定的一串暗号。算法代表：DES，3DES，AES，IDEA，RC4，RC5;
    
    非对称加密：相对对称加密而言，无需拥有同一组密钥，非对称加密是一种“信息公开的密钥交换协议”。非对称加密需要公开密钥和私有密钥两组密钥，公开密钥和私有密钥是配对起来的，
    也就是说使用公开密钥进行数据加密，只有对应的私有密钥才能解密。这两个密钥是数学相关，用某用户密钥加密后的密文，只能使用该用户的加密密钥才能解密。如果知道了其中一个，并
    不能计算出另外一个。因此如果公开了一对密钥中的一个，并不会危害到另外一个密钥性质。这里把公开的密钥为公钥，不公开的密钥为私钥。算法代表：RSA，DSA。
    
    
        
 13.SSO (Single Sign On 单点登陆)
    
    Central Authentication Service（中央身份验证服务） 
    
    
14.  文件完整性

    用户需要上传和下载一个重要的资料文件，应该如何判断用户本次是否上传成功和下载成功了呢？
    是否仅仅通过代码来判断当前次的请求发送结束或者收到数据结束就可以了吗？
    
    答案是否定的。文件的上传与下载极易出错，尤其涉及使用断点续传方式上传或下载的文件
    
    验证机制来确保文件上传下载后的完整性
    
    
15. Redis的数据类型
    
    
    String（字符串）
                SET runoob "菜鸟教程"
                GET runoob
        
    Hash（哈希）
    
            Redis hash 是一个键值(key=>value)对集合。
            Redis hash 是一个 string 类型的 field 和 value 的映射表，hash 特别适合用于存储对象。
            
            HMSET runoob field1 "Hello" field2 "World"
            HGET runoob field1
            HLEN runoob
            
            应用场景
                商品维度计数
                    对商品喜欢数，评论数，鉴定数，浏览数进行计数
                用户维度计数
                    对用户动态数、关注数、粉丝数、喜欢商品数、发帖数等计数
                    用户维度计数同商品维度计数都采用 Hash. 为User定义个key 为 user:
                    为每种数值定义hashkey, 譬如关注数follow
                    $redis->hSet('user:100000', 'follow ', 5);  // 添加uid为10000的用户follow 为5
                      
                    $redis->hIncrBy('user:100000', 'follow ', 1); 
 
    List（列表）  
            lpush runoob redis
            lpush runoob rabbitmq
            LPOP
            LLEN 
            
    Set（集合）
            
            Redis 的 Set 是 string 类型的无序集合
            根据集合内元素的唯一性，第二次插入的元素将被忽略。 
            
            sadd runoob redis1
            sadd runoob rabbitmq2
            
            smembers runoob  
            SDIFF  test runoob  
            
    zset(sorted set：有序集合)
    
        Redis zset 和 set 一样也是string类型元素的集合,且不允许重复的成员。
        不同的是每个元素都会关联一个double类型的分数。redis正是通过分数来为集合中的成员进行从小到大的排序。
    
        zset的成员是唯一的,但分数(score)却可以重复    
            
                zadd
                zincrby
                zrevrange
                zrevrangebyscore
        应用
            存储社交关系
            譬如将用戶的好友/粉丝/关注，可以存在一个sorted set中，score可以是timestamp
            默认集合按照score递增排序
            这样求两个人的共同好友的操作，可能就只需要用求交集命令即可
            $redis->zAdd('user:1000:follow', 1463557212, '1001');
             
            #uid为1000用户关注uid为1001 , score值设定时间戳1463557212
             
            $redis->zAdd('user:1000:follow', 1463557333, '1002');
            
            
            排行榜
         
        
        
        
        
Redis和kafka同可以作为消息队列，他们区别在哪里
Redis秒杀抢购（被问频率比较高，还会问注意哪些细节，这里我当时胡思乱想，其实也不知道考虑周不周全，最好百度了解一下细节方案）
Redis和mysql数据如何保持一致（面试官的问法可能会不是这么直接，其实考验的就是这个知识点）
    
    
如何限制同一个ip并发访问
           
    用redis来设置一个key，key映射对应的ip，然后每次ip访问后都给对应的key加一，假如小于10，
    就继续访问，相反拒绝访问，同时给这个key设置过期时间一分钟。
    https://www.cnblogs.com/wt645631686/p/6868845.html     
    


mysql  索引类型 
    
    B+ 树
    
    hash(哈希)

JS字符串False转Boolean  
  
    0、-0、null、""、false、undefined 或 NaN    
    
php字符串False转Boolean
    
     0、-0、"" "0"
     字符串 int 相加   int  "123"+"1" =124
     字符串  相加   "ab"+"ac"  waring
     
     
php发送http请求有三种方式

    file_get_contents()
       【GET请求】
        
            1 $data = array( 'name'=>'zhezhao','age'=>'23');
            2 $query = http_build_query($data); 
            3 $url = 'http://localhost/get.php';//这里一定要写完整的服务页面地址，否则php程序不会运行 
            4 $result = file_get_contents($url.'?'.$query); 
            
        【POST请求】
            
            1 $data = array('user'=>'jiaxiaozi','passwd'=>'123456');
            2 $requestBody = http_build_query($data);
            3 $context = stream_context_create(['http' => ['method' => 'POST', 'header' => "Content-Type: application/x-www-form-urlencoded\r\n"."Content-Length: " . mb_strlen($requestBody), 'content' => $requestBody]]);
            4 $response = file_get_contents('http://server.test.net/login', false, $context);
    
    
    curl库 发送请求。
        curl_init
        curl_setopt
        curl_exec
        
    fsocket发送。     
    http_build_query()函数的作用是使用给出的关联（或下标）数组生成一个经过 URL-encode 的请求字符串。  
    
    
Composer 依赖管理工具  



请写出自少两个支持回调处理的 PHP 函数，并自己实现一个支持回调的 PHP 函数

    array_map,array_filter, array_walk
    
抽象类

    抽象的类不能被实例化。任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。
    被定义为抽象的方法只是声明了其调用方式（参数），不能定义其具体的功能实现。  
    
    
this self parent

    this是指向当前对象的指针
    
    self是指向当前类的指针
        一般self使用来指向类中的静态变量
        self是指向类的本身，只跟类有关，跟任何对象实例无关
    
    parent是指向父类的指针
        使用parent来调用父类的构造函数

static  global



 Yii 2中的组件是什么？
 
    组件是一组独立的代码，用于在控制器中执行特定任务。
    Yii应用程序构建在作为写入规范的对象的组件上。 组件是CComponent或其派生类的实例。
    使用组件主要涉及访问其属性以及提升/处理其事件。
    基类CComponent指定如何定义属性和事件


什么事面向对象？主要特征是什么？

    主要特征：封装、继承、多态。  
    
    
面向对象中接口和抽象类的区别及应用场景?

    1、有抽象方法的类叫做抽象类，抽象类中不一定只有抽象方法，抽象方法必须使用abstract关键字定义。
    
    2、接口中全部是抽象方法,方法不用使用abstract定义。
    
    3、当多个同类的类要设计一个上层，通常设计为抽象类，当多个异构的类要设计一个上层，通常设计为接口。
    
    用面向对象来实现A对象继承B和C对象
    
    Interface B{ ... }
    
    Interface C{ ... }
    
    Class A implements B,C{ ... }    
    
    
对于大流量的网站,您采用什么样的方法来解决访问量问题?
 
     优化程序，优化数据库，如果程序和数据库已经最优化，使用以下解决方法：
     
     1、确定当前服务器设备是否满足流量需求。
     
     2、使用Memcache缓存技术，把动态内容缓存到文件中，动态网页直接调用这些文件，而不必再访问数据库。
     
     3、禁止外部盗链，图片和文件外部盗链会给服务器带来大量的负载压力，可以通过refer来禁止外部盗链，或者使用apache来配置禁止盗链。
     
     4、控制大文件的下载，大文件的下载对于非SCSI硬盘来说会占用大量的资源，导致服务器的响应能力下降。
     
     5、使用不同的主机分流主要流量，使服务器均衡负载。
     
     6、使用流量统计软件统计分析网站流量，可以知道哪些地方耗费了大量的流量，哪些页面需要再进行优化。   
     
     
 web应用中,数据库的读取频率远高于写入频率, 如何优化MySQL而应对此种情景?
 
    使用memcache缓存技术，将动态数据缓存到文件，访问动态页面时直接调用缓存文件，
    而不必重新访问数据库，这样就减少了查询数据库的次数。
 
    如果网站的访问量很大，可以把数据库读写服务器分开，使用多台服务器去处理数据库查询，
    使用较少的服务器去处理数据库的写入和修改。    
    
    
了解XSS攻击吗? 如何防止 ?

    XSS是跨站脚本攻击，首先是利用跨站脚本漏洞以一个特权模式去执行攻击者构造的脚本，然
    后利用不安全的Activex控件执行恶意的行为。

    使用htmlspecialchars()函数对提交的内容进行过滤，使字符串里面的特殊符号实体化。
    

SQL注入漏洞产生的原因 ? 如何防止?

    SQL注入产生的原因：程序开发过程中不注意规范书写sql语句和对特殊字符进行过滤，
    导致客户端可以通过全局变量POST和GET提交一些sql语句正常执行。    
    
    人为提高代码的逻辑性，使其变得更严谨，滴水不漏。 比如说 增加判断条件，增加输入过滤等，但是智者千虑必有一失。
    （不推荐）
    sql 语句的预处理
    
        预处理: 就是在程序正式编译之前，事先处理，因为有些功能实现是一样的，只是发生了一些简单的值替换
    
    select * from A where tablename.id = '1;select * from B' 参数不会执行sql    
    
    
mysql 查询优化    

    对查询进行优化，要尽量避免全表扫描，首先应考虑在 where 及 order by 涉及的列上建立索引
    
    应尽量避免在 where 子句中对字段进行 null 值判断，否则将导致引擎放弃使用索引而进行全表扫描
    
    应尽量避免在 where 子句中使用 != 或 <> 操作符，否则将引擎放弃使用索引而进行全表扫描
    
    应尽量避免在 where 子句中使用 or 来连接条件
    如果一个字段有索引，一个字段没有索引，将导致引擎放弃使用索引而进行全表扫描
    
    索引并不是越多越好，索引固然可以提高相应的 select 的效率，但同时也降低了 insert 及 update 的效率，
    因为 insert 或 update 时有可能会重建索引，所以怎样建索引需要慎重考虑，视具体情况而定。
    一个表的索引数最好不要超过6个，若太多则应考虑一些不常使用到的列上建的索引是否有 必要
    
    查询使用模糊查询，两端使用%%，导致全表扫描