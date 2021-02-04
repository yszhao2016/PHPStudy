Vagrantfile配置文件详解
在vgdemo目录下，可以看到名为vagrantfile的文件
Vagrant使用Ruby开发，所以它的配置语法也是Ruby的。
修改完Vagrantfile配置后，必须用vagrant reload重启VM后，配置才能生效。

配置基本说明
Vagrant.configure("2") do |config|
    # ...
end
configure("2")描述的是使用Vagrant 2.0.x配置方式。
Vagrant 1.0.x的配置方式为:Vagrant::COnfig.run do |config| ...

box设置
config.vm.box = "boxIdentity"
配置Vagrant要去启用哪个box作为系统。这个也是我们在前面输入的vagrant init box boxIdentity中的所指定的box的名称。默认名称为base。
可以通过VBoxManager命令行工具设定VM。示例:

config.vm.provider "virtualbox" do |v|
    v.customize ["modifyvm", :id, "--name", "astaxie", "--memory", "512"]
end
这行设置通过调用VBoxManager的modifyvm命令，设置VM的名称为astaxie，内存为512MB。

网络设置
Vagrant有两种方式进行网络连接.
(1)host-only主机模式，意思是主机与虚拟机之间的网络互访。其他人访问不到你的虚拟机。
(2)bridge桥接模式，此模式下VM如同局域网中的一台独立的直接虚拟机，可以被其他机器访问。
config.vm.network: private_network, ip: "11.11.11.11"
这里设置为host-only模式，且虚拟机ip设置为"11.11.11.11"

hostname设置
config.vm.hostname = "go-app"
host用于识别虚拟主机。特别在有多台虚拟机时，务必进行设置。

     同步目录

除了默认的/vagrant同步目录外，还可以设置额外的同步目录:

config.vm.synced_folder "d:/local/dir", "/vm/dir/"
第一个参数是本地目录，第二个参数为虚拟机目录。

端口转发
config.vm.network: forwarded_port, guest: 80, host: 8080
设置将主机上的8080端口forward到虚拟机的80端口上

配置多台虚拟机：
Vagrant支持单机启动多台虚拟机，支持一个配置文件启动多台。

Vagrant.configure("2") do |config|
    config.vm.define :web do |web|
        web.vm.provider "virtualbox" do |v|
            v.customize ["modifyvm", :id, "--name", "web", "--memory", "512"]
        end
        web.vm.box = "base"
        web.vm.hostname = "web"
        web.vm.network :private_network, ip : "11.11.11.1"
    end
    
    config.vm.define :db do |db|
        db.vm.provider "virtualbox" do |v|
            v.customize ["modifyvm", :id, "--name", "db", "--memory", "512"]
        end
        db.vm.box = "base"
        db.vm.hostname = "db"
        db.vm.network :private_network, ip : "11.11.11.2"
    end
end
这里使用了:web和:db定义了两个VM，设置完后再使用vagrant up启动。可以通过vagrant ssh web和vagrant ss db分别登录指定虚拟机上。
验证两台虚拟机间的通信: (验证方法: 在web虚拟机上通过ssh登录到db虚拟机)
## 验证流程顺序
vagrant ssh web
@web: ssh 11.11.11.2
@db:
 