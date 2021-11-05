#常用命令
    
    一、匹配响应进程  并结束进程
    
        ps -ef|grep "php artisan card:"|grep -v grep  |cut -c 9-15|xargs kill
        
        
        
        
    二、查看系统服务
    
        systemctl list-unit-files|grep php   
        
        systemctl list-units --type=service --all