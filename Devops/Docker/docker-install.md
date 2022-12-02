#Centos 7 docker安装

##yum 安装docker 步骤
    1.安装依赖包：yum install -y yum-utils device-mapper-persistent-data lvm2
    
    2..更新yum缓存：yum makecache fast
    
    3.添加docker下载源地址：yum-config-manager --add-repo http://mirrors.aliyun.com/docker-ce/linux/centos/docker-ce.repo
    
    4.安装docker：yum install docker-ce（默认为最新版本）
    
    5.也可以选择指定版本选择安装docker：yum install docker-ce-18.12.1.ce
    
    
##dokcer 服务相关操作
    
    启动docker：systemctl start docker
    
    查看状态：systemctl status docker
    
    停掉服务：systemctl stop docker （需要停掉服务时在操作这个命令）
    
    加入开机启动项：systemctl enable docker
    
    查看docker版本：docker version
