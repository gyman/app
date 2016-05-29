require 'yaml'

settings = YAML.load_file 'app/config/vagrant.yml'

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "geerlingguy/ubuntu1604"
  config.vm.provision :shell, path: "app/Resources/vagrant/bootstrap.sh"
  config.vm.network "private_network", ip: settings['server']['ip']
  config.vm.network :forwarded_port, guest: 22, host: settings['server']['ssh_port'], id: "ssh", auto_correct: true
  config.ssh.port = settings['server']['ssh_port']
  config.vm.synced_folder ".", "/vagrant", type: "nfs"

  config.vm.provider "virtualbox" do |v|
    v.name = settings['server']['name']
    v.memory = settings['server']['memory']
    v.cpus = settings['server']['cpu']
  end
end