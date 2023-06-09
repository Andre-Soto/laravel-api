# laravel-api
Api desarrollada en laravel

Desarrollo de una API para el consumo de datos de customers.

* Verisón de laravel 10.13
* Versión de php 8.6
* Composer

INSTALACIÓN
1. Clona el repositorio: `git clone https://github.com/Andre-Soto/laravel-api.git`
2. Navega al directorio del proyecto: `cd laravel-api`
3. Instala las dependencias: `composer install`
4. Copia el archivo de configuración: `cp .env.example .env`
5. Genera una clave de aplicación: `php artisan key:generate`
6. Actualiza la configuración del archivo .env con los valores adecuados.
7. Ejecuta las migraciones de la base de datos: `php artisan migrate`

* Creación de usuarios <br>
La ruta de creación de usuario es: http://127.0.0.1:800/api/user, es mediante el metodo POST, y espera recibir 3 parametros (name, email, password), retorna un json con los datos del usuario creado y codigo status http (200). En esta sección se crea el usuario para la autentificación del API
* Login <br>
La ruta de login es: http://127.0.0.1:800/api/login, es mediante el metodo POST, y espera recibir 2 parametros (email y password), retorna un json con un access_token y codigo de status http (200), el cual deberá ser incluido en los headers para poder consumir el API.
* Creación de customer <br>
La ruta para la creación de un nuevo customer es: http://127.0.0.1:800/api/customer, es mediante el metodo POST y se encuentra protegida, es necesario incluir el Authorization en los headers utilizando el access_token generado en el login. Espera recibir 7 parametros (dni, id_reg, id_com, email, name, last_name, address), retorna un json con un mensaje de registro exitoso y los datos del customer registrado junto al codigo http status (200).
* Consulta de customer<br>
La ruta para consultar los datos de los customers registrados es: http://127.0.0.1:800/api/customer/, no recibe ningun parametro y es mediante el metodo GET, retorna un json con los datos de los customer. 
* Consulta de customer especifico <br>
La ruta para consultar un customer de manera especifica es: http://127.0.0.1:800/api/customer/{$dni}, es mediante el metodo GET y espera recibir un parametro (dni), retorna un json con los datos del customer (name, last_name y email) datos de region y commune.
* Delete de customer <br>
La ruta para dar de baja un customer es: http://127.0.0.1:800/api/customer/{$dni} es mediante el metodo DELETE y espera recibir el parametro de (dni), retorna un json con un mensaje exito y codigo status http (200). 


Los datos de tokens de acceso se registrar en una tabla llamada "access_token", la cual muestra el id de usuario, el token generado y cuando fue su ultimo inicio de sesión.


## Contacto

Si tienes alguna pregunta o sugerencia, no dudes en ponerte en contacto conmigo en [carlos.soto.andre@gmail.com].



