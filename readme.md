

![Flarepoint Logo](https://cloud.githubusercontent.com/assets/15610490/16813901/ebfd6d94-4933-11e6-9fee-655f6193f38e.png)
### Flarepoint CRM
Flarepoint is a new customer relationship management system (CRM) which purpose is to help you keep track of your customers, tickets etc. Flarepoint is a free, open-source and self-hosted platform based on Laravel 5.3 PHP Framework.

![page_design](https://cloud.githubusercontent.com/assets/15610490/16659700/903393ac-446b-11e6-969c-831fcd698a06.PNG)


## Installation



**How to**

- Insert project into empty folder / git clone (repository url)
- Create an empty database table
- Run the following commands
```
    copy .env.example .env
    php artisan key:generate
    composer install
    php artisan migrate --seed
```
- login in with these credentials  Mail: admin@admin.com Password: admin123 (Can be changed in the dashboard)
- DONE


## Logging in Admin, Staff
I've made the admin, staff login separate from the users, clients (clientheads)
That means that you get Multi Authorization, but it required some extra coding.

I ran into trouble with 'Token Mismatch Exception' and did lots of troubleshooting.

Run tests, to see everything is ok for your environment!


**Insertion of dummy data**

If you want to just play around and test the CRM, you can very easily insert dummy data after completeing the steps above, follow the commands below.

```
    php artisan db:seed --class=UsersDummyTableSeeder (Creates 5 extra users and are required)
    php artisan db:seed --class=StaffDummyTableSeeder (Creates 10 extra staff and are required)
    php artisan db:seed --class=RelationsDummyTableSeeder (Creates 500 new relations)
    php artisan db:seed --class=TicketsDummyTableSeeder (Creates 1750 tickets, requires relations & users seeding)
    php artisan db:seed --class=LeadsDummyTableSeeder (Creates 30 leads, requires relations & users seeding)
    
```

All of these will fill the datbase with relation, tickets, leads etc, to give a fast example of how the CRM works, it is important, that nothing else is done as some of the data is inserted to work with a speific ID.


## Features overview
- Tickets management
- Leads management
- Simple invoice management
- Easy & simple time management for each ticket
- Role management (Create and update your own roles)
- Easy configurable settings
- Relation overview (Keep easy track of open tickets for each relation etc)
- Upload documents to each relations (easy track of contracts and more)
- Fast overview over your own open tickets, leads etc
- Global dashboard


### To-do

Flarepoint is still under development, so there are a lot on my to-do list.

- Multiple integrations (Slack, e-conomic, Google Drive, dropbox etc.)
- Different Color schemes
- API
- Excel Import/export
- Better cache
- Even easier installation
- User tagging

And much more (in no particular order)

### Contribution Guide
Flarepoint CRM follows [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standard.

### Packages
The packages used are the following...

- [LaravelCollective](https://github.com/LaravelCollective/html)
- [laravel-datatables](https://github.com/yajra/laravel-datatables)
- [Entrust](https://github.com/Zizaco/entrust)
- [Notifynder](https://github.com/fenos/Notifynder)


### License

Flarepoint is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
