#!/bin/sh
DATE=$(date +%Y%m%d)
/usr/local/mysql/bin/mysqldump  --login-path=mydb  --skip-lock-tables rageframe2  > /home/www/bak_sql/mysql_dbxx_$DATE.sql;
find /home/www/bak_sql/ -mtime +15 -name '*.sql' -exec rm -rf {} \;