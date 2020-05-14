<p align="center"><img src="http://syntesy.io/modules/front/images/logo.jpg"></p>

## Architect Laravel

Proyecto basico, con el esqueleto de Architect en el cual instalar los otros modulos.

## Installation

Cloar el repositorio : 

git clone https://github.com/SyntesyDigital/ArchitectLaravel.git

Crear nuevo repositorio : 
git remote set-url origin [https repositorio]
exemplo : 
git remote set-url origin https://sergiminguez@bitbucket.org/syntesy/architectbase.git

copiar env.example
modificamos los datos de BBDD

composer install
php artisan key:generate
php artisan storage:link

Instalamos Modulo Architect
php artisan architect:install

php artisan module:migrate Architect

php artisan module:seed Architect


## Usage

## License


