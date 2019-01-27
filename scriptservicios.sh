# Update packages and Upgrade system
yum update -y && yum upgrade -y

## Install AMP
yum install apache2 -y
service apache2 restart

yum update -y && yum upgrade -y

yum install php7.2 -y
yum install php7.2-x    cli -y 
yum install php7.2-common -y
yum install php7.2-mbstring -y
yum install php7.2-intl -y 
yum install php7.2-xml -y 
yum install php7.2-mysql -y 
yum install php7.2-mcrypt -y
yum install mysql-server -y
yum install mysql-client-y
yum install libapache2-mod-php7.2 -y
yum install phpmyadmin -y
yum install php-mbstring -y
yum install php-gettext -y

echo "#Habilitar phpmyadmin" >> /etc/apache2/apache2.conf
echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf

# Reiniciar Apache
service apache2 restart
service mysql restart

yum install git
cd /var/www/html

git clone https://github.com/acallejp97/BolsadeTrabajo.git
cd BolsadeTrabajo

yum install composer
yum install npm
composer install
npm install --no-optional
php artisan migrate --seed
npm run dev