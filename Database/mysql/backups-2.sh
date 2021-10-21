#!/bin/sh
for name in "$@"
do
    echo "========================="
    echo "Processing database $name"
    echo "-------------------------"
    now="$(date +'%Y_%m_%d_%H_%M_%S')"
    filename="$name"_backup_"$now".gz
    echo "File Saved as $filename"
    backupfolder="/vault/111/mysql_backup" # <=== 这里是备份保存的根目录
    fullpathbackupfile="$backupfolder/$filename"
    mysqldump --login-path=localbackup -x -f $1 | gzip > "$fullpathbackupfile"
    find "$backupfolder" -name "$name"_backup_* -mtime +8 -exec rm {} \;
    echo "========================="
    echo ""
done
exit 0