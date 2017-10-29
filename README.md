# Backend Test

## Aperturar puerto 8000

* php -S localhost:8000 -t public

## Actualizar Dependencias

* composer update

## Generar las tablas en la base de datos

* php artisan migrate

## Generar registros con faker

* php artisan db:seed


# Dev

### Model creation

* php artisan make:model Name -m

### Table creation from model

* php artisan make:migration create_projects_table --create=projects

### Modifying tables

* php artisan make:migration add_votes_to_users_table --table=users

### Seeds creation

* php artisan make:seeder SEEDERSNAME
