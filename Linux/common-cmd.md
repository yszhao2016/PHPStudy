#常用命令
    
    一、匹配响应进程  并结束进程
        ps -ef|grep "php artisan card:"|grep -v grep  |cut -c 9-15|xargs kill