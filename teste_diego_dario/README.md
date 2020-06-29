# Como rodar o projeto?

## Setup
Faça uma cópia de `env` para um `.env`.

## Installation 

## install dependencies
`composer install`. 
se receber algum erro tente
`composer install--ignore-platform-reqs`


## Get containers up
`docker-compose up`.

## Start App
`php spark serve`.

## REHEL
se você estiver em sistemas redhat

`sudo dnf install php-mysqlnd`
`sudo setenforce Permissive    `
`podman-compose up`.

