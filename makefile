include .env

######## CONSTRUCT ########

up:
	docker-compose up -d --build
	docker-compose exec app bash -c "composer install \
			&& cp .env.example .env\
			&& php artisan key:generate"

	docker-compose exec app bash -c "composer dump-autoload \
			&& php artisan migrate:fresh --seed \
			&& php artisan storage:link"

setup:
	@make up
	docker-compose exec app bash -c "npm install && npm run watch"

down:
	rm -f src/.env
	docker-compose down

destroy:
	rm -rf src/node_modules src/vendor src/.env src/public/storage
	docker-compose down --rmi all --volumes
