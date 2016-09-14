#!/bin/bash

ssh root@gyman.pl "mysqldump -u root -p gyman_rio > /tmp/backup.sql"
scp root@gyman.pl:/tmp/backup.sql ./

