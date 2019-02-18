#INSTRUÇÕES DE INSTALAÇÃO#

1.Criar um banco de dados no MySQL;

2.Configurar o arquivo config/Config.php com as informações para acesso ao MySQL(host, user, password, db) e o URL do projeto;

3.Configurar o arquivo phinx.yml com as informações para acesso ao MySQL;

4.Rodar o comando vendor/robmorgan/phinx/bin/phinx migrate -e development no terminal, dentro da pasta do projeto;

Projeto pronto para rodar!
