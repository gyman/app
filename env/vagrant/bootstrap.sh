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

sed -i 's/SendEnv LANG/# SendEnv LANG/g' /etc/ssh/ssh_config

mkdir -p /var/www
chown -R vagrant:vagrant /var/www

ln -fs /vagrant /var/www/gyman

eval $(parse_yaml /vagrant/env/vagrant/vagrant.yml "config_");

export DEBIAN_FRONTEND="noninteractive"
debconf-set-selections <<< "mariadb-server mysql-server/root_password password $config_databaseMain_password"
debconf-set-selections <<< "mariadb-server mysql-server/root_password_again password $config_databaseMain_password"

locale-gen en_US en_US.UTF-8 hu_HU hu_HU.UTF-8
dpkg-reconfigure locales

apt-get install -y python-software-properties
add-apt-repository -y ppa:ondrej/php
apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
add-apt-repository 'deb [arch=amd64,i386] http://mariadb.kisiek.net/repo/10.2/ubuntu zesty main'
apt-get update
apt-get upgrade
apt-get install -y --force-yes php7.1 php7.1-cli php-pear php-fpm nginx git \
    curl vim mariadb-server mariadb-client php7.1-sqlite \
    php-xdebug php7.1-intl build-essential software-properties-common libsqlite3-dev \
    php7.1-xml php7.1-curl php7.1-cli php7.1-common php7.1-bcmath php7.1-mysql php7.1-mbstring \
    php7.1-json php7.1-mcrypt php7.1-sqlite3 php7.1-xsl php-mongodb php-imagick \
    mongodb tcl ruby-dev npm nodejs

gem install mailcatcher
echo "@reboot root $(which mailcatcher) --ip=0.0.0.0" >> /etc/crontab
update-rc.d cron defaults
echo "sendmail_path = /usr/bin/env $(which catchmail) -f 'www-data@localhost'" >> /etc/php/7.1/mods-available/mailcatcher.ini
phpenmod mailcatcher
/usr/bin/env $(which mailcatcher) --ip=0.0.0.0

#redis

cd /tmp
curl -O http://download.redis.io/redis-stable.tar.gz
tar xzvf redis-stable.tar.gz
cd redis-stable
make
make test
make install
mkdir /etc/redis
mkdir /var/lib/redis
cp /tmp/redis-stable/redis.conf /etc/redis
sed -i 's/supervised no/supervised systemd/g' /etc/redis/redis.conf
sed -i 's/dir .\//dir \/var\/lib\/redis/g' /etc/redis/redis.conf
sed -i 's/bind 127.0.0.1/# bind 127.0.0.1/g' /etc/redis/redis.conf
sed -i 's/protected-mode yes/protected-mode no/g' /etc/redis/redis.conf
cp /vagrant/env/vagrant/redis.service /etc/systemd/system/redis.service
systemctl start redis
systemctl status redis
systemctl enable redis

#nginx
rm /etc/nginx/sites-enabled/default
cp /vagrant/env/vagrant/nginx_server.conf /etc/nginx/sites-available/page.conf
ln -s /etc/nginx/sites-available/page.conf /etc/nginx/sites-enabled/page.conf

sed -i 's/;date.timezone =/date.timezone = Europe\/Warsaw/g' /etc/php/7.1/fpm/php.ini
sed -i 's/;date.timezone =/date.timezone = Europe\/Warsaw/g' /etc/php/7.1/cli/php.ini

sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 25M/g' /etc/php/7.1/fpm/php.ini
sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 25M/g' /etc/php/7.1/cli/php.ini

sed -i 's/post_max_size = 8M/post_max_size = 25M/g' /etc/php/7.1/fpm/php.ini
sed -i 's/post_max_size = 8M/post_max_size = 25M/g' /etc/php/7.1/cli/php.ini

sed -i 's/www-data/vagrant/g' /etc/php/7.1/fpm/pool.d/www.conf
sed -i 's/www-data/vagrant/g' /etc/nginx/nginx.conf

less /vagrant/env/vagrant/xdebug.ini > /etc/php/7.1/mods-available/xdebug.ini
service php7.1-fpm restart
service nginx restart

chown vagrant:vagrant /var/run/php/php7.1-fpm.sock
chown vagrant:vagrant /var/log/nginx

echo 'KexAlgorithms +diffie-hellman-group1-sha1' >> /etc/ssh/sshd_config
service ssh restart

sed -i 's/bind-address\t\t= 127.0.0.1/bind-address\t\t= 0.0.0.0/g' /etc/mysql/my.cnf

mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "CREATE DATABASE IF NOT EXISTS $config_databaseMain_name;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "GRANT ALL ON *.* to '$config_databaseMain_user'@'%' identified by '$config_databaseMain_password' WITH GRANT OPTION;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "GRANT ALL ON *.* to '$config_databaseMain_user'@'localhost' identified by '$config_databaseMain_password' WITH GRANT OPTION;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "CREATE DATABASE IF NOT EXISTS gyman_rio; CREATE DATABASE IF NOT EXISTS gyman_dende; CREATE DATABASE IF NOT EXISTS gyman_extreme;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "FLUSH PRIVILEGES;"
service mysql restart
pkill -f mysqld

sudo update-rc.d mysql defaults

echo '127.0.0.1    gyman.vagrant' >> /etc/hosts

sed -i 's/bind_ip = 127.0.0.1/#bind_ip = 127.0.0.1/g' /etc/mongodb.conf
service mongodb restart

less /vagrant/env/vagrant/.bash_aliases >> /home/vagrant/.bash_aliases

sudo ln -s /usr/bin/nodejs /usr/bin/node

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/bin/composer
chmod +x /usr/bin/composer

su vagrant <<'EOF'
cd /vagrant
composer install --prefer-source --no-interaction

php app/console doctrine:schema:create --no-interaction --quiet --env=dev
php app/console doctrine:fixtures:load --append --env=dev --no-interaction --quiet --fixtures=src/Gyman/Bundle/ClubBundle/DataFixtures/StandardConnection

php app/console doctrine:schema:create --club=rio
php app/console doctrine:fixtures:load --env=dev --no-interaction --quiet --fixtures=src/Gyman/Bundle/AppBundle/DataFixtures/Club --club=rio

php app/console doctrine:schema:create --club=extreme
php app/console doctrine:fixtures:load --env=dev --no-interaction --quiet --fixtures=src/Gyman/Bundle/AppBundle/DataFixtures/Club --club=extreme

php app/console doctrine:schema:create --club=dende
php app/console doctrine:fixtures:load --env=dev --no-interaction --quiet --fixtures=src/Gyman/Bundle/AppBundle/DataFixtures/Club --club=dende

#npm install
#./node_modules/.bin/bower install

php app/console assets:install web --symlink
#./node_modules/.bin/grunt production

less /vagrant/env/vagrant/crontab >> /tmp/mycron
crontab /tmp/mycron
rm /tmp/mycron
EOF
