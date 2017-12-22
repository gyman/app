require 'yaml'

settings = YAML.load_file 'env/vagrant/vagrant.yml'

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "gyman/ubuntu64"
  config.vm.box_version = "0.0.2"
  config.vm.provision :shell, path: "env/vagrant/bootstrap.sh"
  config.vm.network "private_network", ip: settings['server']['ip']
  config.vm.network :forwarded_port, guest: 22, host: settings['server']['ssh_port'], id: "ssh", auto_correct: true
  config.ssh.port = settings['server']['ssh_port']
  config.vm.synced_folder ".", "/vagrant"

  config.vm.provider "virtualbox" do |v|
    v.name = settings['server']['name']
    v.memory = settings['server']['memory']
    v.cpus = settings['server']['cpu']
    v.customize ['modifyvm', :id, '--cableconnected1', 'on']
    v.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
  end

  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"
end