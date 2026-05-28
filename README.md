# info-personal-form
Diseñar y desarrollar una página web que incluya información sobre el usuario y un formulario de contacto funcional con PHP que permita enviar un mensaje. Esta actividad permitirá a los estudiantes aplicar conocimientos de HTML, CSS, PHP y subir el proyecto a un hosting gratuito.

# Enlace Host
[Host page](https://bitbioerickbolaos.lovestoblog.com/index.php)

## 📂 Estructura del Proyecto

A continuación se detalla la organización de los archivos y carpetas del sistema:

### 📁 assets/
Carpeta destinada a almacenar los recursos estáticos públicos de la aplicación.
* **📁 css/**
    * `index.css`: Contiene los estilos personalizados (hojas de estilo) para la interfaz visual y ajustes sobre Bootstrap.
* **📁 img/**
    * `pic_Erick.jpeg`: Imagen o recurso gráfico utilizado en la interfaz del sistema (ej. foto de perfil o avatar).

### 📁 config/
Carpeta encargada de las configuraciones globales e infraestructura del sistema.
* `database.php`: Archivo de conexión centralizada a la base de datos MySQL mediante credenciales del servidor.
* `hosting.txt`: Archivo de notas de texto plano con los parámetros o apuntes para el despliegue del proyecto en producción.

### 📁 controllers/
Carpeta principal que contiene la lógica del negocio, vistas del panel y procesamiento de formularios.
* `login.php`: Controlador encargado de validar las credenciales de acceso (restringido para usuarios específicos como admin y profe).
* `contacto.php`: Interfaz o formulario para la captura de nuevos mensajes de los usuarios.
* `enviar_contacto.php`: Controlador que procesa los datos enviados por el formulario de contacto e inserta los registros en la tabla `Messages`.
* `footer.php`: Componente reutilizable que contiene el pie de página común para todo el sitio.
* `index.php`: Página de inicio del proyecto que integra el banner principal y el disparador del modal de inicio de sesión.
* `logout.php`: Archivo que destruye la sesión activa actual y redirige de forma segura al index.
* `navbar.php`: Menú de navegación común y superior que contiene los accesos rápidos y el botón de logueo.
* `panel_admin.php`: Panel restringido de administración que permite visualizar, auditar y eliminar de forma permanente los mensajes de la base de datos.
* `panel_profe.php`: Panel restringido con permisos de solo lectura que consulta la vista de MySQL exclusiva para el rol del profesor.

### 📄 Archivos en la Raíz
* `README.md`: Documentación técnica del proyecto (este archivo), su configuración y uso general.

## 🚀 Despliegue en InfinityFree (Hosting Gratuito)

Para subir y poner en marcha este proyecto en los servidores de InfinityFree, sigue estos pasos:

### 1. Preparación de la Base de Datos
1. Inicia sesión en tu panel de InfinityFree y dirígete a **MySQL Databases**.
2. Crea una nueva base de datos (copia el nombre asignado, que suele tener un prefijo como `if0_XXXXXX`).
3. Haz clic en **Admin** para abrir **phpMyAdmin** desde el hosting.
4. Ve a la pestaña **SQL** e importa o ejecuta el script de creación de tus tablas (`Users`, `Messages`) y la vista (`vista_mensajes_profe`).
5. Inserta manualmente los usuarios iniciales (`admin` y `profe`).

### 2. Configurar la Conexión en PHP
Antes de subir los archivos, debes actualizar las credenciales en tu archivo `config/database.php` con los datos que te provee InfinityFree en su panel de control:
* **Host:** `sqlXXX.infinityfree.com` (No uses "localhost").
* **User:** El usuario de base de datos asignado (ej. `if0_XXXXXX`).
* **Password:** La contraseña de tu cuenta de InfinityFree (la encuentras en *Account Details*).
* **Database Name:** El nombre exacto de la base de datos creada.

### 3. Subir los Archivos al Servidor
1. En el panel de InfinityFree, abre el **Online File Manager** (o usa un cliente FTP como FileZilla).
2. Entra a la carpeta obligatoria **`htdocs/`**.
3. Sube todo el contenido de tu proyecto **dentro** de `htdocs/`. 
   > ⚠️ **Nota:** Asegúrate de conservar la estructura intacta (`assets/`, `config/`, `controllers/`, etc.). El archivo `index.php` principal del inicio debe quedar directamente en la raíz de `htdocs/` para que la web cargue correctamente al ingresar al dominio.

### 4. Ajustes de Rutas (Si aplica)
* Recuerda que los servidores de InfinityFree basados en Linux son estrictos con las mayúsculas y minúsculas (*Case Sensitive*). Revisa que las llamadas en tus `include` o `require_once` coincidan exactamente con los nombres reales de los archivos en tu estructura.