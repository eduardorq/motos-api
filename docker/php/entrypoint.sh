#!/bin/bash

# Espera a que MySQL esté disponible
until php bin/console doctrine:query:sql "SELECT 1" > /dev/null 2>&1; do
    echo "Esperando a que MySQL esté disponible..."
    sleep 3
done

# Lo mismo para el entorno de pruebas
php bin/console doctrine:database:create --env=test --if-not-exists
php bin/console doctrine:migrations:migrate --env=test --no-interaction

# Crea la base de datos y ejecuta las migraciones
php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:migrations:migrate --no-interaction

# Ejecuta el comando original (esto es importante para no bloquear el contenedor)
exec "$@"
