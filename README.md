## 🚀 Configuración y ejecución del proyecto

Sigue los pasos a continuación para configurar y ejecutar la API en un entorno local.

### 1️⃣ Limpiar la caché de configuración

```bash
php artisan config:clear
```

Elimina la caché de configuración de Laravel para asegurar que los valores definidos en el archivo `.env` y en los archivos de configuración sean cargados correctamente.

---

### 2️⃣ Generar la clave de la aplicación

```bash
php artisan key:generate
```

Genera una nueva clave de aplicación (`APP_KEY`) y la asigna automáticamente en el archivo `.env`.
Esta clave es esencial para garantizar la seguridad de la aplicación, ya que se utiliza en procesos de encriptación, sesiones y generación de tokens.

---

### 3️⃣ Optimizar la aplicación

```bash
php artisan optimize
```

Optimiza el rendimiento de la aplicación mediante la creación de caché para la configuración, rutas y archivos del framework.
Este paso mejora la eficiencia general del sistema.

---

### 4️⃣ Limpiar nuevamente la caché de configuración

```bash
php artisan config:clear
```

Se recomienda ejecutar este comando nuevamente para evitar conflictos entre la configuración optimizada y los cambios recientes del entorno.

---

### 5️⃣ Ejecutar las migraciones de la base de datos

```bash
php artisan migrate
```

Ejecuta las migraciones definidas en el proyecto, creando y actualizando la estructura de la base de datos según los archivos de migración.
Asegúrate de que las credenciales de la base de datos estén correctamente configuradas en el archivo `.env`.

---

### 6️⃣ Iniciar el servidor de desarrollo

```bash
php artisan serve
```

Inicia el servidor de desarrollo de Laravel.
Una vez ejecutado, la API estará disponible por defecto en la siguiente URL:

```
http://127.0.0.1:8000
```

---


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
