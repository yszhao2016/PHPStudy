#Docker 搭建 lnmp  

一、安装docker

        更新yum包
            sudo yum update
    
        卸载已安装的docker（如果安装过的话）
            yum remove docker  docker-common docker-selinux docker-engine
    
        安装需要的软件包
            sudo yum install -y yum-utils device-mapper-persistent-data lvm2
            
        设置yum源
            sudo yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
        
        可以查看所有仓库中所有docker版本，并选择特定版本安装
            yum list docker-ce --showduplicates | sort -r
            
        重新安装docker
            sudo yum install docker-ce
            
        开机自启动
            systemctl enable docker    
            
         docker pull nginx:alpine
         docker pull php:7.3-fpm-alpine   
         Alpine 操作系统是一个面向安全的轻型 Linux 发行版
二、安装mysql

    docker pull mysql:5.6
    
    
    docker run \
    --name web-mysql \
    -d -p 3306:3306 \
    -e MYSQL_ROOT_PASSWORD=123456789 \
    -v /web/mysql/data:/var/lib/mysql \
    -v /web/mysql/conf.d:/etc/mysql/conf.d \
    -v /etc/localtime:/etc/localtime:ro \
    c54721a9eb1
    

               
三、安装PHP


    docker pull php:7.3-fpm
    
    
    docker run \
    --name web-php \
    -d -p 9000:9000 \
    -v /web/php-fpm/etc/:/usr/local/etc/\
    -v /web/nginx/web:/var/www/html \
    -v /web/localtime:/etc/localtime:ro \
    --link web-mysql \
    953f20b0e810
    
    使用命令的进入容器内部 docker exec -it 890ec4245c56 /bin/bash          
    
    进去后，输入命令 docker-php-ext-install mysqli 等待安装好  
    
    
四、安装nginx
    
     docker pull nginx
     
     
     docker run \
     --name nginx-php7.1 \
     -d -p 80:80 \
     -v /web/nginx/conf/nginx.conf:/etc/nginx/nginx.conf/  \
     -v /web/nginx/conf/conf.d:/etc/nginx/conf.d \
     -v /home/www/htdocs/php:/usr/share/nginx/html  \
     -v /web/nginx/logs:/var/log/nginx/  \
     -v /etc/localtime:/etc/localtime:ro \
     --link php7.1 \
     436be79de93f
     
     
     新建配置文件nginx.conf   default.conf
     
nginx.conf 配置文件

    user  nginx;
    worker_processes  1;
    
    error_log  /var/log/nginx/error.log warn;
    pid        /var/run/nginx.pid;
    
    
    events {
        worker_connections  1024;
    }
    
    
    http {
        include       /etc/nginx/mime.types;
        default_type  application/octet-stream;
    
        log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
                          '$status $body_bytes_sent "$http_referer" '
                          '"$http_user_agent" "$http_x_forwarded_for"';
    
        access_log  /var/log/nginx/access.log  main;
    
        sendfile        on;
        #tcp_nopush     on;
    
        keepalive_timeout  65;
    
        #gzip  on;
    
        include /etc/nginx/conf.d/*.conf;
    }
         
        
default.conf配置文件
    server {
        listen       80;
        server_name  localhost;
    
        #charset koi8-r;
        access_log  /var/log/nginx/host.access.log  main;
        
        location / {
                root   /usr/share/nginx/html/;
                index  index.html index.htm index.php;
        }
    
        #error_page  404              /404.html;
        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
        root   /usr/share/nginx/html;
        }
    
        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}
        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        
        location ~ \.php$ {
                root           html;
                fastcgi_pass     web-php:9000;
                fastcgi_index  index.php;
                fastcgi_param  SCRIPT_FILENAME  /var/www/html/$fastcgi_script_name;
                include        fastcgi_params;
        }
    
        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        #location ~ /\.ht {
        #    deny  all;
        #}
    }
        
        