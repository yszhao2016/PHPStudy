#CGI  php-fpm与fastcgi、php-cgi
    
    1.CGI 是什么
    
        协议
        CGI是为了保证Web Server传递过来的数据是标准格式的，方便CGI程序的编写者
       
        Web Server（比如说Nginx）只是内容的分发者。比如，如果请求/index.html，那么Web Server会去文件系统中找到这个文件，
        发送给浏览器，这里分发的是静态数据。好了，如果现在请求的是/index.php，根据配置文件，Nginx知道这个不是静态文件，
        需要去找PHP解析器来处理，那么他会把这个请求简单处理后交给PHP解析器。Nginx会传哪些数据给PHP解析器呢？url要有吧，
        查询字符串也得有吧，POST数据也要有，HTTP header不能少吧，
        好的，CGI就是规定要传哪些数据、以什么样的格式传递给后方处理这个请求的协议。
        
        当Web Server收到/index.php这个请求后，会启动对应的CGI程序，这里就是PHP的解析器。
        接下来PHP解析器会解析php.ini文件，初始化执行环境，然后处理请求，再以规定CGI规定的格式返回处理后的结果，退出进程。
        web server再把结果返回给浏览器。
        
        
      2.FastCGI是什么
        
            协议
            
            CGI是个协议，跟进程什么的没关系。Fastcgi是CGI的升级版，一种语言无关的协议，FastCGI是用来提高CGI程序性能的
            
            
            标准的CGI对每个请求都会执行这些步骤，所以处理每个请求的时间会比较长。这明显不合理嘛！那么FastCGI是怎么做的呢？
            首先，FastCGI会先启一个master，解析配置文件，初始化执行环境，然后再启动多个worker。
            当请求过来时，master会传递给一个worker，然后立即可以接受下一个请求。这样就避免了重复的劳动，效率自然是高。
            而且当worker不够用时，master可以根据配置预先启动几个worker等着；
            当然空闲worker太多时，也会停掉一些，这样就提高了性能，也节约了资源。这就是"FastCGI"的对进程的管理（先姑且这么说）
            
            
            
      3.php-fpm是什么
      
            web服务器与PHP应用之间通过SAPI接口进行交互数据
            PHP提供了多种SAPI接口，例如 apache2hander、fastcgi、cli等等
            PHP的解释器是php-cgi  php-cgi只是个CGI程序，他自己本身只能解析请求，返回结果，不会管理进程 
            
            所以就有  pawn-fcgi  php-fpm     
            
            php-fpm的管理对象是php-cgi