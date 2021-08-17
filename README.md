## App de tareas

Esta es una aplicación para tareas para uso práctico de PHP, MySQL y CSS; Este proyecto en especial es bueno para entender conceptos como el Modelo Vista Controlador, Ajax y control de versiones.

### Instalación del proyecto.

1. Debemos usar git para bajar el proyecto a nuestra carpeta de nuestro servidor lampp. Para eso usamos el comando `git clone https://github.com/AndreyPootMay/tareas-app.git`.

2. Debemos de crear una base de datos en MySQL la cual sea referente a nuestra aplicación. Dentro del gestor de base de datos podemos hacerlo u en su defecto por terminal sería de la siguiente forma:
```sql
CREATE DATABASE IF NOT EXISTS `app_tareas` DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE 'utf8_general_ci';
```
3. Dentro de la carpeta `modelos` debemos de crear el archivo `BDConexion.php`, por defecto existe uno llamado `BDConexionEjemplo.php` ese lo copiamos y le cambiamos el nombre a `BDconexion.php`. Podemos hacerlo con el siguiente comando:

```
cp modelos\BDConexionEjemplo.php modelos\BDConexion.php
```

4. Cambiamos las constantes en el archivo `modelos\BDConexion.php` para apuntar a nuestra base de datos dentro de nuestra computadora.

5. Dentro del gestor de base de datos basta crear las tablas o alteraciones a la bd, esto se hace corriendo los archivos `.sql` dentro de la carpeta llamada _migraciones_.

6. Iniciamos el servidor y podemos probar el proyecto.

## Autor

[AndreyPootMay](https://github.com/AndreyPootMay)
