FROM

FROM scratch    #制作 base image
FROM centos
FROM ubuntu:12.1



LABEL

LABEL   maintainer='zhaoyoushui@gmail.com'
LABEL   version="1.0"
LABEL   description="This is description" 



RUN

RUN yum update && yum install -y vim \python-dev  

注 避免无用分层   合并多条命令成一行
    复杂的run 用反斜杠换行



WORKDIR

WORKDIR /root   #没有目录  自动创建目录

注   用WORKDIR  不要用  RUN cd
尽量使用绝对目录！



ADD and COPY  本地文件添加到image中  

ADD   解压缩功能

ADD  test.tat.gz

WORKDIR  /root
ADD  hello  test/   #/root/test/hello

WORKDIR /root
COPY hello test/

注：
	COPY优于ADD
	远程文件  run  curl  wget



ENV

ENV MYSQL_VERSION 5.6  #设置常量
RUN apt-get install -y mysql-server="${MYSQL_VERSION}" \
&& rm -rf  /var/lib/api/lists/*   #引用常量






VOLUME  and  EXPOSE   存储和网络
CMD  and  ENTRYPOINT



---ENTRYPOINT-----  
==============

让容器以应用程序或者服务的形式运行
不会被忽略，一定会执行
最佳实践：写一个shell脚本作为entrypoint
	COPY docker-entrypoint.sh  /usr/local/bin/
	ENTRYPOINT ["docker-entrypoint.sh"]
===============

---Dockerfile1
FROM centos
ENV name Docker
ENTRYPOINT  echo  "hello $name"

---Dockerfile2
FROM centos
ENV name Docker
ENTRYPOINT  ["/bin/echo" , "hello $name"]
ENTRYPOINT  ["/bin/bash",''-c"."echo  hello $name"]



----CMD--------
容器启动时默认执行的命令	 	  
	注  docker run  直接输出   docker run -it  docker  命令   会覆盖CMD   

如果docker run 指定了其他命令    CMD命令被忽略

如果定义了多个CMD ，只有最后一个会执行