#!/bin/bash

LOCAL_DIR='/var/www/app.gyman' REMOTE_DIR='/var/www/gyman' PHP_EXE='php'

# Passwordless maintenanceConnection alias
REMOTE=root@gyman.pl
# Here you should specify the user and group under which your webserver is running Usually it is www-data for both
REMOTE_USER=root[:group]
 
cd $LOCAL_DIR
 
echo ". Deploying files ..."
# Create app/config/rsync_exclude.txt before you run this script
rsync -rlptvz ./ $REMOTE:$REMOTE_DIR --exclude-from=./app/config/rsync_exclude.txt echo ". Done deploy."
 
echo ". Post deploy remote operations ..."
 
# Update remote Symfony configuration file If you prefer not to handle remote config from the development machine, just add 
# app/config/parameters.yml to the rsync_exclude.txt file
ssh $REMOTE "cp $REMOTE_DIR/app/config/parameters.remote.yml $REMOTE_DIR/app/config/parameters.yml"
 
# Migrate database if needed
echo ". Updating db schema..." ssh $REMOTE "$PHP_EXE $REMOTE_DIR/app/console doctrine:migrations:diff" ssh $REMOTE "$PHP_EXE 
$REMOTE_DIR/app/console doctrine:migrations:migrate"
 
# Clear remote Symfony cache in both environments
ssh $REMOTE "$PHP_EXE $REMOTE_DIR/app/console cache:clear --no-warmup" ssh $REMOTE "$PHP_EXE $REMOTE_DIR/app/console cache:clear --no-warmup 
--env=prod"
 
echo ". Dumping assets..." ssh $REMOTE "$PHP_EXE $REMOTE_DIR/app/console assetic:dump" ssh $REMOTE "$PHP_EXE $REMOTE_DIR/app/console 
assetic:dump --env=prod"
 
echo ". Making directories writable by web server..." ssh $REMOTE "chown -R $REMOTE_USER $REMOTE_DIR/app/cache/ $REMOTE_DIR/app/logs/ 
$REMOTE_DIR/src $REMOTE_DIR/web"
echo ". Deploy completed."
