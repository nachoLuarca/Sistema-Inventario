# 📦 Sistema de Inventario

Sistema web de gestión de inventario desarrollado con **Laravel (PHP)** y **Blade**, que permite administrar productos, stock y operaciones relacionadas de manera eficiente.

---

## 🚀 Descripción

Este proyecto consiste en una aplicación web que permite llevar el control de inventario, facilitando la administración de productos mediante operaciones CRUD.

Se desarrolló utilizando el framework Laravel, aplicando buenas prácticas como arquitectura MVC, separación de responsabilidades y uso de plantillas Blade para la construcción de la interfaz.

---

## 🧱 Funcionalidades principales

* Registro de productos
* Edición de productos
* Eliminación de productos
* Listado de inventario
* Control de stock
* Interfaz dinámica con Blade

---

## 🛠️ Tecnologías utilizadas

* PHP (Laravel)
* Blade (Motor de plantillas)
* MySQL
* HTML
* CSS
* JavaScript

---

## ⚙️ Requisitos

Antes de ejecutar el proyecto necesitas:

* PHP >= 8.x
* Composer
* MySQL
* Laravel CLI (opcional)
* Servidor web (Apache o Nginx)

---

## ▶️ Cómo ejecutar el proyecto

1. Clonar el repositorio:

```bash
git clone https://github.com/nachoLuarca/Sistema-Inventario.git
cd Sistema-Inventario
```

---

2. Instalar dependencias:

```bash
composer install
```

---

3. Configurar variables de entorno:

```bash
cp .env.example .env
```

Editar `.env`:

```env
DB_DATABASE=inventario_db
DB_USERNAME=root
DB_PASSWORD=
```

---

4. Generar clave de aplicación:

```bash
php artisan key:generate
```

---

5. Ejecutar migraciones:

```bash
php artisan migrate
```

---

6. Levantar servidor:

```bash
php artisan serve
```

---

7. Acceder en navegador:

```bash
http://localhost:8000
```

---

## 📁 Estructura del proyecto

```
Sistema-Inventario/
│
├── app/
├── routes/
├── resources/
│   ├── views/ (Blade)
├── database/
├── public/
└── artisan
```

---

## 🧠 Conceptos aplicados

* Arquitectura MVC (Laravel)
* Motor de plantillas Blade
* ORM Eloquent
* Migraciones de base de datos
* CRUD completo
* Buenas prácticas en desarrollo web

---

## 🚧 Mejoras futuras

* Sistema de autenticación (Laravel Breeze / Jetstream)
* Control de roles y permisos
* API REST para integración externa
* Dashboard con métricas
* Notificaciones de stock bajo

---

## 👨‍💻 Autor

Ignacio Luarca
Analista Programador | Full Stack Developer

---

## ⭐ Notas

Este proyecto fue desarrollado como práctica para fortalecer habilidades en desarrollo web con Laravel, estructuración de aplicaciones bajo MVC y manejo de bases de datos relacionales.
