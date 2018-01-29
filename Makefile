help:
	@echo "\nAvailable commands:\n \
	 - provision: Build containers, run migrations, composer install\n \
	 - up: Start containers\n \
	 - down: Stop containers" \
	 - rebuild: Rebuild containers" \
	 - reload: Reload containers"

provision:
	docker-compose up -d
	make provision-composer
	cp .env.example .env
	docker-compose exec brwssm_app php artisan key:generate
	make provision-composer

provision-composer:
	docker-compose exec brwssm_app composer.phar install --no-interaction

provision-migrate:
	docker-compose exec brwssm_app php artisan migrate

rebuild:
	docker-compose build

reload:
	docker-compose restart

up:
	docker-compose up -d

down:
	docker-compose down

test:
	docker-compose exec brwssm_app ./vendor/bin/phpunit

tinker:
	docker-compose exec brwssm_app php artisan tinker
