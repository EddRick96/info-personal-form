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