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

debconf-set-selections <<< 'mysql-server mysql-server/root_password password '$config_databaseMain_password
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password '$config_databaseMain_password

apt-get install -y --force-yes php7.0 php7.0-cli php-pear php-fpm nginx git \
    curl vim ruby npm nodejs mysql-server mysql-client php-mysql php7.0-sqlite \
    php-xdebug php-imagick php-mcrypt php-curl php-intl php-mbstring php-intl \
    build-essential software-properties-common libsqlite3-dev ruby1.9.1 ruby-dev

gem install mailcatcher

if ! [ -L /var/www/gyman ]; then
  rm -rf /var/www/gyman
  ln -fs /vagrant /var/www/gyman
fi

cp /vagrant/app/Resources/vagrant/nginx_server.conf /etc/nginx/sites-available/page.conf
ln -s /etc/nginx/sites-available/page.conf /etc/nginx/sites-enabled/page.conf

sed -i 's/;date.timezone =/date.timezone = Europe\/Warsaw/g' /etc/php/7.0/fpm/php.ini
sed -i 's/;date.timezone =/date.timezone = Europe\/Warsaw/g' /etc/php/7.0/cli/php.ini

sudo sed -i 's/bind-address\t\t= 127.0.0.1/bind-address\t\t= 0.0.0.0/g' /etc/mysql/mysql.conf.d/mysqld.cnf
sudo service mysql restart
mysql -u root -proot -e "use mysql; update user set host='%' where user='root' and host='127.0.0.1'; grant all privileges on *.* to 'root'@'%' with grant option; flush privileges;"

less /vagrant/app/Resources/vagrant/xdebug.ini >> /etc/php/7.0/mods-available/xdebug.ini
less /vagrant/app/Resources/vagrant/mailcatcher.conf >> /etc/init/mailcatcher.conf

mailcatcher --http-ip=0.0.0.0

service nginx restart
service php7.0-fpm restart

mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS $config_databaseMain_name; GRANT ALL ON $config_databaseMain_name.* to '$config_databaseMain_user'@'127.0.0.1' identified by '$config_databaseMain_password'; GRANT ALL ON $config_databaseMain_name.* to '$config_databaseMain_user'@'$config_server_ip' identified by '$config_databaseMain_password';"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_rio;"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_dende;"
mysql -h 127.0.0.1 -u root -proot  -t -e "CREATE DATABASE IF NOT EXISTS gyman_extreme;"

less /vagrant/app/Resources/vagrant/.bash_aliases >> /home/vagrant/.bash_aliases

#ln -s /var/www/gyman /home/vagrant/www
sudo ln -s /usr/bin/nodejs /usr/bin/node

su vagrant <<'EOF'
cd /vagrant
#
#wget --quiet http://getcomposer.org/composer.phar
#php composer.phar install
#
#php app/console doctrine:schema:create
#php app/console doctrine:fixtures:load -n
#
#php app/console doctrine:schema:create --club=rio --em=tenant
#php app/console doctrine:schema:create --club=extreme --em=tenant
#php app/console doctrine:schema:create --club=dende --em=tenant
#
#php app/console doctrine:fixtures:load -n --club=rio --em=tenant
#php app/console doctrine:fixtures:load -n --club=extreme --em=tenant
#php app/console doctrine:fixtures:load -n --club=dende --em=tenant
#
#php app/console gyman:club:assign-user uirapuruadg+admin@gmail.com dende
#php app/console gyman:club:assign-user uirapuruadg+admin@gmail.com rio
#php app/console gyman:club:assign-user uirapuruadg+admin@gmail.com extreme

npm install
./node_modules/.bin/bower install

php app/console assets:install web --symlink
./node_modules/.bin/grunt production

#crontab -l > /tmp/mycron
less /vagrant/app/Resources/vagrant/crontab >> /tmp/mycron
crontab /tmp/mycron
rm /tmp/mycron

EOF

