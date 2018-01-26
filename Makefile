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
	docker-compose exec bollenstreek_app php artisan key:generate
	docker-compose exec bollenstreek_app php artisan migrate --seed

provision-composer:
	docker-compose exec bollenstreek_app composer.phar install --no-interaction

rebuild:
	docker-compose build

reload:
	docker-compose restart

up:
	docker-compose up -d

down:
	docker-compose down
