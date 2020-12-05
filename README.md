# CRUD
## Разворачивание для тестирования

```
git clone https://github.com/lingharto/crud.git testing
cd testing
docker-compose up -d
docker-compose exec app bash ./make.sh
docker-compose exec app php artisan storage:link
```

Фронтенд работает на http://localhost:8080.
Реализован CRUD для пользователей, на фронтенде можно посмотреть по адресу http://localhost:8080/user/index
Основная работа на бекенде - внутри модуля Modules/User.
