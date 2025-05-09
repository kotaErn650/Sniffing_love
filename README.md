RECOMENDACIONES:
1🔜
Clonar Repo:
git clone https://github.com/kotaErn650/Sniffing_love.git
cd Sniffing_love

url de la app http://54.152.81.175/

Realizar Checkout a su rama Correspondiente 
(git checkout willam )
(git checkout janeer )
(git checkout jose )
(git checkout kevin )

2🔜 División Equitativa de Tablas por Funcionalidades
        🥸William (11 tablas) - Módulo de Autenticación y Usuarios
        1-roles *
        2-usuarios
        3-politicas
        4-aceptacion_politicas
        5-notificaciones
        6-puntos_recompensa
        7-transacciones_puntos
        8-referidos
        9-membresias
        10-suscripciones_membresias
        11-configuraciones
        🥸
        Jose (12 tablas) - Módulo de Veterinarias y Servicios
        1-veterinarias  *
        2-veterinarios  *
        3-servicios     *
        4-veterinaria_servicios *
        5-descuentos    *
        6-aplicacion_descuentos-
        7-metodos_pago  *
        8-pagos-
        9-eventos       *
        10-registro_eventos     *
        11-carrito de compras
        12-items del carrito
        🥸
        Janeer (10 tablas) - Módulo de Citas y Salud
        1-citas
        2-historial_medico
        3-vacunas
        4-mascota_vacunas
        5-resenas
        6-tickets_soporte
        7-mensajes_soporte
        8-logs_sistema
        9-auditoria
        10-dispositivos_mascotas (opcional)
        🥸
        Kevin (11 tablas) - Módulo de Mascotas y Comunidad
        1-tipos_mascota
        2-razas
        3-mascotas
        4-datos_dispositivos (opcional)
        5-productos
        6-pedidos_productos
        7-detalles_pedido
        8-foros
        9-temas_foro
        10-respuestas_foro
        11-mensajes_directos
3🔜estructura
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/         # William
│   │   ├── Veterinary/   # Jose
│   │   ├── Health/       # Janeer
│   │   └── Pets/         # Kevin
│   └── ...
├── Models/
│   ├── Auth/             # William
│   ├── Veterinary/       # Jose
│   ├── Health/           # Janeer
│   └── Pets/             # Kevin
└── Ecxcetera
|
|__ resources
            |__carpetas de cada vista


4🔜
Las rutas estaran seccionadas por cada integrante cada uno tendra su propio modulo
// routes/ejemplo.php (Janeer)
// routes/ejemplo.php (William)
// routes/ejemoplo.php (Jose)
// routes/ejemplo.php (kevin)
//
routes/
├── web.php
├── jose.php
├── william.php
├── janeer.php
├── kevin.php
para implemtacion de modulos y manejo de directorios
esto con el fin de no crear confliscos de pisarnios las mismas lineas de codigo



5🔜
No olvidar la implemetacion o invocacion de las tablas se realiza en SINGULAR Y
el llamdo a los componentes o campos se hace en plural(s) ya sea en {rutas - id- name}
o llamados desde cualquier ubicacion de sus archivos

6🔜 
Estructura DE LAS RAMAS
main (rama principal protegida)
│
├── develop (rama de integración)
│
├── (janeer)
│
├── (william)
│
├── (kevin)
|
├── (jose)

7🔜
TRABAJA EN SU MODULO ASIGNADO, 
EJEMPLO
git clone [url-del-repositorio]
git checkout -b develop origin/develop
|
|
git checkout develop
git pull origin develop
git checkout -b william
|
|
NO MODIFICAR MIGRACIONES YA CREADAS
NO TRABAJAR MIGRACIONES- MODEL - CONTROLLER - VEIW DE OTROS
|
|
|
hacer un pull a develop y luego sincronisa su Rama y empiezan a Trabajar
|
|
|
SOLO SE HACE PUSH DESPUES DE ASEGURARSE QUE SU FUNCIONALIDAD ESTE COMPLETA Y COMPILANDO - NO HACER COMMITS POR CADA LETRA Y PUSH POR TODO ☠️☠️☠️
|
|
|
☠️☠️PULL REQUEST
SE DEVE revisar por otro
en la parte superior donde diga compare este SU RAMA
en la parte donde diga BASe este la rama develop

en la parte de Assignes se deb definir Un Integrante()
