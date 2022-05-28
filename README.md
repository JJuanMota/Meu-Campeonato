
## Introdução
Meu Campeonato é um simulador de campeonatos de futebol onde 8 times participam de rodadas eliminatórias até que seja declarado o 1º, 2º e 3º lugar.

## Instalação
>Para a instalação do projeto será necessário conter em seu computador as seguintes dependencias:
> PHP na versão 8.0.2

> Composer

> O Laravel utilizado se encontra na versão 9.14

> Ao clonar o projeto será necessário realizar o comando a seguir para instalação das dependencias:
```bash
Composer install
```
> Será necessário a criação de um banco de dados, recomendo o nome "meu-campeonato".
> Após a criação do banco de dados, altere o .env no projeto para que o laravel consiga se conectar com o banco. Como por exemplo:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=meu-campeonato
DB_USERNAME=root
DB_PASSWORD=
```
> Após a alteração no .env será necessário realizar dois comandos com o artisan
```bash
php artisan migrate
php artisan key:generate
```
Após a execução destes comando, o projeto já poderá ser iniciado.
