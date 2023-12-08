# Digimon APP

⚠️ Nota: Para poder probarlo localmente deberiamos tener php 8.1.

## Instalación

Para instalar el proyecto deberiamos ejecutar los siguientes comandos:

Primero clonamos el proyecto

```bash
git clone https://github.com/miguelbonifaz/digimon-app-inertia
```

Luego instalar las dependencias con composer: 

```bash
composer install
```

Copiamos nuestro archivo .env.example a .env y configuramos la base de datos, si deseamos probar nuestros test, agregamos una base de datos adicional llamada `pokemon_app_test`

**Deseo aclarar que a este punto he dejado mi token de `postmark` en el archivo env.example para poder facilitar el envio del email al correo, sugiero registrarse con su email original**
```bash
cp .env.example .env
```

Generamos la key de nuestra aplicación:
```bash
php artisan key:generate
```

Ejecutamos las migraciones:
```bash
php artisan migrate
```

Compilamos los assets:
```bash
npm install && npm run build
```

## Ejecutar el proyecto

Para ejecutar el proyecto usamos el siguiente comando:
```bash
php artisan serve
```

## Ejecutar los test (opcional)

Para ejecutar los test usamos el siguiente comando:
```bash
php artisan test
```

# ¿Que tipo de servicios se usaron para crear el servidor?

En mi caso para el servicio en la nube he usado [Hetzner](https://www.hetzner.com/) y para el desplegar el proyecto hacia mi servidor me he apoyado de una herramienta llamada [Ploi](https://ploi.io), ¿Que es ploi? Ploi es una herramienta que te permite desplegar tu aplicación en un servidor de una manera muy sencilla, solo debes configurar tu servidor y conectarlo con tu repositorio de git, y cada vez que hagas un push a tu rama principal, se desplegara automáticamente en tu servidor.