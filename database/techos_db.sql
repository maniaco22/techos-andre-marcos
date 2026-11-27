CREATE DATABASE IF NOT EXISTS techos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE techos_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    perfil ENUM('ADMIN', 'ATENDENTE', 'TECNICO') NOT NULL DEFAULT 'ATENDENTE',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(150) NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS equipamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    modelo VARCHAR(120) NOT NULL,
    numero_serie VARCHAR(80) NOT NULL UNIQUE,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_equipamento_cliente FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ordens_servico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    protocolo VARCHAR(30) NOT NULL UNIQUE,
    cliente_id INT NOT NULL,
    equipamento_id INT NOT NULL,
    defeito_relatado TEXT NOT NULL,
    status ENUM('ABERTA', 'EM_ANDAMENTO', 'CONCLUIDA') NOT NULL DEFAULT 'ABERTA',
    valor_servico DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_os_cliente FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_os_equipamento FOREIGN KEY (equipamento_id) REFERENCES equipamentos(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Usuário Admin padrão (Senha: Admin@2026)
INSERT IGNORE INTO usuarios (id, nome, email, senha_hash, perfil) VALUES
(1, 'André Marcos (Admin)', 'admin@techos.com', '.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ADMIN');

-- Dados iniciais de exemplo
INSERT IGNORE INTO clientes (id, nome, telefone, email) VALUES
(1, 'Carlos Almeida', '(81) 99988-7766', 'carlos@email.com'),
(2, 'Mariana Souza', '(81) 98877-6655', 'mariana@email.com');

INSERT IGNORE INTO equipamentos (id, cliente_id, modelo, numero_serie) VALUES
(1, 1, 'Notebook Dell Inspiron 15', 'SN-DELL-9981'),
(2, 2, 'iPhone 13 Pro 128GB', 'SN-APPL-4420');

INSERT IGNORE INTO ordens_servico (id, protocolo, cliente_id, equipamento_id, defeito_relatado, status, valor_servico) VALUES
(1, 'OS-2026-1001', 1, 1, 'Não liga após queda de energia', 'EM_ANDAMENTO', 0.00),
(2, 'OS-2026-1002', 2, 2, 'Troca de módulo de tela frontal', 'ABERTA', 0.00);