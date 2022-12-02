#安装docker

##通过docker安装Jenkins

    docker search jenkins
    
    下载镜像
    docker pull jenkins/jenkins
    
    docker images
    
    mkdir -p /home/jenkins_home
    
    chmod 777 /home/jenkins_home
    
    
```
-d	后台运行容器，并返回容器ID
-uroot	使用 root 身份进入容器，推荐加上，避免容器内执行某些命令时报权限错误
-p 9095:8080	将容器内8080端口映射至宿主机9095端口，这个是访问jenkins的端口
-p 50000:50000	将容器内50000端口映射至宿主机50000端口
--name jenkins	设置容器名称为jenkins
-v /home/jenkins_home:/var/jenkins_home	 :/var/jenkins_home目录为容器jenkins工作目录，我们将硬盘上的一个目录挂载到这个位置，方便后续更新镜像后继续使用原来的工作目录
-v /etc/localtime:/etc/localtime	让容器使用和服务器同样的时间设置
jenkins/jenkins	镜像的名称，这里也可以写镜像ID
```
    
    docker run -d -uroot -p 9095:8080 -p 50000:50000 --name jenkins -v /home/jenkins_home:/var/jenkins_home -v /etc/localtime:/etc/localtime jenkins/jenkins
    
    日志查看
    docker logs jenkins
    
    
    docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
    
    
##    
    



