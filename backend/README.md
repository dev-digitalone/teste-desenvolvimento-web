# Projeto de teste para dev junior

## Baixando a aplicação

Clicle no botão Code do repositorio e faça clone do projeto digitando o comando ´´´ git clone ´´´ seguido da url que você copiou.

### Instalando as dependências do projeto

Abra o terminal de comandos na pasta raiz do projeto e digite o comando ´´´ npm i ´´´ para instalar as dependências do projeto.

### Definindo as variaveis de ambiente

Copie as variaveis que estão no arquivo env_file e crie um arquivo .env na raiz do projeto então cole as varieaveis nesse arquivo e preencha elas com as seguintes informações:

Obs: O projeto usa o banco de dados mysql

DB_NAME=        Nome do banco de dados

DB_USER=        Seu nome de usuário no banco de

DB_PASS=        Sua senha do banco de dados

DB_HOST=        Host do banco de dados Ex: localhost

AUTHSECRET=     Seu segredo para gerar a criptografia do token jwt

MY_EAMIL=       Seu endereço de email para o envio de email de recuperação de senha

EMAIL_HOST=     Host do servidor de email que você for utilizar

EAMIL_PORT=     Porta do servidor de email que você for utilizar

EMAIL_USER=     Seu email ou codigo do servidor que você estiver usando

EMAIL_PASS=     Senha do seu email

REST_PASS_URL=  Url para ser direcionado para pagina de resetar a senha. Obs: A url padrão já esta no arquivo

### Criando banco de dados

Antes de rodas o projeto crie um banco de dados no mysql com o mesmo nome que você definiu nas variavies de ambiente ou se não tiver definido ainda, informe o nome do banco no aquivo .env

### Rodando o servidor

Abra o terminal de comandos na pasta raiz do projeto e digite o comando ´´´ npm run dev ´´´ o servidor irá rodar em http://localhost:4000.
