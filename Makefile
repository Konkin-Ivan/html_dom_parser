install:
	docker-compose exec php composer install

validate:
	docker-compose exec php composer validate

up:
	docker-compose up -d

build:
	docker-compose up -d --build

stop:
	docker-compose stop

start:
	make up && make install

test:
	docker-compose exec php vendor/bin/phpunit tests/ --colors always