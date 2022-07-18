#CENTOS下通过CERTBOT工具申请免费LET‘S ENCRYPT泛域名SSL证书
    yum install -y epel-release
    yum install certbot python2-certbot-nginx



    certbot certonly --preferred-challenges dns --manual -d webstudy.cc -d *.webstudy.cc --server https://acme-v02.api.letsencrypt.org/directory
certbot certonly --preferred-challenges dns --manual -d vhieg.com -d *.vhieg.com --server https://acme-v02.api.letsencrypt.org/directory
报错
pip uninstall urllib3
pip install urllib3
pip install --upgrade six
yum install python-urllib3 -y



    echo "0 0,12 * * * root python -c 'import random; import time; time.sleep(random.random() * 3600)' && certbot renew -q" | sudo tee -a /etc/crontab > /dev/null



# 执行以下这条命令则自动更新证书的时间【这里的-q是一个参数，请参考certbot命令大全】
    certbot -q renew


certbot移除证书的方法【先移除后删除】：

第一步运行命令：

    certbot revoke --cert-path /etc/letsencrypt/archive/www.mydomain.com/cert1.pem

第二步：运行命令
certbot delete

然后会提示域名对应的编号数字，输入对应数字则删除证书



nginx 配置

     ssl_certificate /etc/letsencrypt/live/vhieg.com/fullchain.pem;
     ssl_certificate_key /etc/letsencrypt/live/vhieg.com/privkey.pem;
