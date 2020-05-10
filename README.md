
# Bravo Aceros Web

Las librarias que deben instalar son las siguientes

 1. Docker: Para crear una base de datos de prueba (https://www.docker.com/products/docker-desktop)
 2. Composer: Es un gestor de librerías de PHP (https://getcomposer.org/doc/00-intro.md)
 3. Node: Para poder hacer uso de npm para instalar librerías (https://nodejs.org/es/download/)
 4. SQLyog: Aplicación para gestionar base de datos, con esto crearemos la base de datos de prueba, Si usan mac Sequel Pro es una opcion.
(https://github.com/webyog/sqlyog-community/wiki/Downloads) (https://www.sequelpro.com/)

Para poder montar el proyecto deben usar la terminal, yo por la comodidad ocupo el terminal de vscode (https://code.visualstudio.com/) con el cual también programo el proyecto.
Igualmente pueden ocupar cualquier otro terminal.

 - Paso 1: Bajar el proyecto y descomprimir en una carpeta X
 - Paso 2: Por el terminal deben ubicarse en la raíz del proyecto y teclear los siguientes comandos:
```bash
$ composer install
$ npm install
```
- Paso 3: Levantar el servidor de base de datos Mysql via compose, este comando lo deben dejar corriendo en una ventana
```bash
$ docker-compose up --build
```
- Paso 4: Crear Base de datos en SQLyog o Sequel Pro, con el nombre "bravo_aceros"
- Paso 5: Abrir otra terminal y con el siguiente comando pueden subir la Base de datos y Datos de prueba
```bash
$ php artisan migrate --seed
```
- Paso 6: Levantar Servidor de prueba, debiera responder un mensaje estilo *Laravel development server started: http://127.0.0.1:8000*
```bash
$ php artisan serve
```
