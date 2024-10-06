start:
	docker-compose up -d
	composer install

stop:
	docker-compose down

restart:
	docker-compose down
	docker-compose up -d
	composer install

reinit:
	docker-compose down --volumes
	docker-compose up -d --build

update-database-schema:
	php bin/console doctrine:schema:update --force

load-fixtures-data:
	php bin/console doctrine:fixtures:load --no-interaction

run-tests:
	php bin/phpunit