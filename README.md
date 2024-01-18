cp .env.example .env

docker-compose up-d

docker exec -it war_cron bash

php artisan migrate

exit

