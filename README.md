<h2 align="center">
  <img alt="Digital One" src="https://user-images.githubusercontent.com/51726945/85145110-746aa600-b222-11ea-8a50-f73ec9188429.png" />
</h2>

<h2 align="center">  
  Teste para desenvolvedor Web
</h2>

A [Digital One](https://www.digitalone.com.br/) está sempre em busca de profissionais com boa capacidade de aprendizado e adaptação, mas principalmente motivação.

Este teste tem como objetivo avaliar seus conhecimentos. Fique tranquilo, caso não consiga concluir o desafio no prazo estipulado, você deve envia-lo da maneira que estiver, pois iremos avaliar a qualidade do que foi desenvolvido. 

## Desafio

- O seu desafio será construir uma aplicação web para controle de publicações com login e recuperação de senha. 

<details>

  <summary>Layout</summary>
  - O layout ficará por sua conta, seja criativo e nos surpreenda!
</details>

<details>

  <summary>Funcionalidades</summary>
    - O Desafio deverá ter as seguintes funcionalidades:
      
      - Cadastro de usuários
      - Recuperação de senha para usuários já cadastrados
      - Login
      - Publicações (Posts)
        - Create
        - Read
        - Update
        - Delete
        - Index (Listagem)
</details>

<details>
  <summary>Banco de dados</summary>

  - O banco de dados a ser utilizado também poderá ser de sua escolha.

  - Você deverá criar as seguintes tabelas no seu banco de dados:

    - Users
      - O usuário terá as seguintes colunas:
        - name: `VARCHAR(245)`
        - email: `VARCHAR(245)`
        - password: `VARCHAR(245)` **deverá ser criptografado**

    - Posts
      - As publicações terão as seguintes colunas:
        - title: `VARCHAR(245)`
        - description: `VARCHAR(245)`
        - img_url: `VARCHAR(245)`
        - **Não será obrigatório o upload de imagens**, poderá ser cadastrado somente com a URL da mesma.
        - created_at: `TIMESTAMP`
        - author: `Criar uma FK (foreign key) para relacionamento com usuário`
</details>

## Regras 

- Deverá ser utilizado PHP como linguaguem de programação.
  - Está liberado o uso de qualquer framework, porém nós utilizamos o CodeIgniter e isso será considerado como diferencial.
- Você também deve utilizar algum padrão de desenvolvimento (ex: MVC, MVVM, MVP, etc...)
- No layout, Você deverá utilizar algum framework CSS (ex: Bootstrap, MaterializeCSS, etc...)
- Faça commits pequenos para que possamos acompanhar a sua linha de raciocínio.
- Após o recebimento do e-mail com esse desafio, você terá 7 dias para desenvolve-lo.

## Por onde começar?

Primeiramente, você pode fazer um fork desse repositório aqui, para sua conta do Github, depois disso crie uma branch nova com o seu nome (ex: nome_sobrenome), para podermos indentificá-lo.

Após terminar o desafio, você pode solicitar um pull request para a branch master do nosso repositório. Vamos receber e fazer a avaliação de todos.
