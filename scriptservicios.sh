yum clean all

yum -y update

yum -y install httpd
firewall-cmd --permanent --add-port=80/tcp
firewall-cmd --permanent --add-port=443/tc
firewall-cmd --reload

systemctl start httpd
systemctl enable httpd
systemctl status httpd

#Quitar pagina de inicio
rm /etc/httpd/conf.d/welcome.conf /etc/httpd/conf.d/welcome.save.conf

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

#Instalacion PhpMyAdmin
yum -y install epel-release
yum -y install phpmyadmin
rm /etc/httpd/conf.d/phpMyAdmin.conf
echo "# phpMyAdmin - Web based MySQL browser written in php
# 
# Allows only localhost by default
#
# But allowing phpMyAdmin to anyone other than localhost should be considered
# dangerous unless properly secured by SSL

Alias /phpMyAdmin /usr/share/phpMyAdmin
Alias /phpmyadmin /usr/share/phpMyAdmin

<Directory /usr/share/phpMyAdmin/>
   AddDefaultCharset UTF-8

   <IfModule mod_authz_core.c>
     # Apache 2.4
     <RequireAny>
       #Require ip 127.0.0.1
       #Require ip ::1
       Require all granted
     </RequireAny>
   </IfModule>
   <IfModule !mod_authz_core.c>
     # Apache 2.2
     Order Deny,Allow
     Deny from All
     Allow from 127.0.0.1
     Allow from ::1
   </IfModule>
</Directory>

<Directory /usr/share/phpMyAdmin/setup/>
   <IfModule mod_authz_core.c>
     # Apache 2.4
     <RequireAny>
       Require ip 127.0.0.1
       Require ip ::1
     </RequireAny>
   </IfModule>
   <IfModule !mod_authz_core.c>
     # Apache 2.2
     Order Deny,Allow
     Deny from All
     Allow from 127.0.0.1
     Allow from ::1
   </IfModule>
</Directory>

# These directories do not require access over HTTP - taken from the original
# phpMyAdmin upstream tarball
#
<Directory /usr/share/phpMyAdmin/libraries/>
    Order Deny,Allow
    Deny from All
    Allow from None
</Directory>

<Directory /usr/share/phpMyAdmin/setup/lib/>
    Order Deny,Allow
    Deny from All
    Allow from None
</Directory>

<Directory /usr/share/phpMyAdmin/setup/frames/>
    Order Deny,Allow
    Deny from All
    Allow from None
</Directory>

# This configuration prevents mod_security at phpMyAdmin directories from
# filtering SQL etc.  This may break your mod_security implementation.
#
#<IfModule mod_security.c>
#    <Directory /usr/share/phpMyAdmin/>
#        SecRuleInheritance Off
#    </Directory>
#</IfModule>" >> /etc/httpd/conf.d/phpMyAdmin.conf

rm etc/phpMyAdmin/config.inc.php
echo "<?php
/**
 * phpMyAdmin configuration file, you can use it as base for the manual
 * configuration. For easier setup you can use "setup/".
 *
 * All directives are explained in Documentation.html and on phpMyAdmin
 * wiki <http://wiki.phpmyadmin.net>.
 */

/*
 * This is needed for cookie based authentication to encrypt password in
 * cookie
 */
$cfg['blowfish_secret'] = '1sKRza4CX7rELR6sWEZd7lS700fQN5dI'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */

/**
 * Server(s) configuration
 */
$i = 0;

// The $cfg['Servers'] array starts with $cfg['Servers'][1].  Do not use
// $cfg['Servers'][0]. You can disable a server config entry by setting host
// to ''. If you want more than one server, just copy following section
// (including $i incrementation) serveral times. There is no need to define
// full server array, just define values you need to change.
$i++;
$cfg['Servers'][$i]['host']          = 'localhost'; // MySQL hostname or IP address
$cfg['Servers'][$i]['port']          = '';          // MySQL port - leave blank for default port
$cfg['Servers'][$i]['socket']        = '';          // Path to the socket - leave blank for default socket
$cfg['Servers'][$i]['connect_type']  = 'tcp';       // How to connect to MySQL server ('tcp' or 'socket')
$cfg['Servers'][$i]['extension']     = 'mysqli';    // The php MySQL extension to use ('mysql' or 'mysqli')
$cfg['Servers'][$i]['compress']      = FALSE;       // Use compressed protocol for the MySQL connection
                                                    // (requires PHP >= 4.3.0)
$cfg['Servers'][$i]['controluser']   = '';          // MySQL control user settings
                                                    // (this user must have read-only
$cfg['Servers'][$i]['controlpass']   = '';          // access to the "mysql/user"
                                                    // and "mysql/db" tables).
                                                    // The controluser is also
                                                    // used for all relational
                                                    // features (pmadb)
$cfg['Servers'][$i]['auth_type']     = 'cookie';    // Authentication method (config, http or cookie based)?
$cfg['Servers'][$i]['user']          = '';          // MySQL user
$cfg['Servers'][$i]['password']      = '';          // MySQL password (only needed
                                                    // with 'config' auth_type)
$cfg['Servers'][$i]['only_db']       = '';          // If set to a db-name, only
                                                    // this db is displayed in left frame
                                                    // It may also be an array of db-names, where sorting order is relevant.
$cfg['Servers'][$i]['hide_db']       = '';          // Database name to be hidden from listings
$cfg['Servers'][$i]['verbose']       = '';          // Verbose name for this host - leave blank to show the hostname

$cfg['Servers'][$i]['pmadb']         = '';          // Database used for Relation, Bookmark and PDF Features
                                                    // (see scripts/create_tables.sql)
                                                    //   - leave blank for no support
                                                    //     DEFAULT: 'phpmyadmin'
$cfg['Servers'][$i]['bookmarktable'] = '';          // Bookmark table
                                                    //   - leave blank for no bookmark support
                                                    //     DEFAULT: 'pma_bookmark'
$cfg['Servers'][$i]['relation']      = '';          // table to describe the relation between links (see doc)
                                                    //   - leave blank for no relation-links support
                                                    //     DEFAULT: 'pma_relation'
$cfg['Servers'][$i]['table_info']    = '';          // table to describe the display fields
                                                    //   - leave blank for no display fields support
                                                    //     DEFAULT: 'pma_table_info'
$cfg['Servers'][$i]['table_coords']  = '';          // table to describe the tables position for the PDF schema
                                                    //   - leave blank for no PDF schema support
                                                    //     DEFAULT: 'pma_table_coords'
$cfg['Servers'][$i]['pdf_pages']     = '';          // table to describe pages of relationpdf
                                                    //   - leave blank if you don't want to use this
                                                    //     DEFAULT: 'pma_pdf_pages'
$cfg['Servers'][$i]['column_info']   = '';          // table to store column information
                                                    //   - leave blank for no column comments/mime types
                                                    //     DEFAULT: 'pma_column_info'
$cfg['Servers'][$i]['history']       = '';          // table to store SQL history
                                                    //   - leave blank for no SQL query history
                                                    //     DEFAULT: 'pma_history'
$cfg['Servers'][$i]['verbose_check'] = TRUE;        // set to FALSE if you know that your pma_* tables
                                                    // are up to date. This prevents compatibility
                                                    // checks and thereby increases performance.
$cfg['Servers'][$i]['AllowRoot']     = TRUE;        // whether to allow root login
$cfg['Servers'][$i]['AllowDeny']['order']           // Host authentication order, leave blank to not use
                                     = '';
$cfg['Servers'][$i]['AllowDeny']['rules']           // Host authentication rules, leave blank for defaults
                                     = array();
$cfg['Servers'][$i]['AllowNoPassword']              // Allow logins without a password. Do not change the FALSE
                                     = TRUE;       // default unless you're running a passwordless MySQL server
$cfg['Servers'][$i]['designer_coords']              // Leave blank (default) for no Designer support, otherwise
                                     = '';          // set to suggested 'pma_designer_coords' if really needed
$cfg['Servers'][$i]['bs_garbage_threshold']         // Blobstreaming: Recommented default value from upstream
                                     = 50;          //   DEFAULT: '50'
$cfg['Servers'][$i]['bs_repository_threshold']      // Blobstreaming: Recommented default value from upstream
                                     = '32M';       //   DEFAULT: '32M'
$cfg['Servers'][$i]['bs_temp_blob_timeout']         // Blobstreaming: Recommented default value from upstream
                                     = 600;         //   DEFAULT: '600'
$cfg['Servers'][$i]['bs_temp_log_threshold']        // Blobstreaming: Recommented default value from upstream
                                     = '32M';       //   DEFAULT: '32M'
/*
 * End of servers configuration
 */

/*
 * Directories for saving/loading files from server
 */
$cfg['UploadDir'] = '/var/lib/phpMyAdmin/upload';
$cfg['SaveDir']   = '/var/lib/phpMyAdmin/save';

/*
 * Disable the default warning that is displayed on the DB Details Structure
 * page if any of the required Tables for the relation features is not found
 */
$cfg['PmaNoRelation_DisableWarning'] = TRUE;

/*
 * phpMyAdmin 4.4.x is no longer maintained by upstream, but security fixes
 * are still backported by downstream.
 */
$cfg['VersionCheck'] = FALSE;
?>" >> etc/phpMyAdmin/config.inc.php

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

