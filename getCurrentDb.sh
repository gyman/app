#!/bin/bash

ssh root@gyman.pl "mysqldump -u root -p gyman_rio | gzip -c > /tmp/backup.sql.gz"
scp root@gyman.pl:/tmp/backup.sql.gz /tmp
ssh root@gyman.pl "rm /tmp/backup.sql.gz"

gunzip -c /tmp/backup.sql.gz | mysql -u root -proot -hgyman.vagrant gyman_rio
rm /tmp/backup.sql.gz

#php ./app/console doctrine:migrations:migrate --club=rio --configuration ./app/DoctrineMigrations/tenant.yml -n

