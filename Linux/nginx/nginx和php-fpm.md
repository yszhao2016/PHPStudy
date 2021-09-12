
CGI

    一种协议  一种标准（是 Web Server 与 Web Application 之间数据交换的一种协议。）

    CGI全称是“公共网关接口”(Common Gateway Interface)，HTTP服务器与你的或其它机器上的程序进行“交谈”的一种工具，
    其程序须运行在网络服务器上。
    
    CGI可以用任何一种语言编写，只要这种语言具有标准输入、输出和环境变量。如php,perl,tcl等。


FastCGI：同 CGI，是一种通信协议，但比 CGI 在效率上做了一些优化（常驻型）
         
         

PHP-CGI：是 PHP （Web Application）对 Web Server 提供的 CGI 协议的接口程序。

PHP-FPM：是 PHP（Web Application）对 Web Server 提供的 FastCGI 协议的接口程序，额外还提供了相对智能一些任务管
         
         进程包含 master 进程和 worker 进程两种进程
         
         master 进程只有一个，负责监听端口，接收来自 Web Server 的请求，
         而 worker 进程则一般有多个(具体数量根据实际需要配置)，
         每个进程内部都嵌入了一个 PHP 解释器，是 PHP 代码真正执行的地方。
         
         




nginx和php-fpm

    tcp socket
    
        允许通过网络进程之间的通信，也可以通过loopback进行本地进程之间通信
            
        tcp需要经过loopback，还要申请临时端口和tcp相关资源    
            
        
    unix socket
            
        允许在本地运行的进程之间进行通信。
        
        unix socket减少了不必要的tcp开销
        高并发时候不稳定，连接数爆发时，会产生大量的长时缓存，
        在没有面向连接协议的支撑下，大数据包可能会直接出错不返回异常
        并发量不超过1000，选择unix socket，因为是本地，可以避免一些检查操作(路由等)
         
       
       unix方式在处理请求的速度方面比tcp有明显优势，但在压力高的情况下，稳定性会差点
       
        
        fastcgi_pass unix:/dev/shm/php7.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include /etc/nginx/fastcgi_params;
    
    
        
    
    