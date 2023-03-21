# Gerenciador de investimentos
## Descrição

API de registro de operações de compra e venda de ativos (ações, fundos
imobiliários e renda ﬁxa) com informações a respeito da distribuição
de carteira e histórico de patrimônio;

## Instalar e rodar o projeto

Crie o arquivo .env 
```bash
$ cp .env.example .env
```

Edite as variáveis de ambiente do arquivo .env
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=investments_manager
DB_USERNAME=root
DB_PASSWORD=
```

Rode os container do projeto
```bash
./vendor/bin/sail up
```

Gere o app key do projeto
```bash
./vendor/bin/sail artisan key:generate
```

Rode as migrations
```bash
./vendor/bin/sail artisan migrate --force
```

## Testes

Para executar os testes rode no terminal:

```bash
$ ./vendor/bin/phpunit
```

