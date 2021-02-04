server {
    listen       80; #监听80端口，接收http请求
    server_name  www.example.com; #就是网站地址
    root /usr/local/etc/nginx/www/huxintong_admin; # 准备存放代码工程的路径
    #路由到网站根目录www.example.com时候的处理
    location / {
        index index.php; #跳转到www.example.com/index.php
        autoindex on;
    }   

    #当请求网站下php文件的时候，反向代理到php-fpm
    location ~ \.php$ {
        include /usr/local/etc/nginx/fastcgi.conf; #加载nginx的fastcgi模块
        fastcgi_intercept_errors on;
        fastcgi_pass   127.0.0.1:9000; #nginx fastcgi进程监听的IP地址和端口
    }
}


 upstream php-cluster {
        server 127.0.0.1:9000 max_fails=3 fail_timeout=10s;
        server 192.168.216.55:9000 max_fails=3 fail_timeout=10s;
 }

location ~.*\.php$ {

               fastcgi_pass    php-cluster;
               fastcgi_index   index.php;
               fastcgi_param   SCRIPT_FILENAME $document_root$fastcgi_script_name;
               include         fastcgi_params;
 }



events {
    worker_connections  1024;
}


http {
    server {
    }
    server {
    }
}
    



www.example.com
        |
        |
      Nginx
        |
        |
路由到www.example.com/index.php
        |
        |
加载nginx的fast-cgi模块
        |
        |
fast-cgi监听127.0.0.1:9000地址
        |
        |
www.example.com/index.php请求到达127.0.0.1:9000
        |
        |
php-fpm 监听127.0.0.1:9000
        |
        |
php-fpm 接收到请求，启用worker进程处理请求
        |
        |
php-fpm 处理完请求，返回给nginx
        |
        |
nginx将结果通过http返回给浏览器




负载均衡
nginx 的 upstream目前支持 4 种方式的分配 

    1)、轮询（默认） 
          每个请求按时间顺序逐一分配到不同的后端服务器，如果后端服务器down掉，能自动剔除。 
          交替访问
    2)、weight 
          指定轮询几率，weight和访问比率成正比，用于后端服务器性能不均的情况。 
    2)、ip_hash 
          每个请求按访问ip的hash结果分配，这样每个访客固定访问一个后端服务器，可以解决session的问题。  
    3)、fair（第三方） 
          按后端服务器的响应时间来分配请求，响应时间短的优先分配。  
    4)、url_hash（第三方）
    
    nginx内置策略包含加权轮询和ip hash
    
    加权轮询算法分为先深搜索和先广搜索，那么nginx采用的是先深搜索算法，即将首先将请求都分给高权重的机器，直到该机器的权值降到了比其他机器低，才开始将请求分给下一个高权重的机器