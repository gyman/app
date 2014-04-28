require 'capistrano/ext/multistage'

set :application, "timesheet"

set :repository, "https://github.com/uirapuru/bjjTimesheet.git"
set :scm, :git

set :stages, ["develop", "staging", "production"]
set :default_stage, "develop"

set :deploy_via, :remote_cache

set :use_sudo, false
default_run_options[:pty] = true

after "deploy:restart", "deploy:cleanup"

set :keep_releases, 3
set :shared_children, ["app/cache","app/logs","web/uploads"]
set :writable_dirs, ["app/cache", "app/logs","web/uploads"]
set :copy_exclude, ["nbproject", "config/deploy"]

set :ssh_options, {
    :forward_agent => true,
    :auth_methods => ["publickey"],
}

before "deploy:install", "deploy:setParameter"
before "deploy:restart", "deploy:install"
after "deploy:install", "app:deploy"

namespace :deploy do
    desc "setup parameters.yml"
    task :setParameter do
        run "mv #{current_path}/app/config/parameters.dev.yml #{current_path}/app/config/parameters.yml"
    end
end
namespace :deploy do
    desc "run composer install and ensure all dependencies are installed"
    task :install do
        run "cd #{current_path} && composer install"
    end
end

namespace :app do
  task :deploy, :roles => :app do
    run "ant -f #{current_path}/build.xml -Denv=#{env}"
  end
end