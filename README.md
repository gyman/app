bjjTimesheet
============

My own project. I would like to provide to the end-user and his business easy to use client relations manager oriented on fitness industry. Main goals are to:

- provide a easy to use but functional interface
- gather and serve client data in easy to read form
- gather and analyze data, mostly relative to client and staff
- let user to step into live interaction with user: invoices, interviews, notification tru email/sms, present to user his progress data
- let user to do all reservation of trainings or facilities from start to end on website
- implement payment functionality etc.


Dodawanie nowego klubu oraz użytkownika

1. utworzenie wpisu do "clubs", utworzenie bazy, usera z hasłem:

> sf gyman:club:create "Trening Club" trening gyman_trening trening test123

2. zbudowanie schemy w gyman_trening

> sf doctrine:schema:create --tenant="trening"

3. utworzenie usera w gyman

> sf fos:user:create "john.doe" user@server.com lampka123

4. przypisanie usera do subdomeny

> sf gyman:club:assign-user user@server.com trening

5. dodanie subdomeny do /etc/hosts

> echo "127.0.0.1    trening.gyman.pl" >> /etc/hosts

6. utworzenie katalogu w /web/uploads/gallery/trening

> mkdir -p /web/uploads/gallery/trening

Uruchomienie vagranta

1. sudo apt-get install vagrant virtualbox install nfs-common nfs-kernel-server
2. vagrant up

Konfiguracja crontab:

*/5 * * * * php /home/vagrant/www/app/console gyman:vouchers:clear_expired --club=rio --em=tenant
*/5 * * * * php /home/vagrant/www/app/console gyman:vouchers:update_current --club=rio --em=tenant
*/5 * * * * php /home/vagrant/www/app/console gyman:entries:close_expired --club=rio

Migracje

php app/console doctrine:migrations:diff --em=tenant --configuration ./app/DoctrineMigrations/tenant.yml -n --club=rio
php app/console doctrine:migrations:diff --em=default --configuration ./app/DoctrineMigrations/tenant.yml -n