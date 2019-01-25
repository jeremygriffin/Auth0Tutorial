## Laravel 5.7 + Auth0

This is basically following the tutorial.

[https://auth0.com/docs/quickstart/webapp/laravel/01-login](https://auth0.com/docs/quickstart/webapp/laravel/01-login)


# setup an application in Auth0 following their steps: 

Except use the callbacks:

```
http://localhost/callback
http://localhost/auth0/callback
```


### Clone and cd into

```
git clone git@github.com:whatsites/Auth0Tutorial.git
cd Auth0Tutorial
```

### because it's shared (docker to local) chmod 777 to storage

```
sudo chmod 777 -R storage
```

### copy the env example to env

```
cp .env.example .env
```

### Edit .env to add your auth0 information

```
vi .env
```

### install packages with composer

```
docker run --rm --interactive --tty --volume $PWD:/app composer install
```

### Start docker containers:

```
docker-compose up
```

### generate a key for the app and migrate

```
docker exec -i -t <fpm docker container> php artisan key:generate
docker exec -i -t <fpm docker container> php artisan migrate
```

example:
```

jgriffin@jgriffin-ThinkPad-A475 ~/Code/Auth0Tutorial > docker ps
CONTAINER ID        IMAGE               COMMAND                  CREATED             STATUS              PORTS                NAMES
cae5286de4de        nginx:latest        "nginx -g 'daemon of…"   11 minutes ago      Up 11 minutes       0.0.0.0:80->80/tcp   blah_web_1
32686f983711        blah_php-fpm        "docker-php-entrypoi…"   11 minutes ago      Up 11 minutes       9000/tcp             blah_php-fpm_1
1935a357b331        mariadb             "docker-entrypoint.s…"   11 minutes ago      Up 11 minutes       3306/tcp             blah_db-maria_1

jgriffin@jgriffin-ThinkPad-A475 ~/Code/blah > docker exec -i -t blah_php-fpm_1 php artisan key:generate
Application key set successfully.
jgriffin@jgriffin-ThinkPad-A475 ~/Code/blah > docker exec -i -t blah_php-fpm_1 php artisan migrate     
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
jgriffin@jgriffin-ThinkPad-A475 ~/Code/blah >

```

### Should be able to open : [http://localhost/](http://localhost/)
### click login and then you can see the user set in the db:


```
docker exec -i -t blah_db-maria_1 mysql lauttest -uroot -pSuperS3cr3t
MariaDB [lauttest]> select * from users;
Empty set (0.000 sec)

MariaDB [lauttest]> select * from users;
+----+------+-------------------------------------+---------------------------+----------------+---------------------+---------------------+
| id | name | sub                                 | email                     | remember_token | created_at          | updated_at          |
+----+------+-------------------------------------+---------------------------+----------------+---------------------+---------------------+
|  1 |      | google-oauth2|102599998679996499916 | jeremy.griffin@movehq.com | NULL           | 2019-01-25 17:03:42 | 2019-01-25 17:03:42 |
+----+------+-------------------------------------+---------------------------+----------------+---------------------+---------------------+
1 row in set (0.001 sec)

MariaDB [lauttest]> 
```


