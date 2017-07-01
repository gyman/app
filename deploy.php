<?php
namespace Deployer;

require 'recipe/symfony.php';

// Configuration

set('repository', 'git@github.com:gyman/app.git');
set('git_tty', true); // [Optional] Allocate tty for git on first deployment
add('shared_files', [
    "app/config/parameters.yml"
]);
add('shared_dirs', [
    "app/logs",
    "web/uploads",
    "app/spool"
]);
add('writable_dirs', [
    "app/cache",
    "app/logs",
]);
set('writable_mode', "chmod");
set('allow_anonymous_stats', false);
//set('branch', function() {
//
//});
set('branch', 'feature/calendar21');

// Hosts

inventory('app/config/deploy.yml');

//host('gyman.pl')
//    ->stage('production')
//    ->set('deploy_path', '/home/gyman_test');

// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php7.0-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'database:migrate');
