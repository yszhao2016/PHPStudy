Centos强制踢掉某登陆用户    

w  查看登录用户  如下

USER     TTY      FROM             LOGIN@   IDLE   JCPU   PCPU WHAT
zys      pts/4    221.6.206.26     11:05    0.00s  0.03s  0.02s sshd: zys [priv]  

pkill -kill -t   TTY值【pts/0|tty1】
