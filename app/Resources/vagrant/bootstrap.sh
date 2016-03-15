#!/usr/bin/env bash
parse_yaml() {
   local prefix=$2
   local s='[[:space:]]*' w='[a-zA-Z0-9_]*' fs=$(echo @|tr @ '\034')
   sed -ne "s|^\($s\)\($w\)$s:$s\"\(.*\)\"$s\$|\1$fs\2$fs\3|p" \
        -e "s|^\($s\)\($w\)$s:$s\(.*\)$s\$|\1$fs\2$fs\3|p"  $1 |
   awk -F$fs '{
      indent = length($1)/2;
      vname[indent] = $2;
      for (i in vname) {if (i > indent) {delete vname[i]}}
      if (length($3) > 0) {
         vn=""; for (i=0; i<indent; i++) {vn=(vn)(vname[i])("_")}
         printf("%s%s%s=\"%s\"\n", "'$prefix'",vn, $2, $3);
      }
   }'
}

eval $(parse_yaml /vagrant/app/config/vagrant.yml "config_");

apt-get update

# ustawia haslo dla root mysql
debconf-set-selections <<< 'mysql-server mysql-server/root_password password '$config_databaseMain_password
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password '$config_databaseMain_password

# ustawienie danych dla phpmyadmina
debconf-set-selections <<< 'phpmyadmin phpmyadmin/dbconfig-install boolean true'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/app-password-confirm password applicationpass'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/admin-pass password '$config_databaseMain_password
debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/app-pass password applicationpass'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2'

apt-get install -y --force-yes apache2 mysql-server-5.6 php5 php-pear php5-curl php5-intl php5-mcrypt php5-mysql php5-xdebug php5-imagick mc git curl vim
if ! [ -L /var/www/gyman ]; then
  rm -rf /var/www/gyman
  ln -fs /vagrant /var/www/gyman
fi

cp /vagrant/app/Resources/vagrant/vhost.conf /etc/apache2/sites-available/gyman.conf
a2ensite gyman.conf
a2enmod rewrite

sed -i 's/;date.timezone =/date.timezone = Europe\/Warsaw/g' /etc/php5/apache2/php.ini
sed -i 's/;date.timezone =/date.timezone = Europe\/Warsaw/g' /etc/php5/cli/php.ini

service apache2 restart
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS $config_databaseMain_name; GRANT ALL ON $config_databaseMain_name.* to '$config_databaseMain_user'@'127.0.0.1' identified by '$config_databaseMain_password'; GRANT ALL ON $config_databaseMain_name.* to '$config_databaseMain_user'@'$config_server_ip' identified by '$config_databaseMain_password';"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_rio;"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_dende;"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_extreme;"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_armada;"

less /vagrant/app/Resources/vagrant/xdebug.ini >> /etc/php5/mods-available/xdebug.ini
less /vagrant/app/Resources/vagrant/.bash_aliases >> /home/vagrant/.bash_aliases

ln -s /var/www/gyman /home/vagrant/www

su vagrant <<'EOF'
cd /var/www/gyman
wget --quiet http://getcomposer.org/composer.phar

#install application
#./run_start.sh

EOF
