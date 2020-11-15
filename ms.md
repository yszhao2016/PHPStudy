
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

    2.PHP端修改header
        header(‘Access-Control-Allow-Origin:*’);//允许所有来源访问
        header(‘Access-Control-Allow-Method:POST,GET’);//允许访问的方式      
    CORS 跨域资源共享
    
    3、nginx反向代理：
　　www.baidu.com/index.html需要调用www.sina.com/server.php，
    可以写一个接口www.baidu.com/server.php，
    由这个接口在后端去调用www.sina.com/server.php并拿到返回值，
    然后再返回给index.html
     

3.接口安全性 
  
    https
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
    
    XSS
    DDOS
    CSRF（Cross-site request forgery），中文名称：跨站请求伪造
    SQL注入
    
10.防止表单重复提交问题
    
    
    



11.设计模式
    
    单列
    工厂
    依赖注入
    容器
    面板
    服务定位
    
    
        
        
     