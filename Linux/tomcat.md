1. 首先安装JDK
    yum -y install java-1.8.0-openjdk*

    默认的安装目录是在: /usr/lib/jvm/java-1.8.0-openjdk*


2.查看java版本：
    java -version


3 下载相应版本tomcat
    
    下载网址：https://tomcat.apache.org/download-80.cgi
    
    wget http://mirrors.tuna.tsinghua.edu.cn/apache/tomcat/tomcat-8/v8.5.39/bin/apache-tomcat-8.5.39.tar.gz  
    
    下载 Core 版本

4.解压

    tar -zxvf   xxx

5.配置服务器
    /tomcat/conf/server.xml

6.启动tomcat  需要等会儿8005端口起来
    /tomcat/bin/startup.sh

7.检查tomcat 是否启动成功
    
    ps -ef|grep "tomcat"
    netstat -ano |grep  8080


8.配置防火墙  （阿里云服务器 需要配置安全组  加相应端口）
    /etc/sysconfig/iptables
    service iptables status

