# Sistema TechOS — Gestão de Ordens de Serviço

Sistema web multiplataforma para gerenciamento completo de Ordens de Serviço (OS), clientes, equipamentos e equipes técnicas da **TechServices**.

## Identificação Acadêmica
* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira

## Arquitetura do Sistema (3 Camadas)
O **TechOS** segue o modelo arquitetural Cliente-Servidor RESTful desacoplado em 3 camadas:
1. **Camada de Apresentação (Frontend):** Interface web responsiva desenvolvida em HTML5, CSS3 e JavaScript (ES6+), comunicando-se via requisições HTTP assíncronas (`fetch`) com payloads JSON.
2. **Camada de Aplicação (Backend / API REST):** Servidor desenvolvido em PHP 8 (via XAMPP / Apache) seguindo o padrão MVC, responsável pelas regras de negócio, autenticação JWT e validação de dados.
3. **Camada de Persistência (Banco de Dados):** Banco de dados relacional MySQL (porta padrão `3306` via XAMPP / MySQL Workbench), acessado via consultas SQL parametrizadas (PDO).

```text
[Navegador: HTML5/CSS3/JS] --- HTTP/JSON (GET/POST/PUT/DELETE) ---> [API REST: PHP 8 / XAMPP]
                                                                            |
                                                                      SQL / TCP (3306)
                                                                            v
                                                                 [MySQL Server / Workbench]
                                                                 