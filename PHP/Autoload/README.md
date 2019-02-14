#  PHP  自动加载

【解决】：
  到处手动 require 与 include 载入类文件


【解决方案】
    1. 魔术方法   __autoload()  实现

                实例: Solution1
            
                缺陷：
                    加载不同路径的文件
                    一个项目中只允许有一个 __autoload() 函数

                应用场景：
                    小项目，实现基本的自动加载
           

    2. 函数  spl_autoload_register() 实现


    3.composer 自动加载类加载

