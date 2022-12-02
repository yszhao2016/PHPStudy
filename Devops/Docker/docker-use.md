mkdir -p /etc/docker
tee /etc/docker/daemon.json <<-'EOF'
{
    "registry-mirrors": [
        "https://kfwkfulq.mirror.aliyuncs.com",
        "https://2lqq34jg.mirror.aliyuncs.com",
        "https://pee6w651.mirror.aliyuncs.com",
        "https://registry.docker-cn.com",
        "http://hub-mirror.c.163.com"
    ],
    "dns": ["8.8.8.8","8.8.4.4"]
}
EOF

systemctl daemon-reload

systemctl restart docker



docker images ls  查看id

docker  export id 》 centost.tar


docker run  -i  -t    centos:latest   /bin/bash
-i    表示可以交互输入
-t   打开一个终端


docker ps -l      查看容器


docker -d -p  主机端口：容器端口  -p 主机端口：容器端口   容器名

运行容器
docker run -d -p 80:80   -p 8022:22 centos

进入正在运行容器
docker exec -it 容器ID(38036afaa4e6)   /bin/bash


docker container rm     docker rm
docker  image rm         docker rmi


docker rm $(docker container ls -aq)   注-q 显示id

docker  ps -a    docker container ls -a

docker images     docker image ls

docker commit   容器名称   docker id/新image名      创建image方法  不提倡


--Dockerfile--
FROM centos
RUN  yum -y install vim
--Dockerfile--

docker build -t  docker id/新容器名   目录



docker pause      容器名   #暂停容器
docker unpause    容器名   #恢复容器运行


docker stop     容器名     #容器中执行exit 就回到此状态  
docker start -i 容器名

docker tag 原镜像名  新镜像名
dokcer  rmi 镜像名