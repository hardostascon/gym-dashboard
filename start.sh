#!/bin/bash

# Salir inmediatamente si un comando falla
set -e

# Mostrar cada comando que se ejecuta (útil para debug)
set -x

# Iniciar php-fpm en segundo plano
php-fpm &

# Iniciar nginx en modo demonio (foreground para contenedor)
nginx -g "daemon off;"