# Symfony Dummy API

This project is a simple API built with Symfony and API platform. It uses PostgreSQL as a database.

## Prerequisities

- Symfony CLI
- Docker, Docker-compose
- Composer

## Installation
1. Clone the repository:
```bash
git clone https://github.com/mireknguyen/symfony-api.git
```
2. Navigate to the project directory:
```bash
cd symfony-api
```
3. Install the dependencies:
```bash
composer install
```

## Running the Application
1. Start the PostgreSQL database:
```bash
docker-compose up -d
```
2. Run the Symfony server:
```bash
symfony server:start -d
```

## Create Dummy data using factory

1. Navigate to the root of this project:
```bash
cd symfony-api
```
2. Run factory to generate data
```bash
symfony console doctrine:fixtures:load
```

## Troubleshooting

1. Error with database connection
- You need to match the port of the database from the Docker Container to the one specified in `.env` file of the project
You can check the port of the database in the Docker container by running the following command:
```
docker ps -a
```

## Sample API endpoints
The API has the following endpoints:
- `GET /api/books`: Fetch all dummy data
- `POST /api/books`: Create a new dummy data
- `GET /api/books/{id}`: Fetch a specific dummy data
- `PUT /api/books/{id}`: Update a specific dummy data
- `DELETE /api/books/{id}`: Delete a specific dummy data
