#Centos强制踢掉某登陆用户    

    w  查看登录用户  如下
    
USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
zys      pts/4    221.6.206.26     11:05    0.00s  0.03s  0.02s sshd: zys [priv]  

pkill -kill -t   TTY值【pts/0|tty1】


    linux下查找目录下的所有文件中是否包含指定字符串
    
find . | xargs grep -ri "IBM"


    查找目录下的所有文件中是否含有某个字符串,并且只打印出文件名

find . | xargs grep -ril "IBM


#添加用户
    groupadd 用户组名
    useradd 用户名 -g 用户组

    示例：
        groupadd www
        useradd -g www -s /sbin/nologin www
        



