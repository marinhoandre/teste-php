# Teste para vaga de Analista Desenvolvedor PHP

## Projeto
Desenvolver uma aplicação simples com um CRUD de produtos

# Requisitos

#### CRUD de Produtos

Criar o gerenciamento de categorias do Sistema, onde seja possível Listar, Criar, Editar e Excluir Produtos.


##### Atributos de um Produto são:
- Nome
- Descrição
- Quantidade
- Preço
- Data/Hora de Cadastro
- Data/Hora da Última Atualização

## Descrição da Aplicação

#### Home

- Uma home simples com um menu para o Controle de **Produtos**
- Deve apresentar um quadro que mostre todos os produtos que estão com 3 ou menos volumes em estoque.
- Deve apresentar um quadro com os cinco últimos produtos movimentados no estoque.

#### Controle de Produtos

- Um botão no topo para o cadastramento de um novo **Produto**.
- Uma listagem com todos os produtos cadastrados no sistema, ordenados por **Nome** e **Preço**. Os campos que serão apresentados na listagem são: id, nome, quantidade, preço e Ação.
    - A coluna com o nome do produto deve ser um link que direciona o usuário aos detalhes do produto (*Pode ser um Modal*).
    - A coluna Ação deve possuir quatro botões, **Editar**, **Excluir**, **Reduzir Estoque**, **Aumentar Estoque**.
        - Botão Editar - Deve direcionar o usuário a uma tela onde o Nome, Descrição, Preço e Quantidade do produto possam ser Alterados.
        - Botão Excluir - Exclui o Produto do Sistema.
        - Botão Reduzir o Estoque - Deve reduzir em 1 a quantidade do Produto no Estoque.
        - Botão Aumentar o Estoque - Deve aumentar em 1 a quantidade do Produto no Estoque.
    - As linhas onde a quantidade de produtos seja igual ou inferior a 3 devem possuir um destaque a escolha do desenvolvedor.


# Instruções:
- Faça fork desse repositório envie um Pull Request quando estiver pronto.
- Últilizar php 5.6 ou superior
- Últilizar Banco de Dados MySQL ou MariaDB
    - As tabelas devem ser criadas através de Migrations.
- Obrigatório o uso de **Orientação a Objeto**.
- PROIBIDO o uso de qualquer framework.
- Últilizar as bibliotecas `pdo` para efetuar a comunicação com o Banco de Dados
- Seguir os padrões das **PSRs** (Saiba mais [aqui](http://br.phptherightway.com/) e [aqui](https://www.php-fig.org/psr/)).
- Criar um `README.md` com as instruções de como instalar a aplicação. (Pasta raiz, migrations, configuração do ambiente e banco de dados)
- Os Design Patterns de Factory e Repository são obrigatórios!
- Evite ao máximo usar bibliotecas de terceros.


### Boa Sorte!
