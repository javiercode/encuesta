## Biblioteca Musical

#### Los requerimientos son:

- PHP >= 7.3.
- Composer.

#### Pasos para compilar proyecto

-   Crear una base de datos en mysql.
-   Crear archivo el siguiente archivo: ".env" con la informacion del ".evn.example", cambiando el nombre de la bd a la que creo.
-   Abrir la consola dentro del proyecto
-   ejecutar el siguiente comando: "php artisan migrate"
-   ejecutar el siguiente comando: "php artisan db:seed"
-   ejecutar el siguiente comando: "php artisan key:generate"
-   ejecutar el siguiente comando: "composer upddate"
-   ejecutar el siguiente comando: "npm install"


#### Usuario por defecto
-    Usuario: admin@mail.com
-    Password: 123456

#### Librerias usadas
-    Plantilla: "laravel-frontend-presets/material-dashboard": "1.1"
