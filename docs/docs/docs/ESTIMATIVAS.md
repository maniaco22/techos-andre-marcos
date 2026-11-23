# Estimativas Técnicas e Cronograma de Sprints — TechOS

Dimensionamento relativo das 6 Histórias de Usuário (User Stories) utilizando a escala de Fibonacci (`1, 2, 3, 5, 8, 13`) e distribuição ao longo das 4 Sprints.

| ID | User Story | Story Points | Sprint Alvo | Complexidade Técnica |
| :--- | :--- | :---: | :---: | :--- |
| **US01** | Autenticação e Controle de Acesso (Login JWT) | **8 pts** | Sprint 3 | Alta |
| **US02** | Cadastro e Gestão de Clientes | **2 pts** | Sprint 3 | Baixa |
| **US03** | Cadastro de Equipamentos Vinculados ao Cliente | **3 pts** | Sprint 3 | Média |
| **US04** | Abertura de Ordem de Serviço (OS) | **5 pts** | Sprint 3 | Média |
| **US05** | Atualização de Status e Encerramento da OS | **8 pts** | Sprint 4 | Alta |
| **US06** | Dashboard e Relatório de Indicadores de OS | **5 pts** | Sprint 3 | Média |

**Total Estimado do Backlog:** 31 Story Points.

## Justificativa Técnica para Histórias de 8+ Pontos
* **US01 (8 pts — Autenticação JWT):** Envolve criptografia unidirecional de senhas (`bcrypt` / `password_hash` com custo >= 10), geração e assinatura de tokens JWT com expiração de 8h e criação de middleware de bloqueio (`HTTP 401`) para rotas protegidas.
* **US05 (8 pts — Atualização e Encerramento de OS):** Exige controle de máquina de estados (`ABERTA` → `EM_ANDAMENTO` → `CONCLUIDA`), validação de permissões polimórficas por perfil (`TECNICO` vs `ATENDENTE`) e execução de transações SQL atômicas (`COMMIT`/`ROLLBACK`) ao registrar o valor final do serviço.
