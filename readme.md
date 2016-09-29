# Blog implementation (based on [Laravel 5.3](http://laravel.com))

## Installation Instructions

1) Clone/download this repository
2) Pull app dependencies via composer:

        $ cd blog/blog
        $ composer install
        $ chmod -R a+rw storage
        $ chmod -R a+rw bootstrap/cache

3) Configure database:

        $ sudo mysql
        mysql> CREATE USER 'ankh'@'localhost' IDENTIFIED BY 'ankh';
        mysql> SET PASSWORD FOR 'ankh'@'localhost' = PASSWORD('secret');
        mysql> CREATE DATABASE ankh_db;
        mysql> GRANT ALL PRIVILEGES ON ankh_db . * TO 'ankh'@'localhost';
        mysql> FLUSH PRIVILEGES;

4) Create all required database tables and seed them with data with artisan:

        $ php artisan migrate --seed

5) Run server:

        $ php artisan serve --port=8000

6) Open application in browser:

        $ open http://localhost:8000


## Change notes

* 0.0 Application skeleton
* 0.1 Added Users, Posts, Comments
* 0.2 Added posts pagination

## Progress

- [ ] Users
	- [x] Creation
	- [ ] Registration form
	- [x] Login/logout
		- [x] Common user login page
		- [x] Admin login page
	- [ ] Roles
		- [ ] Roles moderation
- [ ] Posts
	- [x] Creation
	- [x] Update
	- [x] Deletion
	- [ ] Display
		- [x] Enumeration
		- [x] Pagination
		- [ ] Filtering by tags
- [x] Comments
	- [x] Creation
	- [x] Deletion
- [ ] Tags
	- [ ] Assignment on post creation
	- [ ] Display

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
