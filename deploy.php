<?php
namespace Deployer;

require 'recipe/symfony3.php';

// Configuration

set('repository', 'git@github.com:gyman/app.git');
set('git_tty', false); // [Optional] Allocate tty for git on first deployment
add('shared_files', [
    "app/config/parameters.yml"
]);
add('shared_dirs', [
    "web/uploads",
    "app/spool"
]);
add('writable_dirs', [
    "var/cache",
    "var/logs",
]);
set('writable_mode', "chmod");
set('allow_anonymous_stats', false);
//set('branch', function() {
//
//});
set('branch', 'feature/calendar21');

// Hosts

inventory('app/config/deploy.yml');

host('gyman.pl')
    ->stage('production')
    ->set('deploy_path', '/home/gyman_test');

// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php7.2-fpm.service');
});

task('assets', function () {
    upload("web/css", "{{release_path}}/web");
    upload("web/fonts", "{{release_path}}/web");
    upload("web/images", "{{release_path}}/web");
    upload("web/js", "{{release_path}}/web");
})->desc('Upload assets from local machine');


after('deploy:symlink', 'php-fpm:restart');
before('deploy:symlink', 'assets');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'database:migrate');

task('release_name', function(){
    cd('{{deploy_path}}');
    $release = run("tail -n 1 .dep/releases")->toString();
    run("sed -i -- 's/sentry_revision:.*/sentry_revision: $release/g' app/config/parameters.yml");
});