4.添加新应用API
新部署的YII只有backend和frontend，我们手动添加api应用

4.1 复制frontend下的所有文件到api文件夹，批量替换frontend为api
4.2 打开D:\upupw\vhosts\mxq.com\common\config\bootstrap.php，复制包含frontend的那一行，并将frontend改为api，为应用增加别名。
4.3 打开D:\upupw\vhosts\mxq.com\environments\index.php，复制包含frontend的行，改为api，Development和Production下的setWritable和setCookieValidationKey都要做相应复制和修改
4.4 复制D:\upupw\vhosts\mxq.com\environments\dev和D:\upupw\vhosts\mxq.com\environments\prod文件夹下的frontend到相同目录下，改名为api
4.5 执行3.3的操作，通过 http://api.mxq.com 访问新添加的应用


