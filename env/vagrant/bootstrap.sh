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

eval $(parse_yaml /vagrant/env/vagrant/vagrant.yml "config_");

mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "CREATE DATABASE IF NOT EXISTS $config_databaseMain_name;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "GRANT ALL ON *.* to '$config_databaseMain_user'@'%' identified by '$config_databaseMain_password' WITH GRANT OPTION;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "GRANT ALL ON *.* to '$config_databaseMain_user'@'localhost' identified by '$config_databaseMain_password' WITH GRANT OPTION;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "CREATE DATABASE IF NOT EXISTS gyman_rio; CREATE DATABASE IF NOT EXISTS gyman_dende; CREATE DATABASE IF NOT EXISTS gyman_extreme;"
mysql -u $config_databaseMain_user -p$config_databaseMain_password -t -e "FLUSH PRIVILEGES;"
service mysql restart

echo '127.0.0.1    gyman.vagrant' >> /etc/hosts
less /vagrant/env/vagrant/.bash_aliases >> /home/vagrant/.bash_aliases

su vagrant <<'EOF'
cd /vagrant
composer install --prefer-source --no-interaction

composer prepare-default
composer prepare-tenant

yarn install
./node_modules/.bin/bower install

php app/console assets:install web --symlink
./node_modules/.bin/grunt development

less /vagrant/env/vagrant/crontab >> /tmp/mycron
crontab /tmp/mycron
rm /tmp/mycron
EOF
