#git常见问题

## 自己搭建git服务器



## ssh端口号修改 remote url set
    默认22端口     zhaoyoushui@119.3.123.46:home/git/repo/appmarket.git
    修33222端口后  ssh://zhaoyoushui@119.3.123.46:33222/home/git/repo/appmarket.git
    
    
##删除远程分支    
    git branch -r -d 分支名
       
##删除本地分支
    git branch -d   分支名        
    
    
##如何配置 git ssh keys ？

    在本地生成 ssh 私钥 / 公钥 文件
    将「公钥」添加到 git 服务（github、gitlab、coding.net 等）网站后台
    测试 git ssh 连接是否成功
    接下来以添加 github ssh keys 为例，请注意替换 github 文件名：

    # 运行以下命令，一直回车，文件名可随意指定
    ssh-keygen -t rsa -b 4096 -C "kaiye@macbook" -f ~/.ssh/github

    # 如果不是默认密钥 id_rsa ，则需要以下命令注册密钥文件
    ssh-add ~/.ssh/github

    # 将 pub 公钥的内容粘贴到线上网站的后台
    cat ~/.ssh/github.pub

    # 测试 git ssh 是否连接成功
    ssh -T git@github.com    
    
    
##已提交至版本库（执行了 git commit）

     每次提交都会生成一个 hash 版本号，通过以下命令可查阅版本号并将其回滚：
     
     git log
     git reset <版本号>
      
     
     如果需要「回滚至上一次提交」，可直接使用以下命令：
     
     git reset head~1   