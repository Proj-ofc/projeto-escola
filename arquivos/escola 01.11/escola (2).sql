-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/10/2023 às 18:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `biblioteca`
--

CREATE TABLE `biblioteca` (
  `id` int(11) NOT NULL,
  `livro` varchar(255) NOT NULL,
  `img_livro` varchar(255) DEFAULT NULL,
  `reservado` tinyint(1) DEFAULT 0,
  `usuario` int(11) DEFAULT NULL,
  `fotolivro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `livro`, `img_livro`, `reservado`, `usuario`, `fotolivro`) VALUES
(1, 'livro exemplo', NULL, 0, NULL, ''),
(0, 'Dom Casmurro', 'https://drive.google.com/uc?export=view&id=1LL4gmQHfBhkimW_GC2AGU7XaQYFRw2ev', 0, NULL, 'https://drive.google.com/uc?export=view&id=1X5nLDXoxuBmWo6D8PCdMlKW6iteuogzs'),
(0, 'Memórias Póstumas de Brás Cubas', 'https://drive.google.com/uc?export=view&id=1PCpjBJ0DR1EwuZL5pj8RWnZOfUfzVmGf', 0, NULL, ''),
(0, 'Iracema', 'https://drive.google.com/uc?export=view&id=1eIAhgtLWKxBQ5ZH77cRxgQu0H3Qwd20L', 0, NULL, ''),
(0, 'Grande Sertão: Veredas', 'https://drive.google.com/uc?export=view&id=1ETQq9bLlwN-uTxTjMpenXcx621TC7_Da', 0, NULL, ''),
(0, 'O Guarani', 'https://drive.google.com/uc?export=view&id=1sEdB3ioixw-WPJDnaWlLdvMQJtmhCaN1', 0, NULL, ''),
(0, 'Senhora', 'https://drive.google.com/uc?export=view&id=1hZcxDUvk6qg9B9e8D4-iLyuyJtZ6gbV', 0, NULL, ''),
(0, 'Quincas Borba', 'https://drive.google.com/uc?export=view&id=1iEcCYVnRHSyoK6i78BV8GG6XnHqkeYOs', 0, NULL, ''),
(0, 'O Cortiço', 'https://drive.google.com/uc?export=view&id=1YjGpobVBeu9Xk-G7ISK0OKfv6K9KSEn1', 0, NULL, ''),
(0, 'Vidas Secas', 'https://drive.google.com/uc?export=view&id=1r0mSBqQbfh6tTo-6GGoxFx7PVywosNdZ', 0, NULL, ''),
(0, 'Casa de Pensão', 'https://drive.google.com/uc?export=view&id=1A99QtvPLM6diuWa4cXPkFA5JV6fkZ6--', 0, NULL, ''),
(0, 'Macunaíma', 'https://drive.google.com/uc?export=view&id=1ETQq9bLlwN-uTxTjMpenXcx621TC7_Da', 0, NULL, ''),
(0, 'O Guarani', 'https://drive.google.com/uc?export=view&id=1sEdB3ioixw-WPJDnaWlLdvMQJtmhCaN1', 0, NULL, ''),
(0, 'Capitães da Areia', 'https://drive.google.com/uc?export=view&id=1dB56fNTsPrzO4viXAHVij1d4Kacf3bP2', 0, NULL, ''),
(0, 'O Primo Basílio', 'https://drive.google.com/uc?export=view&id=1opIhRBykg-9pCtxp_SU3qCkoYEIGvHhg', 0, NULL, ''),
(0, 'Til', 'https://drive.google.com/uc?export=view&id=1EIj863t9dtBmUdS47XyYvI8JcnewcupC', 0, NULL, ''),
(0, 'Lucíola', 'https://drive.google.com/uc?export=view&id=19wNGA3UsX7I1hOkIgwOqg6Ec1lxjm_f3', 0, NULL, ''),
(0, 'O Triste Fim de Policarpo Quaresma', 'https://drive.google.com/uc?export=view&id=1o_Ki7DQPQcagb5AjBJMr9xmiryzCWdWF', 0, NULL, ''),
(0, 'O Mulato', 'https://drive.google.com/uc?export=view&id=1bfpSp9jtUbKX5-iziPhy5tCNoxFLZYWb', 0, NULL, ''),
(0, 'A Moreninha', 'https://drive.google.com/uc?export=view&id=1ePKsECDZULxRfGGnm9FNtBiBIH-rnSzd', 0, NULL, ''),
(0, 'O Alienista', 'https://drive.google.com/uc?export=view&id=17alCZxyMJWvZviCjnef5b53dNDRgKmgK', 0, NULL, ''),
(0, '', NULL, 0, NULL, 'domcasmurro.png'),
(0, 'Dom Casmurro.png', NULL, 0, NULL, ''),
(0, 'Memórias Póstumas de Brás Cubas.png', NULL, 0, NULL, ''),
(0, 'Iracema.png', NULL, 0, NULL, ''),
(0, 'Grande Sertão: Veredas.png', NULL, 0, NULL, ''),
(0, 'O Guarani.png', NULL, 0, NULL, ''),
(0, 'Senhora.png', NULL, 0, NULL, ''),
(0, 'Quincas Borba.png', NULL, 0, NULL, ''),
(0, 'O Cortiço.png', NULL, 0, NULL, ''),
(0, 'Vidas Secas.png', NULL, 0, NULL, ''),
(0, 'Casa de Pensão.png', NULL, 0, NULL, ''),
(0, 'Macunaíma.png', NULL, 0, NULL, ''),
(0, 'O Guarani.png', NULL, 0, NULL, ''),
(0, 'Capitães da Areia.png', NULL, 0, NULL, ''),
(0, 'O Primo Basílio.png', NULL, 0, NULL, ''),
(0, 'Til.png', NULL, 0, NULL, ''),
(0, 'Lucíola.png', NULL, 0, NULL, ''),
(0, 'O Triste Fim de Policarpo Quaresma.png', NULL, 0, NULL, ''),
(0, 'O Mulato.png', NULL, 0, NULL, ''),
(0, 'A Moreninha.png', NULL, 0, NULL, ''),
(0, 'O Alienista.png', NULL, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `last_generated_id`
--

CREATE TABLE `last_generated_id` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas/faltas`
--

CREATE TABLE `notas/faltas` (
  `nomea` text NOT NULL,
  `P1` float NOT NULL,
  `P2` float NOT NULL,
  `P3` float NOT NULL,
  `extra` float NOT NULL,
  `sub` float NOT NULL,
  `faltas` int(5) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `ra` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`email`, `ra`, `senha`, `id`, `nome`, `foto`) VALUES
('professor@gmail.com', '', 'senha', 1, 'Clerivaldo', 'clerivaldo.gif'),
('', '12345', 'senha', 2, 'aluno x', 'alunox.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `notas/faltas`
--
ALTER TABLE `notas/faltas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notas/faltas`
--
ALTER TABLE `notas/faltas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
