-- ============================================================
-- BANCO DE DADOS - LABORATÓRIO SQL
-- MySQL 8.0+
-- ============================================================

DROP DATABASE IF EXISTS laboratorio_sql;

CREATE DATABASE laboratorio_sql
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE laboratorio_sql;

-- ============================================================
-- TABELA: cursos
-- ============================================================

CREATE TABLE cursos (
    id_curso INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    carga_horaria INT NOT NULL,
    modalidade VARCHAR(30) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE
);

-- ============================================================
-- TABELA: professores
-- ============================================================

CREATE TABLE professores (
    id_professor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    especialidade VARCHAR(100),
    salario DECIMAL(10,2) NOT NULL,
    data_admissao DATE NOT NULL
);

-- ============================================================
-- TABELA: disciplinas
-- ============================================================

CREATE TABLE disciplinas (
    id_disciplina INT AUTO_INCREMENT PRIMARY KEY,
    id_curso INT NOT NULL,
    id_professor INT NOT NULL,
    nome VARCHAR(120) NOT NULL,
    carga_horaria INT NOT NULL,
    semestre INT NOT NULL,

    CONSTRAINT fk_disciplina_curso
        FOREIGN KEY (id_curso)
        REFERENCES cursos(id_curso),

    CONSTRAINT fk_disciplina_professor
        FOREIGN KEY (id_professor)
        REFERENCES professores(id_professor)
);

-- ============================================================
-- TABELA: alunos
-- ============================================================

CREATE TABLE alunos (
    id_aluno INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    cidade VARCHAR(100) NOT NULL,
    estado CHAR(2) NOT NULL,
    data_nascimento DATE NOT NULL,
    telefone VARCHAR(20),
    ativo BOOLEAN NOT NULL DEFAULT TRUE
);

-- ============================================================
-- TABELA: matriculas
-- ============================================================

CREATE TABLE matriculas (
    id_matricula INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL,
    id_curso INT NOT NULL,
    data_matricula DATE NOT NULL,
    status VARCHAR(30) NOT NULL,
    nota_final DECIMAL(5,2),

    CONSTRAINT fk_matricula_aluno
        FOREIGN KEY (id_aluno)
        REFERENCES alunos(id_aluno),

    CONSTRAINT fk_matricula_curso
        FOREIGN KEY (id_curso)
        REFERENCES cursos(id_curso)
);

-- ============================================================
-- TABELA: notas
-- ============================================================

CREATE TABLE notas (
    id_nota INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula INT NOT NULL,
    id_disciplina INT NOT NULL,
    nota1 DECIMAL(5,2) NOT NULL,
    nota2 DECIMAL(5,2) NOT NULL,
    nota3 DECIMAL(5,2) NOT NULL,
    frequencia DECIMAL(5,2) NOT NULL,

    CONSTRAINT fk_nota_matricula
        FOREIGN KEY (id_matricula)
        REFERENCES matriculas(id_matricula),

    CONSTRAINT fk_nota_disciplina
        FOREIGN KEY (id_disciplina)
        REFERENCES disciplinas(id_disciplina)
);

-- ============================================================
-- TABELA: pagamentos
-- ============================================================

CREATE TABLE pagamentos (
    id_pagamento INT AUTO_INCREMENT PRIMARY KEY,
    id_matricula INT NOT NULL,
    descricao VARCHAR(150) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    data_pagamento DATE,
    status VARCHAR(30) NOT NULL,

    CONSTRAINT fk_pagamento_matricula
        FOREIGN KEY (id_matricula)
        REFERENCES matriculas(id_matricula)
);

-- ============================================================
-- TABELA: turnos
-- Usada posteriormente no exercício de CROSS JOIN
-- ============================================================

CREATE TABLE turnos (
    id_turno INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL
);

-- ============================================================
-- INSERT - CURSOS
-- ============================================================

INSERT INTO cursos
(nome, carga_horaria, modalidade, valor, ativo)
VALUES
('Técnico em Desenvolvimento de Sistemas', 1200, 'Presencial', 4800.00, TRUE),
('Desenvolvimento Web', 240, 'Híbrido', 1800.00, TRUE),
('Banco de Dados', 120, 'Online', 950.00, TRUE),
('Programação em Python', 180, 'Online', 1400.00, TRUE),
('Redes de Computadores', 160, 'Presencial', 1250.00, TRUE),
('Excel Avançado', 80, 'Híbrido', 650.00, TRUE);

-- ============================================================
-- INSERT - PROFESSORES
-- ============================================================

INSERT INTO professores
(nome, email, especialidade, salario, data_admissao)
VALUES
('Marcelo da Silva Soares', 'marcelo@olecramti.com.br',
 'Desenvolvimento Web', 5200.00, '2022-02-10'),

('Ana Paula Mendes', 'ana@olecramti.com.br',
 'Banco de Dados', 4800.00, '2021-08-15'),

('Carlos Eduardo Lima', 'carlos@olecramti.com.br',
 'Python', 4500.00, '2023-01-20'),

('Juliana Ferreira', 'juliana@olecramti.com.br',
 'Redes', 4300.00, '2022-06-05'),

('Rafael Santos', 'rafael@olecramti.com.br',
 'Excel', 3900.00, '2024-03-18');

-- ============================================================
-- INSERT - DISCIPLINAS
-- ============================================================

INSERT INTO disciplinas
(id_curso, id_professor, nome, carga_horaria, semestre)
VALUES
(1, 1, 'Lógica de Programação', 75, 1),
(1, 2, 'Banco de Dados', 90, 2),
(1, 1, 'Linguagem de Marcação', 75, 1),
(1, 1, 'JavaScript', 90, 2),
(1, 2, 'SQL Avançado', 60, 3),

(2, 1, 'HTML e CSS', 60, 1),
(2, 1, 'JavaScript', 80, 2),

(3, 2, 'Fundamentos de SQL', 60, 1),
(3, 2, 'Modelagem de Dados', 60, 2),

(4, 3, 'Python Básico', 90, 1),

(5, 4, 'Fundamentos de Redes', 80, 1),

(6, 5, 'Excel para Negócios', 80, 1);

-- ============================================================
-- INSERT - ALUNOS
-- ============================================================

INSERT INTO alunos
(nome, email, cidade, estado, data_nascimento, telefone, ativo)
VALUES
('João da Silva', 'joao@email.com',
 'São Luís do Paraitinga', 'SP', '2005-03-15', '12999990001', TRUE),

('Maria Oliveira', 'maria@email.com',
 'Taubaté', 'SP', '2004-07-21', '12999990002', TRUE),

('Pedro Santos', 'pedro@email.com',
 'São José dos Campos', 'SP', '2006-01-10', '12999990003', TRUE),

('Ana Costa', 'ana.aluno@email.com',
 'Ubatuba', 'SP', '2005-11-30', '12999990004', TRUE),

('Lucas Pereira', 'lucas@email.com',
 'Caçapava', 'SP', '2003-05-19', '12999990005', TRUE),

('Beatriz Souza', 'beatriz@email.com',
 'Taubaté', 'SP', '2004-09-12', '12999990006', TRUE),

('Gabriel Almeida', 'gabriel@email.com',
 'Guaratinguetá', 'SP', '2005-02-25', '12999990007', TRUE),

('Larissa Martins', 'larissa@email.com',
 'Pindamonhangaba', 'SP', '2006-08-17', '12999990008', TRUE),

('Felipe Rodrigues', 'felipe@email.com',
 'Lorena', 'SP', '2003-12-03', '12999990009', TRUE),

('Camila Ferreira', 'camila@email.com',
 'Aparecida', 'SP', '2005-06-28', '12999990010', TRUE),

('Rafael Gomes', 'rafael.aluno@email.com',
 'São José dos Campos', 'SP', '2004-04-14', '12999990011', TRUE),

('Juliana Lima', 'juliana.aluno@email.com',
 'Taubaté', 'SP', '2006-10-05', '12999990012', TRUE);

-- ============================================================
-- INSERT - MATRÍCULAS
-- ============================================================

INSERT INTO matriculas
(id_aluno, id_curso, data_matricula, status, nota_final)
VALUES
(1, 1, '2026-02-02', 'Ativa', 8.50),
(2, 1, '2026-02-03', 'Ativa', 9.20),
(3, 1, '2026-02-04', 'Ativa', 7.80),
(4, 1, '2026-02-05', 'Ativa', 6.90),

(5, 2, '2026-02-06', 'Concluida', 8.70),
(6, 2, '2026-02-07', 'Ativa', 9.00),

(7, 3, '2026-02-08', 'Ativa', 7.50),
(8, 3, '2026-02-09', 'Trancada', 5.80),

(9, 4, '2026-02-10', 'Ativa', 8.10),

(10, 5, '2026-02-11', 'Ativa', 7.20),

(11, 6, '2026-02-12', 'Concluida', 9.40),

(12, 1, '2026-02-13', 'Ativa', 8.80);

-- ============================================================
-- INSERT - NOTAS
-- ============================================================

INSERT INTO notas
(id_matricula, id_disciplina, nota1, nota2, nota3, frequencia)
VALUES

(1, 1, 8.0, 9.0, 8.5, 95.0),
(1, 2, 7.5, 8.0, 9.0, 90.0),
(1, 3, 9.0, 8.5, 8.0, 98.0),
(1, 4, 8.0, 9.5, 9.0, 96.0),

(2, 1, 9.0, 9.5, 9.0, 98.0),
(2, 2, 8.5, 9.0, 9.5, 96.0),
(2, 3, 9.0, 9.0, 8.5, 97.0),
(2, 4, 9.5, 9.0, 9.5, 99.0),

(3, 1, 7.0, 8.0, 7.5, 88.0),
(3, 2, 7.5, 7.0, 8.0, 85.0),
(3, 3, 8.0, 7.5, 8.0, 90.0),
(3, 4, 7.0, 8.5, 8.0, 91.0),

(4, 1, 6.0, 7.0, 7.5, 80.0),
(4, 2, 6.5, 7.0, 6.0, 78.0),
(4, 3, 7.0, 6.5, 7.0, 82.0),

(5, 6, 8.0, 9.0, 9.0, 95.0),
(5, 7, 8.5, 8.0, 9.0, 93.0),

(6, 6, 9.0, 9.5, 8.5, 98.0),
(6, 7, 9.0, 9.0, 9.0, 97.0),

(7, 8, 7.0, 8.0, 7.5, 88.0),
(7, 9, 8.0, 7.5, 8.0, 90.0),

(8, 8, 5.0, 6.0, 6.5, 72.0),
(8, 9, 6.0, 5.5, 6.0, 70.0),

(9, 10, 8.0, 8.5, 8.0, 92.0),

(10, 11, 7.0, 7.5, 7.0, 86.0),

(11, 12, 9.5, 9.0, 9.5, 99.0),

(12, 1, 8.5, 9.0, 9.0, 96.0),
(12, 2, 8.0, 8.5, 9.0, 94.0);

-- ============================================================
-- INSERT - PAGAMENTOS
-- ============================================================

INSERT INTO pagamentos
(id_matricula, descricao, valor, data_pagamento, status)
VALUES
(1, 'Mensalidade 01', 400.00, '2026-02-10', 'Pago'),
(1, 'Mensalidade 02', 400.00, '2026-03-10', 'Pago'),
(1, 'Mensalidade 03', 400.00, '2026-04-10', 'Pago'),

(2, 'Mensalidade 01', 400.00, '2026-02-11', 'Pago'),
(2, 'Mensalidade 02', 400.00, '2026-03-11', 'Pago'),
(2, 'Mensalidade 03', 400.00, NULL, 'Pendente'),

(3, 'Mensalidade 01', 400.00, '2026-02-12', 'Pago'),

(4, 'Mensalidade 01', 400.00, NULL, 'Pendente'),

(5, 'Curso Web', 1800.00, '2026-02-15', 'Pago'),

(6, 'Curso Web', 1800.00, '2026-02-16', 'Pago'),

(7, 'Banco de Dados', 950.00, '2026-02-17', 'Pago'),

(8, 'Banco de Dados', 950.00, NULL, 'Pendente'),

(9, 'Python', 1400.00, '2026-02-18', 'Pago'),

(10, 'Redes', 1250.00, '2026-02-19', 'Pago'),

(11, 'Excel', 650.00, '2026-02-20', 'Pago'),

(12, 'Mensalidade 01', 400.00, '2026-02-21', 'Pago');

-- ============================================================
-- INSERT - TURNOS
-- ============================================================

INSERT INTO turnos (nome)
VALUES
('Manhã'),
('Tarde'),
('Noite');

-- ============================================================
-- FIM DO BANCO
-- ============================================================