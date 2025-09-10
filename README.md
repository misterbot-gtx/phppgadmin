
# phpPgAdmin

O **phpPgAdmin** é uma aplicação web escrita em PHP que fornece uma interface gráfica para administração do banco de dados **PostgreSQL**.  
Inspirado no phpMyAdmin (para MySQL/MariaDB), ele facilita o gerenciamento de bancos, tabelas, usuários e permissões diretamente pelo navegador, sem a necessidade de usar a linha de comando `psql`.

---

## 🚀 Funcionalidades

- **Gerenciamento de bancos de dados**  
  Criar, alterar e remover bancos de dados PostgreSQL.

- **Gerenciamento de tabelas e esquemas**  
  Criar, editar e excluir tabelas, colunas, índices e sequências.

- **Execução de queries SQL**  
  Editor SQL integrado para rodar comandos e visualizar resultados.

- **Gerenciamento de usuários e permissões**  
  Criar e configurar papéis (roles), alterar senhas e gerenciar privilégios.

- **Exportação e importação de dados**  
  Exportar tabelas ou bancos completos em diferentes formatos.

- **Interface multilíngue**  
  Suporte a diversos idiomas, incluindo **português**.

- **Navegação amigável**  
  Estrutura hierárquica clara para visualizar bancos, esquemas e objetos.

---

## 📦 Requisitos

- Servidor Web compatível com PHP (Apache, Nginx, etc.)  
- PHP 7.2+ com extensões **pgsql** e **pdo_pgsql** habilitadas  
- Servidor PostgreSQL acessível (local ou remoto)  

---

## ⚙️ Configuração

A configuração principal é feita no arquivo:

```

conf/config.inc.php

````

### Exemplo de configuração mínima:

```php
<?php
$conf['extra_login_security'] = false;

$conf['servers'] = array(
    array(
        'desc' => 'Servidor Local',
        'host' => '127.0.0.1',
        'port' => 5432,
        'sslmode' => 'allow',
        'defaultdb' => 'postgres'
    )
);

$conf['owned_only'] = false;
$conf['show_system'] = true;
````

* `host`: endereço do servidor PostgreSQL (IP ou hostname)
* `port`: porta do Postgres (padrão: 5432)
* `defaultdb`: banco padrão para login
* `extra_login_security`: se `true`, restringe logins apenas a usuários especificados

---

## 🔑 Login

Na tela inicial, o usuário deve informar:

* **Usuário** do PostgreSQL
* **Senha** correspondente
* (Opcional) escolher o banco de dados a acessar

O phpPgAdmin utiliza a autenticação padrão do PostgreSQL definida no `pg_hba.conf`.

---

## 🌍 Interface

* **Menu lateral esquerdo**: lista de bancos, esquemas e tabelas.
* **Área principal**: exibe propriedades do objeto selecionado, resultados de queries e formulários de edição.
* **SQL**: editor integrado para rodar consultas personalizadas.

---

## 🧩 Casos de uso

* Administração de pequenos e médios bancos PostgreSQL sem precisar usar linha de comando.
* Ferramenta didática para aprender PostgreSQL de forma visual.
* Alternativa leve e simples ao **pgAdmin**.
* Solução para hospedar junto de projetos web e oferecer administração rápida do banco.

---

## 📜 Licença

O phpPgAdmin é um projeto **open source** distribuído sob a licença **GNU GPL**.
Repositório oficial: [https://github.com/phppgadmin/phppgadmin](https://github.com/phppgadmin/phppgadmin)