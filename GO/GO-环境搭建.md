
一 、GO 源码包下载

    https://studygolang.com/dl
    
    tar -zxvf 压缩包名
    
    cp -rp  文件名  /usr/local/go
    
二、环境变量设置

    vim /etc/profile  # 文件末尾添加以下内容
    export GOPATH=/home/www/golang/gopath 
    export GOROOT=/usr/local/go
    export GOARCH=386
    export GOOS=linux
    export GOTOOLS=$GOROOT/pkg/tool
    export PATH=$PATH:$GOROOT/bin:$GOPATH/bin
    
    或者    
    export PATH=$PATH:/usr/local/go/bin    
    
    重新加载 profile 文件，加载环境变量到内存
    source /etc/profile    
    

三、验证 GO
    
    go version
    
    
    
    注意：GOPATH路径,要自己动手创建：mkdir -p /home/www/golang/gopath
    
    主要变量说明：
    
    1、GOROOT就是go的安装路径
    
    2、GOPATH是作为编译后二进制的存放目的地和import包时的搜索路径 (其实也是你的工作目录, 你可以在src下创建你自己的go源文件, 然后开始工作)
    
    3、GOPATH目录结构
    
    goWorkSpace // (goWorkSpace为GOPATH目录)
      -- bin    // golang编译可执行文件存放路径，可自动生成。
      -- pkg    // golang编译的.a中间文件存放路径，可自动生成。
      -- src    // 源码路径。按照golang默认约定，go run，go install等命令的当前工作路径（即在此路径下执行上述命令）。
      
      
    GOPATH之下主要包含三个目录: bin、pkg、src
    
    （1） bin目录主要存放可执行文件;
    
    （2） pkg目录存放编译好的库文件, 主要是*.a文件;
    
    （3） src目录下主要存放go的源文件
    
    （4） GOPATH可以是一个目录列表, go get下载的第三方库, 一般都会下载到列表的第一个目录里面
    
    （5） 需要把GOPATH中的可执行目录也配置到环境变量中, 否则你自行下载的第三方go工具就无法使用了, 操作如下:
    
    （6） GOBIN go install编译存放路径。不允许设置多个路径。
         可以为空。为空时则遵循“约定优于配置”原则，可执行文件放在各自GOPATH目录的bin文件夹中
        （前提是：package main的main函数文件不能直接放到GOPATH的src下面
    
    参考文章：https://github.com/astaxie/build-web-application-with-golang/blob/master/zh/01.2.md
    
    GOPATH下的src目录就是接下来开发程序的主要目录，所有的源码都是放在这个目录下面，那么一般我们的做法就是一个目录一个项目，
    例如: $GOPATH/src/mymath 表示mymath这个应用包或者可执行应用，这个根据package是main还是其他来决定，main的话就是可执行应用，其他的话就是应用包。


        
4、基础命令
    
    go install mymath    
    
    go build  //main.go 所在目录 产生可执行文件
    
5. 遇到问题

     默认使用的是proxy.golang.org，在国内无法访问
     
     go env -w GOPROXY=https://goproxy.cn
    
6. gin安装

    git clone https://github.com/gin-gonic/gin.git
    go install github.com/gin-gonic/gin
       


go get -v -u github.com/peterh/liner github.com/derekparker/delve/cmd/dlv   