init-project:
	docker-compose up -d
	composer install

update-database-schema:
	php bin/console doctrine:schema:update --force

load-fixtures-data:
	php bin/console doctrine:fixtures:load --no-interaction

run-tests:
	php bin/phpunit