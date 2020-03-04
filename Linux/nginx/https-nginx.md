#HTTPS Nginx 配置

    **一、检测并安装 ssl 模块**

            1.查看 nginx 是否安装 http_ssl_module 模块
            
                命令      /usr/local/nginx/sbin/nginx -V
                
            2.重新编译（如果没有源码需下载相应源码版本源码包）
            
                命令     ./configure --prefix=/usr/local/nginx --with-http_ssl_module
                
            3.使用 make 命令编译（使用make install会重新安装nginx），此时当前目录会出现 objs 文件夹   
                    
                命令    make
            
            4.用新的 nginx 文件覆盖当前的 nginx 文件
            
                命令    cp ./objs/nginx /usr/local/nginx/sbin/
                
            5. 再次查看安装的模块   
            
            
      二、配置Nginx
      
      server {
                  listen              80;  
                  listen 443 ssl;  # 1.1版本后这样写
                 
                  #301跳转方法
                  if ($scheme = http ) {
                    return 301 https://$host$request_uri;
                  }
                  
                  server_name www.domain.com; #填写绑定证书的域名
                  
                   #禁止在header中出现服务器版本，防止***利用版本漏洞***
                  server_tokens off;
                  
                  #ssl on;                    #http https 一起使用需关闭   不需要加！！！！
                  ssl_certificate 1_www.domain.com_bundle.crt;  # 指定证书的位置，绝对路径
                  ssl_certificate_key 2_www.domain.com.key;  # 绝对路径，同上
                  ssl_session_timeout 5m;
                  ssl_protocols TLSv1 TLSv1.1 TLSv1.2; #按照这个协议配置
                  ssl_ciphers ECDHE-RSA-AES128-GCM-SHA256:HIGH:!aNULL:!MD5:!RC4:!DHE;#按照这个套件配置
                  ssl_prefer_server_ciphers on;
                  location / {
                      root   html; #站点目录，绝对路径
                      index  index.html index.htm;
                  }
          }
            
   

         
    
    
    
    
    
    
                
    