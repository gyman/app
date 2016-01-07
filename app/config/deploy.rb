set :application, "app.gyman"
set :domain,      "gyman.pl"
set :deploy_to,   "/home/gyman.pl/"
set :app_path,    "app"
set :clear_controllers, false
set :user, "root"

set :ssh_options, {
    :forward_agent => true,
    :auth_methods => ["publickey"],
}

default_run_options[:pty] = true

set :repository,  "git@github.com:gyman/app.git"
set :scm,         :git
set :branch, 	   "develop"
# set :deploy_via,   :remote_cache
set :deploy_via, :rsync_with_remote_cache
set :copy_via, :scp

set :interactive_mode, false

set :use_composer, true
set :composer_options,  "--no-progress --no-interaction --no-dev --no-ansi --verbose --prefer-dist --optimize-autoloader"
set :update_vendors, false
set :vendors_mode, "install"
set :cache_warmup, true

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads", app_path + "/spool"]

set :writable_dirs,       ["app/cache", "app/logs"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

set :use_sudo,  false

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

# Run migrations before warming the cache
after "deploy:restart", "assets"
# after "deploy:restart", "deploy:cleanup"
# after "deploy", "symfony:clear_accelerator_cache"
# after "deploy:rollback:cleanup", "symfony:clear_accelerator_cache"

namespace :symfony do
  desc "Clear accelerator cache"
  task :clear_accelerator_cache do
    capifony_pretty_print "--> Clear accelerator cache"
    run "#{try_sudo} sh -c 'cd #{latest_release} && #{php_bin} #{symfony_console} cache:accelerator:clear #{console_options}'"
    capifony_puts_ok
  end
end

# Custom(ised) tasks

set :opt, {
	:via => :scp,
	:recursive => true,
	:forward_agent => true,
	:auth_methods => ["publickey"],
	:verbose => true
}

task :assets, :except => { :no_release => true }, :roles => :app do
    capifony_pretty_print "--> Copying web/js"
	upload("web/js",		current_path + "/web/js", opt)
    capifony_puts_ok

    capifony_pretty_print "--> Copying web/css"
	upload("web/css",		current_path + "/web/css", opt)
    capifony_puts_ok

    capifony_pretty_print "--> Copying web/images"
	upload("web/images",	current_path + "/web/images", opt)
    capifony_puts_ok

    capifony_pretty_print "--> Copying web/fonts"
	upload("web/fonts",		current_path + "/web/fonts", opt)
    capifony_puts_ok

    capifony_pretty_print "--> Copying web/bundles"
	upload("web/bundles",	current_path + "/web/bundles", opt)
    capifony_puts_ok
end
