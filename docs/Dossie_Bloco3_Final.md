# Dossiê de Persistência, API REST e Frontend (Bloco 3 / Sprint 3) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. **Banco de Dados Relacional (database/techos_db.sql):** Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), índices únicos e seed inicial.
2. **Autenticação JWT e Middleware ([US01]):** Tokens HMAC-SHA256 em src/config/JwtHelper.php e proteção de rotas privadas via src/middlewares/AuthMiddleware.php.
3. **API RESTful Completa (src/index.php e src/controllers/):**
   * POST /api/login: Autenticação de usuários com verificação crypt.
   * GET / POST /api/clientes: Gestão de clientes ([US02]) com *Prepared Statements*.
   * GET / POST /api/equipamentos: Vínculo de equipamentos com número de série único ([US03]).
   * GET / POST /api/os e PATCH /api/os/status: Abertura via Factory ([US04]), transição via Strategy com transação SQL ACID ([US05]) e indicadores ([US06]).
4. **Frontend Web Responsivo (src/views/):** Interface SPA em HTML5, CSS3 e JavaScript ES6+ (etch + localStorage), com máscara de telefone, filtros dinâmicos e KPIs em tempo real.

## Credenciais de Teste (Ambiente Local XAMPP)
* **URL da Aplicação:** http://localhost/tech%20score%20andre/src/views/
* **E-mail Admin:** dmin@techos.com
* **Senha Admin:** Admin@2026
"@
[System.IO.File]::WriteAllText("C:\xampp\htdocs\tech score andre\docs\Dossie_Bloco3_Final.md", # Dossiê de Persistência, API REST e Frontend (Bloco 3 / Sprint 3) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. **Banco de Dados Relacional (database/techos_db.sql):** Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), índices únicos e dados iniciais (*seed*).
2. **Autenticação JWT e Middleware ([US01]):** Geração e validação nativa de tokens HMAC-SHA256 em src/config/JwtHelper.php e proteção de rotas privadas via src/middlewares/AuthMiddleware.php.
3. **API RESTful Completa (src/index.php e src/controllers/):**
   * POST /api/login: Autenticação de usuários com verificação de hash crypt.
   * GET / POST /api/clientes: Gestão de clientes ([US02]) com *Prepared Statements*.
   * GET / POST /api/equipamentos: Vínculo de equipamentos com número de série único ([US03]).
   * GET / POST /api/os e PATCH /api/os/status: Abertura de OS via Factory ([US04]), transição de estados via Strategy com transação SQL (eginTransaction / commit / ollBack) ([US05]) e indicadores gerenciais ([US06]).
4. **Frontend Web Responsivo (src/views/):** Interface SPA em HTML5, CSS3 e JavaScript ES6+ (etch + localStorage), com máscara de telefone, filtros dinâmicos, KPIs em tempo real e acesso via http://localhost/tech%20score%20andre/src/views/.

## Credenciais de Teste (Ambiente Local XAMPP)
* **URL da Aplicação:** http://localhost/tech%20score%20andre/src/views/
* **E-mail Admin:** dmin@techos.com
* **Senha Admin:** Admin@2026
"@
[System.IO.File]::WriteAllText("C:\xampp\htdocs\tech score andre\docs\Dossie_Bloco3_Final.md", , System.Text.UTF8Encoding)

 = @"
# TechOS — Sistema Web de Gestão de Ordens de Serviço

Sistema multiplataforma desenvolvido na Unidade Curricular **Desenvolvimento de Sistemas** (SENAI Pernambuco — Unidade Belo Jardim, docente **Ryan Oliveira**).

## Arquitetura e Stack Tecnológica
* **Backend:** PHP 8+ (Arquitetura MVC, POO, Design Patterns Singleton, Factory e Strategy, Autoloader PSR-4 e API RESTful).
* **Segurança:** Autenticação Stateless via JWT (HMAC-SHA256), senhas com password_hash (crypt) e consultas parametrizadas via PDO.
* **Banco de Dados:** MySQL 8 / MariaDB (database/techos_db.sql).
* **Frontend:** HTML5 Semântico, CSS3 Responsivo e JavaScript ES6+ (etch API).

## Como Executar Localmente (XAMPP)
1. Inicie os módulos **Apache** e **MySQL** no painel do XAMPP.
2. Importe o script database/techos_db.sql no MySQL (phpMyAdmin ou CLI).
3. Acesse no navegador: http://localhost/tech%20score%20andre/src/views/
4. Faça login com **dmin@techos.com** / **Admin@2026**.

## Entregas e Releases
* **Release 1.0-concepcao:** Artefatos de Arquitetura, RNFs (ISO/IEC 25010), Backlog INVEST/BDD e Gestão Ágil (docs/Dossie_Bloco1.md).
* **Release 2.0-poo-mvc:** Estrutura MVC, Diagrama UML, Models encapsulados e Design Patterns (docs/Dossie_Bloco2.md).
* **Release 3.0-mvp-completo:** Banco MySQL, API REST JWT e Frontend Responsivo (docs/Dossie_Bloco3_Final.md)., System.Text.UTF8Encoding)

git add docs/Dossie_Bloco3_Final.md README.md
git commit -m "docs: consolida dossie final da Sprint 3 e atualiza README com guia de execucao"
git push
System.Text.UTF8Encoding = New-Object System.Text.UTF8Encoding False
New-Item -ItemType Directory -Force -Path "docs" | Out-Null

# Dossiê de Persistência, API REST e Frontend (Bloco 3 / Sprint 3) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. **Banco de Dados Relacional (database/techos_db.sql):** Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), índices únicos e dados iniciais (*seed*).
2. **Autenticação JWT e Middleware ([US01]):** Geração e validação nativa de tokens HMAC-SHA256 em src/config/JwtHelper.php e proteção de rotas privadas via src/middlewares/AuthMiddleware.php.
3. **API RESTful Completa (src/index.php e src/controllers/):**
   * POST /api/login: Autenticação de usuários com verificação de hash crypt.
   * GET / POST /api/clientes: Gestão de clientes ([US02]) com *Prepared Statements*.
   * GET / POST /api/equipamentos: Vínculo de equipamentos com número de série único ([US03]).
   * GET / POST /api/os e PATCH /api/os/status: Abertura de OS via Factory ([US04]), transição de estados via Strategy com transação SQL (eginTransaction / commit / ollBack) ([US05]) e indicadores gerenciais ([US06]).
4. **Frontend Web Responsivo (src/views/):** Interface SPA em HTML5, CSS3 e JavaScript ES6+ (etch + localStorage), com máscara de telefone, filtros dinâmicos, KPIs em tempo real e acesso via http://localhost/tech%20score%20andre/src/views/.

## Credenciais de Teste (Ambiente Local XAMPP)
* **URL da Aplicação:** http://localhost/tech%20score%20andre/src/views/
* **E-mail Admin:** dmin@techos.com
* **Senha Admin:** Admin@2026
"@
[System.IO.File]::WriteAllText("C:\xampp\htdocs\tech score andre\docs\Dossie_Bloco3_Final.md", , System.Text.UTF8Encoding)

 = @"
# TechOS — Sistema Web de Gestão de Ordens de Serviço

Sistema multiplataforma desenvolvido na Unidade Curricular **Desenvolvimento de Sistemas** (SENAI Pernambuco — Unidade Belo Jardim, docente **Ryan Oliveira**).

## Arquitetura e Stack Tecnológica
* **Backend:** PHP 8+ (Arquitetura MVC, POO, Design Patterns Singleton, Factory e Strategy, Autoloader PSR-4 e API RESTful).
* **Segurança:** Autenticação Stateless via JWT (HMAC-SHA256), senhas com password_hash (crypt) e consultas parametrizadas via PDO.
* **Banco de Dados:** MySQL 8 / MariaDB (database/techos_db.sql).
* **Frontend:** HTML5 Semântico, CSS3 Responsivo e JavaScript ES6+ (etch API).

## Como Executar Localmente (XAMPP)
1. Inicie os módulos **Apache** e **MySQL** no painel do XAMPP.
2. Importe o script database/techos_db.sql no MySQL (phpMyAdmin ou CLI).
3. Acesse no navegador: http://localhost/tech%20score%20andre/src/views/
4. Faça login com **dmin@techos.com** / **Admin@2026**.

## Entregas e Releases
* **Release 1.0-concepcao:** Artefatos de Arquitetura, RNFs (ISO/IEC 25010), Backlog INVEST/BDD e Gestão Ágil (docs/Dossie_Bloco1.md).
* **Release 2.0-poo-mvc:** Estrutura MVC, Diagrama UML, Models encapsulados e Design Patterns (docs/Dossie_Bloco2.md).
* **Release 3.0-mvp-completo:** Banco MySQL, API REST JWT e Frontend Responsivo (docs/Dossie_Bloco3_Final.md). = @"
# Dossiê de Persistência, API REST e Frontend (Bloco 3 / Sprint 3) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. **Banco de Dados Relacional (database/techos_db.sql):** Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), índices únicos e seed inicial.
2. **Autenticação JWT e Middleware ([US01]):** Tokens HMAC-SHA256 em src/config/JwtHelper.php e proteção de rotas privadas via src/middlewares/AuthMiddleware.php.
3. **API RESTful Completa (src/index.php e src/controllers/):**
   * POST /api/login: Autenticação de usuários com verificação crypt.
   * GET / POST /api/clientes: Gestão de clientes ([US02]) com *Prepared Statements*.
   * GET / POST /api/equipamentos: Vínculo de equipamentos com número de série único ([US03]).
   * GET / POST /api/os e PATCH /api/os/status: Abertura via Factory ([US04]), transição via Strategy com transação SQL ACID ([US05]) e indicadores ([US06]).
4. **Frontend Web Responsivo (src/views/):** Interface SPA em HTML5, CSS3 e JavaScript ES6+ (etch + localStorage), com máscara de telefone, filtros dinâmicos e KPIs em tempo real.

## Credenciais de Teste (Ambiente Local XAMPP)
* **URL da Aplicação:** http://localhost/tech%20score%20andre/src/views/
* **E-mail Admin:** dmin@techos.com
* **Senha Admin:** Admin@2026
"@
[System.IO.File]::WriteAllText("C:\xampp\htdocs\tech score andre\docs\Dossie_Bloco3_Final.md", # Dossiê de Persistência, API REST e Frontend (Bloco 3 / Sprint 3) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. **Banco de Dados Relacional (database/techos_db.sql):** Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), índices únicos e dados iniciais (*seed*).
2. **Autenticação JWT e Middleware ([US01]):** Geração e validação nativa de tokens HMAC-SHA256 em src/config/JwtHelper.php e proteção de rotas privadas via src/middlewares/AuthMiddleware.php.
3. **API RESTful Completa (src/index.php e src/controllers/):**
   * POST /api/login: Autenticação de usuários com verificação de hash crypt.
   * GET / POST /api/clientes: Gestão de clientes ([US02]) com *Prepared Statements*.
   * GET / POST /api/equipamentos: Vínculo de equipamentos com número de série único ([US03]).
   * GET / POST /api/os e PATCH /api/os/status: Abertura de OS via Factory ([US04]), transição de estados via Strategy com transação SQL (eginTransaction / commit / ollBack) ([US05]) e indicadores gerenciais ([US06]).
4. **Frontend Web Responsivo (src/views/):** Interface SPA em HTML5, CSS3 e JavaScript ES6+ (etch + localStorage), com máscara de telefone, filtros dinâmicos, KPIs em tempo real e acesso via http://localhost/tech%20score%20andre/src/views/.

## Credenciais de Teste (Ambiente Local XAMPP)
* **URL da Aplicação:** http://localhost/tech%20score%20andre/src/views/
* **E-mail Admin:** dmin@techos.com
* **Senha Admin:** Admin@2026
"@
[System.IO.File]::WriteAllText("C:\xampp\htdocs\tech score andre\docs\Dossie_Bloco3_Final.md", , System.Text.UTF8Encoding)

 = @"
# TechOS — Sistema Web de Gestão de Ordens de Serviço

Sistema multiplataforma desenvolvido na Unidade Curricular **Desenvolvimento de Sistemas** (SENAI Pernambuco — Unidade Belo Jardim, docente **Ryan Oliveira**).

## Arquitetura e Stack Tecnológica
* **Backend:** PHP 8+ (Arquitetura MVC, POO, Design Patterns Singleton, Factory e Strategy, Autoloader PSR-4 e API RESTful).
* **Segurança:** Autenticação Stateless via JWT (HMAC-SHA256), senhas com password_hash (crypt) e consultas parametrizadas via PDO.
* **Banco de Dados:** MySQL 8 / MariaDB (database/techos_db.sql).
* **Frontend:** HTML5 Semântico, CSS3 Responsivo e JavaScript ES6+ (etch API).

## Como Executar Localmente (XAMPP)
1. Inicie os módulos **Apache** e **MySQL** no painel do XAMPP.
2. Importe o script database/techos_db.sql no MySQL (phpMyAdmin ou CLI).
3. Acesse no navegador: http://localhost/tech%20score%20andre/src/views/
4. Faça login com **dmin@techos.com** / **Admin@2026**.

## Entregas e Releases
* **Release 1.0-concepcao:** Artefatos de Arquitetura, RNFs (ISO/IEC 25010), Backlog INVEST/BDD e Gestão Ágil (docs/Dossie_Bloco1.md).
* **Release 2.0-poo-mvc:** Estrutura MVC, Diagrama UML, Models encapsulados e Design Patterns (docs/Dossie_Bloco2.md).
* **Release 3.0-mvp-completo:** Banco MySQL, API REST JWT e Frontend Responsivo (docs/Dossie_Bloco3_Final.md)., System.Text.UTF8Encoding)

git add docs/Dossie_Bloco3_Final.md README.md
git commit -m "docs: consolida dossie final da Sprint 3 e atualiza README com guia de execucao"
git pushSystem.Text.UTF8Encoding = New-Object System.Text.UTF8Encoding False
# Dossiê de Persistência, API REST e Frontend (Bloco 3 / Sprint 3) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Unidade Curricular:** Desenvolvimento de Sistemas (200h / 40 Encontros)
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. **Banco de Dados Relacional (database/techos_db.sql):** Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), índices únicos e dados iniciais (*seed*).
2. **Autenticação JWT e Middleware ([US01]):** Geração e validação nativa de tokens HMAC-SHA256 em src/config/JwtHelper.php e proteção de rotas privadas via src/middlewares/AuthMiddleware.php.
3. **API RESTful Completa (src/index.php e src/controllers/):**
   * POST /api/login: Autenticação de usuários com verificação de hash crypt.
   * GET / POST /api/clientes: Gestão de clientes ([US02]) com *Prepared Statements*.
   * GET / POST /api/equipamentos: Vínculo de equipamentos com número de série único ([US03]).
   * GET / POST /api/os e PATCH /api/os/status: Abertura de OS via Factory ([US04]), transição de estados via Strategy com transação SQL (eginTransaction / commit / ollBack) ([US05]) e indicadores gerenciais ([US06]).
4. **Frontend Web Responsivo (src/views/):** Interface SPA em HTML5, CSS3 e JavaScript ES6+ (etch + localStorage), com máscara de telefone, filtros dinâmicos, KPIs em tempo real e acesso via http://localhost/tech%20score%20andre/src/views/.

## Credenciais de Teste (Ambiente Local XAMPP)
* **URL da Aplicação:** http://localhost/tech%20score%20andre/src/views/
* **E-mail Admin:** dmin@techos.com
* **Senha Admin:** Admin@2026
"@
[System.IO.File]::WriteAllText("C:\xampp\htdocs\tech score andre\docs\Dossie_Bloco3_Final.md", , System.Text.UTF8Encoding)

 = @"
# TechOS — Sistema Web de Gestão de Ordens de Serviço

Sistema multiplataforma desenvolvido na Unidade Curricular **Desenvolvimento de Sistemas** (SENAI Pernambuco — Unidade Belo Jardim, docente **Ryan Oliveira**).

## Arquitetura e Stack Tecnológica
* **Backend:** PHP 8+ (Arquitetura MVC, POO, Design Patterns Singleton, Factory e Strategy, Autoloader PSR-4 e API RESTful).
* **Segurança:** Autenticação Stateless via JWT (HMAC-SHA256), senhas com password_hash (crypt) e consultas parametrizadas via PDO.
* **Banco de Dados:** MySQL 8 / MariaDB (database/techos_db.sql).
* **Frontend:** HTML5 Semântico, CSS3 Responsivo e JavaScript ES6+ (etch API).

## Como Executar Localmente (XAMPP)
1. Inicie os módulos **Apache** e **MySQL** no painel do XAMPP.
2. Importe o script database/techos_db.sql no MySQL (phpMyAdmin ou CLI).
3. Acesse no navegador: http://localhost/tech%20score%20andre/src/views/
4. Faça login com **dmin@techos.com** / **Admin@2026**.

## Entregas e Releases
* **Release 1.0-concepcao:** Artefatos de Arquitetura, RNFs (ISO/IEC 25010), Backlog INVEST/BDD e Gestão Ágil (docs/Dossie_Bloco1.md).
* **Release 2.0-poo-mvc:** Estrutura MVC, Diagrama UML, Models encapsulados e Design Patterns (docs/Dossie_Bloco2.md).
* **Release 3.0-mvp-completo:** Banco MySQL, API REST JWT e Frontend Responsivo (docs/Dossie_Bloco3_Final.md). = @"
# Dossie de Persistencia, API REST e Frontend (Bloco 3 / Sprint 3) - Sistema TechOS

* Estudante: Andre Marcos
* Instituicao: SENAI Pernambuco - Unidade Belo Jardim
* Curso: Tecnico em Desenvolvimento de Sistemas
* Docente: Ryan Oliveira
* Repositorio: https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 21 a 40)
1. Banco de Dados Relacional (database/techos_db.sql): Schema MySQL (InnoDB, utf8mb4) com tabelas usuarios, clientes, equipamentos e ordens_servico, chaves estrangeiras (FK), indices unicos e seed inicial.
2. Autenticacao JWT e Middleware ([US01]): Tokens HMAC-SHA256 em src/config/JwtHelper.php e protecao de rotas privadas via src/middlewares/AuthMiddleware.php.
3. API RESTful Completa (src/index.php e src/controllers/): POST /api/login, GET/POST /api/clientes ([US02]), GET/POST /api/equipamentos ([US03]), GET/POST /api/os ([US04]) e PATCH /api/os/status com transacao SQL ACID ([US05]) e indicadores ([US06]).
4. Frontend Web Responsivo (src/views/): Interface SPA em HTML5, CSS3 e JavaScript ES6+ (fetch + localStorage), com mascara de telefone, filtros dinamicos e KPIs em tempo real.