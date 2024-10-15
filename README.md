# php-puro

### Exercício
Instruções para o exercício:

Você deve implementar as seguintes páginas:

Página de Cadastro de Usuário:

1. O formulário de cadastro deve conter os seguintes campos: Nome, Email, Código Único, Título e Senha.
Ao realizar o cadastro, faça uma consulta na API pública https://jsonplaceholder.typicode.com/posts/1 para recuperar o campo "title" e armazene esse valor no campo "Título" da tabela de usuários.
Página de Login:

1. O usuário deve inserir o Email e a Senha.
Caso as credenciais sejam validadas com sucesso, o usuário deve ser redirecionado para uma página privada (não é necessário incluir informações nessa página).
Após concluir o exercício, faça o upload do seu código no GitHub e envie o link do repositório para o email: heisentecnologia@gmail.com.

##### #### *O exercício deve ser realizado em PHP puro.



CREATE TABLE `test`.`users` (`in_user` INT NOT NULL AUTO_INCREMENT , `name_user` VARCHAR(30) NOT NULL , `email_user` VARCHAR(40) NOT NULL , `password_user` VARCHAR(128) NOT NULL , `title_user` VARCHAR(74) NOT NULL , `code_user` VARCHAR(40) NOT NULL , PRIMARY KEY (`in_user`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;