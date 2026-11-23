# Requisitos Não Funcionais (RNF) — Sistema TechOS

Especificação dos requisitos de qualidade de software do **TechOS** baseada na norma **ISO/IEC 25010**, cobrindo desempenho, segurança (OWASP) e acessibilidade (WCAG 2.1).

* **RNF01 [Desempenho — Eficiência de Desempenho]:** Os endpoints REST da API devem responder em tempo médio inferior a **250 ms** sob carga de até **50 requisições simultâneas**.
* **RNF02 [Segurança — Confidencialidade / OWASP]:** Todas as senhas de usuários devem ser armazenadas exclusivamente em formato criptográfico utilizando hash `bcrypt` ou `password_hash()` com fator de custo mínimo igual a **10** (custo >= 10), nunca em texto plano.
* **RNF03 [Segurança — Autenticação JWT]:** Todas as rotas privadas da API (`/api/os`, `/api/clientes`, `/api/equipamentos`) devem exigir cabeçalho `Authorization: Bearer <token>` assinado via JWT com tempo máximo de expiração de **8 horas**, retornando `HTTP 401` em caso de ausência ou invalidação.
* **RNF04 [Segurança — Prevenção contra SQL Injection / OWASP]:** 100% das consultas ao banco de dados MySQL devem utilizar *Prepared Statements* (placeholders `?` ou parâmetros nomeados `:param` via PDO/mysql2), proibindo concatenação direta de strings SQL.
* **RNF05 [Acessibilidade — Usabilidade / WCAG 2.1]:** A interface web deve atingir pontuação **>= 85** na auditoria do Google Lighthouse, garantindo relação de contraste mínima de **4.5:1**, tags HTML5 semânticas, labels associados (`for`/`id`) e navegação completa via teclado.
* **RNF06 [Compatibilidade e Responsividade]:** O layout das telas deve adaptar-se sem rolagem horizontal indesejada desde dispositivos móveis (**375px** de largura) até monitores desktop (**1920px**), utilizando Flexbox e CSS Grid.
* **RNF07 [Confiabilidade e Integridade ACID]:** Operações críticas de encerramento e faturamento de Ordens de Serviço devem ser executadas dentro de transações SQL explícitas (`BEGIN TRANSACTION` / `COMMIT` / `ROLLBACK`), garantindo atomicidade e consistência dos dados.
* **RNF08 [Manutenibilidade e Arquitetura]:** O código-fonte deve seguir estritamente a separação em camadas **MVC** (`models`, `controllers`, `views`, `routes`), com padronização de nomenclatura (`PascalCase` para classes e `camelCase` para variáveis/métodos) e versionamento via *Conventional Commits*.
