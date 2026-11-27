# Dossiê de Arquitetura POO e MVC (Bloco 2 / Sprint 2) — Sistema TechOS

* **Estudante:** André Marcos
* **Instituição:** SENAI Pernambuco — Unidade Belo Jardim
* **Curso:** Técnico em Desenvolvimento de Sistemas
* **Docente:** Ryan Oliveira
* **Repositório Oficial:** https://github.com/maniaco22/techos-andre-marcos

## Entregas Consolidadas (Encontros 11 a 20)
1. **Estrutura MVC e PSR-4:** Diretórios config/, models/, actories/, strategies/, controllers/, outes/, middlewares/ e iews/ com autoloader nativo em src/autoload.php.
2. **Diagrama de Classes UML:** Modelagem completa de entidades, visibilidade de atributos, tipos de retorno e relacionamentos em docs/diagrama-classes-uml.md.
3. **Models de Domínio (POO):** Classes Usuario, Cliente, Equipamento e OrdemServico com encapsulamento estrito e validações de integridade.
4. **Padrão Singleton (src/config/Database.php):** Instância única de conexão PDO com MySQL (utf8mb4, ERRMODE_EXCEPTION e EMULATE_PREPARES = false).
5. **Padrão Factory (src/factories/OrdemServicoFactory.php):** Criação padronizada de Ordens de Serviço com geração automática de protocolo (OS-AAAA-XXXX).
6. **Padrão Strategy (src/strategies/StatusOSStrategy.php):** Máquina de estados que valida transições seguras (ABERTA -> EM_ANDAMENTO -> CONCLUIDA) e bloqueia encerramento sem valor de serviço.
7. **Validação Automatizada:** Script src/test_poo.php executado via PHP 8 CLI comprovando instanciação, encapsulamento e transições de estado.