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

apt-get install -y --force-yes apache2 mysql-server-5.6 php5 php-pear php5-curl php5-intl php5-mcrypt php5-mysql php5-xdebug php5-imagick mc git curl vim ruby

curl -sL https://deb.nodesource.com/setup_4.x | bash -
apt-get install -y nodejs

# sudo gem install mailcatcher

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

less /vagrant/app/Resources/vagrant/xdebug.ini >> /etc/php5/mods-available/xdebug.ini
less /vagrant/app/Resources/vagrant/.bash_aliases >> /home/vagrant/.bash_aliases

ln -s /var/www/gyman /home/vagrant/www

su vagrant <<'EOF'
cd /var/www/gyman
npm install
./node_modules/.bin/bower install
./node_modules/.bin/grunt production
EOF

su vagrant <<'EOF'
cd /var/www/gyman
wget --quiet http://getcomposer.org/composer.phar
php composer.phar install

php app/console doctrine:schema:create
php app/console doctrine:fixtures:load -n

php app/console doctrine:schema:create --club=rio --em=tenant
php app/console doctrine:schema:create --club=extreme --em=tenant
php app/console doctrine:schema:create --club=dende --em=tenant

php app/console doctrine:fixtures:load -n --club=rio --em=tenant
php app/console doctrine:fixtures:load -n --club=extreme --em=tenant
php app/console doctrine:fixtures:load -n --club=dende --em=tenant

php app/console fos:user:create admin admin@gyman.pl admin --super-admin
php app/console gyman:club:assign-user admin@gyman.pl dende
php app/console gyman:club:assign-user admin@gyman.pl rio
php app/console gyman:club:assign-user admin@gyman.pl extreme

EOF
