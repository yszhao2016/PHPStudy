
**问题一、mysqldump备份数据时提示Got error: 1044: Access denied for user ... when using LOCK TABLES**

    用来备份的数据库用户没有lock table的权限
           1. 换一个权限更高的用户
           
           2.mysqldump的另一个选项:--single-transaction
           
           3.加上-skip-lock-tables选项
           
           mysqldump -uyourusername -pyourpassword --single-transaction yourdb > yourdb.sql 
           
           mysqldump -u dbuser -ppass db --skip-lock-tables > db.sql
           
           ps:在导出时,加上--skip-lock-tables选项即可,但这个方法在数据量过大的话,会出现卡死,
              所以最好经常检查下sql备份,避免在要使用备份的时候杯具.
              
              
**问题二、MySQL用 mysqldump 命令实现数据库备份，需将密码明文方式显示在命令上，但在运行时会报错**            


    解决方法：用 mysql_config_editor 生成登录密钥。
    
     mysql_config_editor set --login-path=mydb --host=localhost --user=test --password
     
     回车输入密码后，会生成一个名为 mydb 的登陆点，密钥保存在 ~/mylogin.cnf 中
    
    后在mysql命令行中，只需要指定登陆点名称（如：mydb）即可：
    mysql --login-path=mydb
    mysqldump 备份指令：
    mysqldump --login-path=mydb test_db >> backup.sql