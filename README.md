# App Codeigniter 3

### Api Codeigniter 3

```json

```

### Skills
- [PHP](https://www.php.net/)
- [Codeigniter 3](https://codeigniter.com/)

### Run App in Development
```shell
cd app-codeigniter

php -S 0.0.0.0:9100
# run http://localhost:9100

```

### Run App with Docker and Docker Compose

```shell
docker-compose build
docker-compose up # run http://localhost:9100
 
docker-compose up --build # run http://localhost:9100
```

### Enable migration codeigniter and run migrate custom cli by gilcierweb 

```shell
# php migration.php create_users
# php migration.php create_profiles

# run migrations
php index.php migrate

```

### Run db:seed like rails

```shell
# run seed

php index.php seeder users
php index.php seeder profiles
php index.php seeder all

# Para gerar um número específico de usuários (ex: 10)
php index.php seeder users 10

# Para gerar um número específico de perfis (ex: 20)
php index.php seeder profiles 20

# Para gerar um número específico de ambos
php index.php seeder all 15

```

### Import API file Postman and Insomnia
```text
postman-insomnia.json
```
### API with Swagger UI
```text
/swagger/ui
```

### Todo

- JWT
- OAuth 2.0
- Change password
- 

https://gilcierweb.com.br
