# redis-horizon

## Prerequisites

**DDEV** is required to run this project locally. DDEV is a Docker-based local development tool: it defines PHP, the database, Redis, and other services in configuration so the environment is consistent across machines.

Install DDEV from the [official documentation](https://ddev.readthedocs.io/en/stable/users/install/), then follow the quick setup below from this directory.

## Quick setup (orientation)

From the `redis-horizon` project root:

1. `ddev start` — start containers (PHP, database, Redis, etc.).
2. `ddev composer install` — install PHP dependencies.
3. `ddev artisan key:generate` — create the Laravel `APP_KEY` in `.env` (run once after clone or if `.env` has no key).

Copy `.env.example` to `.env` before step 3 if you have not already.
