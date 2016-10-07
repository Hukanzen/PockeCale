#!/bin/bash

#SSLを用いる場合、ServerNameの指定は手動で行ってください。

USER="main"
GROUP="main"
SSL=0 #use SSL is 1

if [ $USER = "NULL" ]
then
	echo "USER please";
fi

groupadd $GROUP

useradd -g $GROUP $USER

#create swap 
#mkswap /swapfile
#swapon /swapfile
#cp /etc/fstab /etc/fstab.bak
#echo "/swapfile none swap defaults 0 0" >> /etc/fstab

yum update  -y
yum install -y crontabs vixie-cron
yum install -y httpd php php-mbstring
yum install -y http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
yum install -y mysql-client mysql-server php-mysql mod_ssl

mysql --version

echo "Please Any Key..."
read tmp

chkconfig httpd  on
chkconfig mysqld on

chown $USER:$GROUP -R /var/www/html
chmod -R 555 /var/www/html

service crond start

echo "Please Password for $USER"
passwd $USER

service iptables start
#iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 22     -j ACCEPT
#iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 25     -j ACCEPT
sed -i -e 's/-A INPUT -j REJECT --reject-with icmp-host-prohibited/#-A INPUT -j REJECT --reject-with icmp-host-prohibited/' /etc/sysconfig/iptables
iptables-restore < /etc/sysconfig/iptables
iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 80     -j ACCEPT
iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 443    -j ACCEPT
iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 3306     -j ACCEPT


service iptables save
service iptables restart

sed -i -e 's/index\.html\.var/index\.php/' /etc/httpd/conf/httpd.conf


sed -i -e 's/SELINUX=enforcing/SELINUX=disabled/' /etc/selinux/config
setenforce 0

if [ $SSL -ne 1 ]
then
	sed -i -e 's/#DocumentRoot "\/var\/www\/html"/DocumentRoot "\/var\/www\/html"/' /etc/httpd/conf.d/ssl.conf
	sed -i -e 's/SSLCertificateFile \/etc\/pki\/tls\/certs\/localhost.crt/SSLCertificateFile \/etc\/pki\/tls\/certs\/server.crt/' /etc/httpd/conf.d/ssl.conf
	sed -i -e 's/SSLCertificateKeyFile \/etc\/pki\/tls\/private\/localhost.key/SSLCertificateKeyFile \/etc\/pki\/tls\/certs\/server.key/' /etc/httpd/conf.d/ssl.conf

	sh make_ssl.sh
	mv /etc/httpd/conf.d/ssl.conf /etc/httpd/conf.d/ssl.conf.bak
fi
service httpd start
service mysqld start
