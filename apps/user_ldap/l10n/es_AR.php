<?php $TRANSLATIONS = array(
"<b>Warning:</b> Apps user_ldap and user_webdavauth are incompatible. You may experience unexpected behaviour. Please ask your system administrator to disable one of them." => "<b>Advertencia:</b> Los Apps user_ldap y user_webdavauth son incompatibles.  Puede que experimente un comportamiento inesperado. Pregunte al administrador del sistema para desactivar uno de ellos.",
"Host" => "Servidor",
"You can omit the protocol, except you require SSL. Then start with ldaps://" => "Podés omitir el protocolo, excepto si SSL es requerido. En ese caso, empezá con ldaps://",
"Base DN" => "DN base",
"You can specify Base DN for users and groups in the Advanced tab" => "Podés especificar el DN base para usuarios y grupos en la pestaña \"Avanzado\"",
"User DN" => "DN usuario",
"The DN of the client user with which the bind shall be done, e.g. uid=agent,dc=example,dc=com. For anonymous access, leave DN and Password empty." => "El DN del usuario cliente con el que se hará la asociación, p.ej. uid=agente,dc=ejemplo,dc=com. Para acceso anónimo, dejá DN y contraseña vacíos.",
"Password" => "Contraseña",
"For anonymous access, leave DN and Password empty." => "Para acceso anónimo, dejá DN y contraseña vacíos.",
"User Login Filter" => "Filtro de inicio de sesión de usuario",
"Defines the filter to apply, when login is attempted. %%uid replaces the username in the login action." => "Define el filtro a aplicar cuando se ha realizado un login. %%uid remplazará el nombre de usuario en el proceso de inicio de sesión.",
"use %%uid placeholder, e.g. \"uid=%%uid\"" => "usar %%uid como plantilla, p. ej.: \"uid=%%uid\"",
"User List Filter" => "Lista de filtros de usuario",
"Defines the filter to apply, when retrieving users." => "Define el filtro a aplicar, cuando se obtienen usuarios.",
"without any placeholder, e.g. \"objectClass=person\"." => "Sin plantilla, p. ej.: \"objectClass=person\".",
"Group Filter" => "Filtro de grupo",
"Defines the filter to apply, when retrieving groups." => "Define el filtro a aplicar cuando se obtienen grupos.",
"without any placeholder, e.g. \"objectClass=posixGroup\"." => "Sin ninguna plantilla, p. ej.: \"objectClass=posixGroup\".",
"Port" => "Puerto",
"Base User Tree" => "Árbol base de usuario",
"Base Group Tree" => "Árbol base de grupo",
"Group-Member association" => "Asociación Grupo-Miembro",
"Use TLS" => "Usar TLS",
"Do not use it for SSL connections, it will fail." => "No usarlo para SSL, dará error.",
"Case insensitve LDAP server (Windows)" => "Servidor de LDAP sensible a mayúsculas/minúsculas (Windows)",
"Turn off SSL certificate validation." => "Desactivar la validación por certificado SSL.",
"If connection only works with this option, import the LDAP server's SSL certificate in your ownCloud server." => "Si la conexión sólo funciona con esta opción, importá el certificado SSL del servidor LDAP en tu servidor ownCloud.",
"Not recommended, use for testing only." => "No recomendado, sólo para pruebas.",
"User Display Name Field" => "Campo de nombre de usuario a mostrar",
"The LDAP attribute to use to generate the user`s ownCloud name." => "El atributo LDAP a usar para generar el nombre de usuario de ownCloud.",
"Group Display Name Field" => "Campo de nombre de grupo a mostrar",
"The LDAP attribute to use to generate the groups`s ownCloud name." => "El atributo LDAP a usar para generar el nombre de los grupos de ownCloud.",
"in bytes" => "en bytes",
"in seconds. A change empties the cache." => "en segundos. Cambiarlo vacía la cache.",
"Leave empty for user name (default). Otherwise, specify an LDAP/AD attribute." => "Vacío para el nombre de usuario (por defecto). En otro caso, especificá un atributo LDAP/AD.",
"Help" => "Ayuda"
);
