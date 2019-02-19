yum clean all

yum -y update

#Instalacion apache2
yum -y install httpd
firewall-cmd --permanent --add-port=80/tcp
firewall-cmd --permanent --add-port=443/tcp
firewall-cmd --reload

systemctl enable httpd
systemctl start httpd
systemctl status httpd

#Quitar pagina de inicio
mv /etc/httpd/conf.d/welcome.conf /etc/httpd/conf.d/welcome.save.conf

#Instalacion MariaDB
touch /etc/yum.repos.d/MariaDB.repo
echo "# MariaDB 10.3 CentOS repository list - created 2018-05-25 19:02 UTC
# http://downloads.mariadb.org/mariadb/repositories/
[mariadb]
name = MariaDB
baseurl = http://yum.mariadb.org/10.3/centos7-amd64
gpgkey=https://yum.mariadb.org/RPM-GPG-KEY-MariaDB
gpgcheck=1" >> /etc/yum.repos.d/MariaDB.repo

yum -y install MariaDB-server MariaDB-client

systemctl enable mariadb
systemctl start mariadb
systemctl status mariadb

#!/bin/bash
mysql -e "UPDATE mysql.user SET Password = PASSWORD('') WHERE User = 'root'"
mysql -e "DROP USER ''@'localhost'"
mysql -e "DROP USER ''@'$(hostname)'"
mysql -e "DROP DATABASE test"
mysql -e "FLUSH PRIVILEGES"

#Instalacion PHP
yum -y install rpm
yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum -y install epel-release yum-utils
yum-config-manager --disable remi-php54
yum-config-manager --enable remi-php73
yum -y install php php-cli php-fpm php-mysqlnd php-zip php-devel php-gd php-mcrypt php-mbstring php-curl php-xml php-pear php-bcmath php-json
yum  -y install php-mysql
yum -y install php-mysqlnd
rpm -qi php-mysqlnd

systemctl restart httpd.service
php -v

#Instalacion composer
yum -y install php-cli php-zip wget unzip
yum -y install curl
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer

#Instalar npm
curl -sL https://rpm.nodesource.com/setup_10.x | bash -
yum -y install nodejs
npm --version
npm -y install -g npm

#Descargar proyecto
yum -y install git
cd /var/www/html
git clone https://github.com/acallejp97/BolsadeTrabajo.git
cd BolsadeTrabajo/
composer install
npm install
npm run dev
chmod -R 775 /var/www/html/BolsadeTrabajo
chown -R apache.apache /var/www/html
chmod -R 777 /var/www/html/BolsadeTrabajo/storage/


mysql -e "DROP DATABASE TxJobs"
mysql -e "CREATE DATABASE TxJobs"
cd /var/www/html/BolsadeTrabajo
php artisan migrate --seed


#Preparacion proyecto
echo "DocumentRoot \"/var/www/html/BolsadeTrabajo/public\"
<Directory \"/var/www/html/BolsadeTrabajo\">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>" >> /etc/httpd/conf/httpd.conf

systemctl restart httpd
chmod -R 777 /var/www/html/BolsadeTrabajo

setenforce 0
setenforce 1
chcon -R -t httpd_sys_rw_content_t storage
setsebool -P httpd_can_network_connect_db=1