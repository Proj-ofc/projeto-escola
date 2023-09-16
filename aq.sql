-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/09/2023 às 18:08
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aq`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `N1` int(11) DEFAULT NULL,
  `N2` int(11) DEFAULT NULL,
  `N3` int(11) DEFAULT NULL,
  `N4` int(11) DEFAULT NULL,
  `N5` int(11) DEFAULT NULL,
  `N6` int(11) DEFAULT NULL,
  `N7` int(11) DEFAULT NULL,
  `N8` int(11) DEFAULT NULL,
  `N9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `usuario`, `senha`, `N1`, `N2`, `N3`, `N4`, `N5`, `N6`, `N7`, `N8`, `N9`) VALUES
(2023001, 'Gustavo Silva', '1gustavo silva', '1kpu3zm73w', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Acionadores `alunos`
--
DELIMITER $$
CREATE TRIGGER `generate_aluno_id` BEFORE INSERT ON `alunos` FOR EACH ROW BEGIN
    DECLARE last_id INT;
    DECLARE characters VARCHAR(36);  -- Caracteres permitidos (alfanuméricos)
    DECLARE random_string VARCHAR(10); -- Tamanho da string aleatória
    DECLARE characters_length INT;
    
    -- Define os caracteres permitidos (alfanuméricos)
    SET characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    
    -- Obtém o último ID gerado
    SELECT id INTO last_id FROM last_generated_id;

    -- Verifica se o último ID é nulo ou menor que 2023000
    IF last_id IS NULL OR last_id < 2023000 THEN
        SET last_id = 2023000;
    END IF;
    
    SET NEW.id = last_id+1;

    -- Gera o próximo ID
    SET NEW.usuario = CONCAT((last_id - 2023000) + 1 , LOWER(TRIM(NEW.nome)));

    -- Gera uma string aleatória de 10 caracteres
    SET random_string = '';
    SET characters_length = LENGTH(characters);
    
    WHILE LENGTH(random_string) < 10 DO
        SET random_string = CONCAT(random_string, SUBSTRING(characters, FLOOR(RAND() * characters_length) + 1, 1));
    END WHILE;
    
    SET NEW.senha = random_string;
    
    -- Atualiza o último ID gerado
    UPDATE last_generated_id SET id = last_id + 1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `biblioteca`
--

CREATE TABLE `biblioteca` (
  `id` int(11) NOT NULL,
  `livro` varchar(255) NOT NULL,
  `img_livro` varchar(255) DEFAULT NULL,
  `reservado` tinyint(1) DEFAULT 0,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `livro`, `img_livro`, `reservado`, `usuario`) VALUES
(1, 'livro exemplo', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `last_generated_id`
--

CREATE TABLE `last_generated_id` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `profesores`
--

INSERT INTO `profesores` (`id`, `usuario`, `senha`) VALUES
(1, 'profesor1', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `last_generated_id`
--
ALTER TABLE `last_generated_id`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023002;

--
-- AUTO_INCREMENT de tabela `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `last_generated_id`
--
ALTER TABLE `last_generated_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
