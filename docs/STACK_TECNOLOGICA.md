# Matriz de Decisão e Stack Tecnológica — Sistema TechOS

Comparativo técnico entre **PHP 8 (Apache/XAMPP)** e **Node.js (Express)** para definição da arquitetura backend do **TechOS**, integrada ao frontend web (HTML5/CSS3/JS) e banco relacional MySQL.

| Critério Técnico | PHP 8 + Apache (XAMPP) | Node.js + Express |
| :--- | :--- | :--- |
| **Tipagem e Ecossistema** | Tipagem dinâmica com suporte a *type hints* estritos (`declare(strict_types=1)`), POO nativa completa e gerenciador **Composer** (`firebase/php-jwt`, `vlucas/phpdotenv`). | JavaScript ES6+ unificado entre front e back, tipagem dinâmica e ecossistema **NPM** (`express`, `mysql2`, `jsonwebtoken`, `bcryptjs`). |
| **Modelo de Execução** | Modelo síncrono *Request/Response* gerenciado pelo servidor Apache (XAMPP), isolando cada requisição HTTP em processo/thread dedicada. | Modelo *Single-Threaded Event Loop* não-bloqueante orientado a eventos assíncronos (`async/await`). |
| **Integração JSON e MySQL** | Suporte nativo a JSON (`json_encode`/`json_decode`) e extensão **PDO** com suporte nativo a *Prepared Statements* e transações ACID no MySQL (porta `3306`). | Manipulação nativa de objetos JSON e drivers assíncronos (`mysql2/promise`) com pool de conexões no MySQL. |

## Decisão Arquitetural Adotada
Para o desenvolvimento do **TechOS**, a stack oficial escolhida é **PHP 8 + Apache (via XAMPP)** no backend, **HTML5, CSS3 e JavaScript (ES6+)** no frontend e **MySQL (via XAMPP / MySQL Workbench)** na camada de dados.

## Justificativa Vinculada aos RNFs (Encontro 03)
* **Segurança (RNF02 e RNF04):** O PHP 8 oferece nativamente as funções `password_hash()` e `password_verify()` com algoritmo `BCRYPT` (custo >= 10) sem depender de bibliotecas externas, além da extensão **PDO** que blinda 100% das consultas contra *SQL Injection* via *Prepared Statements*.
* **Confiabilidade ACID (RNF07):** O PDO disponibiliza métodos nativos (`beginTransaction()`, `commit()`, `rollBack()`) integrados diretamente ao motor InnoDB do MySQL no XAMPP.
* **Manutenibilidade (RNF08):** O suporte maduro a classes, interfaces, herança, encapsulamento (`private`/`protected`) e namespaces no PHP 8 facilita a organização limpa em arquitetura MVC.
