## PIXAN TEST
1 .- Clone el repositorio:
git clone https://github.com/hederithamar/pixan.git

2.- Ejecute el comando para descargar la librerias:
composer install

3.- Inclui al repositorio el archivo .env donde van las configiraciones, el nombre de la base de datos es "pixan", debe crear una base de datos con ese nombre, o midificarlo en el .env.

4.-Ejecute el comando para actualizar la llave:
php artisan key:generate

5.-Ejecute el commando para hacer las migraciones junto con datos creados del seeder:
php artisan migrate --seed

6.- las credenciales por defecto son:
email: pixan@test.com
pass: 1234


### Official Documentation

[Click here form the official documentation](http://laravel-boilerplate.com)


### License

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)
