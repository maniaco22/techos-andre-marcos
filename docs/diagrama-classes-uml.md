# Diagrama de Classes UML - Sistema TechOS (Sprint 2)

mermaid
classDiagram
    class Database {
        -PDO instance$
        -Database()
        +getConnection()$ PDO
    }
    class Usuario {
        -int id
        -string nome
        -string email
        -string senhaHash
        -string perfil
        +verificarSenha(string senhaPura) bool
    }
    class Cliente {
        -int id
        -string nome
        -string telefone
        -string email
    }
    class Equipamento {
        -int id
        -int clienteId
        -string modelo
        -string numeroSerie
    }
    class OrdemServico {
        -int id
        -string protocolo
        -int clienteId
        -int equipamentoId
        -string defeitoRelatado
        -string status
        -float valorServico
        +alterarStatus(string novoStatus, float valorServico) void
    }
    class OrdemServicoFactory {
        +criarNova(int clienteId, int equipamentoId, string defeitoRelatado)$ OrdemServico
    }
    class StatusOSStrategy {
        +transicionar(OrdemServico os, string novoStatus, float valorServico)$ void
    }
    Cliente "1" --> "0..*" Equipamento : possui
    Cliente "1" --> "0..*" OrdemServico : solicita
    Equipamento "1" --> "0..*" OrdemServico : vinculado a
    OrdemServicoFactory ..> OrdemServico : instancia
    StatusOSStrategy ..> OrdemServico : gerencia estado

