# Backend Test

## Aperturar puerto 8000

* php -S localhost:8000 -t public

## Crear Base de datos local MySQL

* En la config la cual deje 'expuesta' ya que es un test se llama 'agency' si quieres ponerle otro nombre redefinelo en el '.env' file

## Actualizar Dependencias

* composer update

## Generar las tablas y campos en la base de datos

* php artisan migrate

## Generar registros con faker

* php artisan db:seed

### Endpoints

* Viajero / json

'POST': 'viajero',
'GET': 'viajero',
'GET': 'viajero/id',
'DELETE': 'viajero/id',
'PUT': 'viajero/id'

# Dev

### Model creation

* php artisan make:model Name -m

### Table creation from model

* php artisan make:migration create_projects_table --create=projects

### Modifying tables

* php artisan make:migration add_votes_to_users_table --table=users

### Seeds creation

* php artisan make:seeder SEEDERSNAME
