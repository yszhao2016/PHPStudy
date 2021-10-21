
solr  下载

[下载地址]  http://archive.apache.org/dist/lucene/solr/


tar -zxvf    solr.7.xx.tar.gz


/server/solr-webapp/webapp  发布网站（tomcat）



将 solr-7.x.x/server/lib/ext 目录下的所有jar包，拷贝到tomcat8的webapps/solr/WEB-INF/lib 目录下


cd solr-x.x.x/server/lib/ext

cp * -r /usr/local/solr/tomcat8/webapps/solr/WEB-INF/lib/


6.将 solr-7.5.0/server/lib 目录下，metrics-开头的5个jar包，拷贝到tomcat的webapps/solr/WEB-INF/lib 目录下                
cd solr-7.5.0/server/lib                
cp  metrics-* /usr/local/solr/tomcat8/webapps/solr/WEB-INF/lib/       


 7.将solr-7.5.0/dist 目录下，solr-dataimporthandler-开头的2个jar包，拷贝到tomcat的webapps/solr/WEB-INF/lib目录下                cd solr-7.5.0/dist                
    cp solr-dataimporthandler-* /usr/local/solr/tomcat8/webapps/solr/WEB-INF/lib/       

 8.修改tomcat的webapps/solr/WEB-INF 目录下，的web.xml，关联solr 和 solr_home                
    cd /usr/local/tomcat8/webapps/solr/WEB-INF                
    vim web.xml                
    添加                 
    <env-entry>                           
    <env-entry-name>solr/home</env-entry-name>                           
    <env-entry-value>/usr/local/solr/solr_home</env-entry-value>                           
    <env-entry-type>java.lang.String</env-entry-type>                 
    </env-entry>

9.到solr_home目录，在该目录下创建一个solr_core文件夹，用于存储solr数据文件                            
cd solr/solr/home     mkdir solr_core                


10.将solr_home 的 configsets/_default目录的conf文件夹，拷贝到solr_core目录下                            
cd configsets/_default  
cp -r conf ../../solr_core/


启动
usr/local/solr/bin/solr start -force












