# SHOPSYSTEMCRAZY

"SHOPSYSTEMCRAZY" es un sistema web desarrollado en **PHP con CodeIgniter 4**, diseñado para la **gestión y venta de productos de cómputo**, permitiendo la administración de información, usuarios y reportes de manera segura y organizada.

---

## Arquitectura, Framework y Base de Datos

* **Arquitectura:** MVC (Model – View – Controller)
* **Framework:** CodeIgniter 4
* **Base de Datos:** MySQL / MariaDB
* **Configuración:** Archivo `.env`

Esta arquitectura permite una separación clara de responsabilidades, facilitando el mantenimiento, la escalabilidad y el trabajo colaborativo.

---

## Descripción del Proyecto

SHOPSYSTEMCRAZY es una aplicación web enfocada en la **administración de un sistema de ventas**, donde:

El "administrador" gestiona productos, categorías, imágenes y usuarios desde la plataforma web.
Los "clientes" consumen la información a través de una aplicación móvil conectada mediante una "API".

La información se almacena y gestiona de forma segura en una base de datos relacional.

---

## Objetivo del Proyecto

Desarrollar un sistema web funcional y escalable que aplique:

* Buenas prácticas de programación
* Uso correcto del framework CodeIgniter 4
* Implementación de la arquitectura MVC
* Conexión eficiente con base de datos
* Preparación para consumo mediante API REST

---

## Funcionalidades Principales

* Autenticación de usuarios (Administrador / Cliente)
* Gestión de productos de cómputo
* Administración de categorías
* Manejo de imágenes por producto
* Registro y control de ventas
* Generación de reportes en PDF
* Conexión con aplicación móvil vía API

---

## Tecnologías Utilizadas

PHP 8.1+
CodeIgniter 4
MySQL / MariaDB
HTML5, CSS3, JavaScript
Composer
Android Studio

---

## Estructura del Proyecto

SHOPSYSTEMCRAZY/
├── app/                # Controladores, modelos y vistas (MVC)
│   ├── Controllers/
│   ├── Models/
│   └── Views/
├── public/             # Archivos públicos (index.php, assets)
├── writable/           # Cache, logs y archivos temporales
├── vendor/             # Dependencias gestionadas por Composer
├── .env                # Configuración del entorno y base de datos
├── composer.json       # Dependencias del proyecto
└── README.md           # Documentación del proyecto
"# conversation" 
