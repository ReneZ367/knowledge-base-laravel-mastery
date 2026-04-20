# SQL Learning Workspace

This directory contains SQL practice material and a local DDEV setup so contributors can quickly open phpMyAdmin.

## Contents

- `sakila-db/sakila-schema.sql`: Sakila database schema.
- `sakila-db/sakila-data.sql`: Sakila seed data.
- `sakila-db/sakila.mwb`: MySQL Workbench model file.
- `.ddev/`: DDEV configuration and phpMyAdmin add-on files.

## Quick Start (DDEV + phpMyAdmin)

From this `sql/` directory:

```bash
ddev start
ddev phpmyadmin
```

## Import Sakila into MySQL

Because these SQL dump files are a bit older, use the following phpMyAdmin import settings.

### phpMyAdmin settings (for both imports)

In **Andere Optionen**, disable:

- `Fremdschlüsselüberprüfung aktivieren` (turn it off)

In **Formatspezifische Optionen**, set:

- `SQL-Kompatibilitätsmodus`: `MYSQL40`
- `AUTO_INCREMENT nicht für Nullwerte verwenden`

### Import order

Import files in this order:

1. `sakila-db/sakila-schema.sql`
2. `sakila-db/sakila-data.sql`

Apply the same **Formatspezifische Optionen** for both files:

- `SQL-Kompatibilitätsmodus`: `MYSQL40`
- `AUTO_INCREMENT nicht für Nullwerte verwenden`

Then verify with:

```bash
ddev mysql -e "SHOW DATABASES;"
```
