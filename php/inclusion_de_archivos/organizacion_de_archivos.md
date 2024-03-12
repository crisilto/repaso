## Organización de Archivos
Crear una estructura de archivos organizada desde el principio es esencial para cualquier proyecto, especialmente a medida que crece y se vuelve más complejo. Aquí te presento una estructura de directorios sugerida para un proyecto PHP, teniendo en cuenta las prácticas comunes de desarrollo. Esta estructura ayuda a separar la lógica de la aplicación, la presentación, y los datos, facilitando el mantenimiento y la escalabilidad del proyecto.
proyecto/

    │
    ├── public/
    │   ├── index.php          # Punto de entrada de la aplicación
    │   ├── css/               # Directorio para los archivos CSS
    │   └── js/                # Directorio para los scripts JavaScript
    │
    ├── src/
    │   ├── classes/           # Clases PHP que tu aplicación utiliza
    │   │   ├── User.php
    │   │   └── Database.php
    │   ├── functions/         # Funciones PHP reutilizables
    │   │   └── utils.php
    │   └── templates/         # Plantillas HTML o PHP para la interfaz de usuario
    │       ├── header.php
    │       ├── footer.php
    │       └── home.php
    │
    ├── config/
    │   ├── config.php         # Archivo de configuración (DB, API keys, etc.)
    │   └── init.php           # Script de inicialización (autoloaders, setup, etc.)
    │
    ├── lib/
    │   └── third-party/       # Librerías de terceros no gestionadas por Composer
    │
    ├── vendor/                # Librerías de terceros (gestionadas por Composer)
    │
    └── .htaccess              # Configuración del servidor web (rewrites, seguridad, etc.)

### Descripción de la estructura:

-   **public/**: Este directorio contiene todos los archivos accesibles públicamente, como el punto de entrada de la aplicación (`index.php`), hojas de estilo (`css/`), y JavaScript (`js/`). Es la raíz documental de tu servidor web.
    
-   **src/**: Aquí se almacena la lógica principal de la aplicación, incluyendo clases (`classes/`), funciones reutilizables (`functions/`), y plantillas (`templates/`). Separar estos elementos ayuda a mantener el código organizado y facilita su mantenimiento.
    
-   **config/**: Contiene archivos de configuración como `config.php`, donde puedes definir constantes para la conexión a la base de datos, API keys, y otros parámetros globales, y `init.php` para inicialización global, como registrar autoloaders o iniciar sesiones.
    
-   **lib/**: Para bibliotecas de terceros que no están gestionadas por un gestor de paquetes como Composer. Esto mantiene claras las dependencias externas de tu proyecto.
    
-   **vendor/**: Directorio para bibliotecas de terceros gestionadas por Composer. Este directorio es generado automáticamente por Composer y no debería modificarse manualmente ni incluirse en el control de versiones.
    
-   **.htaccess**: Un archivo de configuración para el servidor web Apache, utilizado para reescribir URLs, restringir el acceso a ciertos directorios, y otras configuraciones del servidor.
    

### Notas finales:

-   Asegúrate de que solo el directorio `public/` sea accesible directamente por los usuarios a través del navegador. Todo lo demás debe estar fuera del directorio público para mejorar la seguridad.
    
-   Utiliza el archivo `index.php` en `public/` como un front controller, es decir, todas las solicitudes pasan por este archivo, y luego se redirigen a la lógica de la aplicación en `src/`.
    
-   La estructura propuesta es solo una base; siente la libertad de adaptarla según las necesidades específicas de tu proyecto.