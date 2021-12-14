-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.26 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela idpv.cargo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` (`id`, `nome`, `descricao`) VALUES
	(1, 'Programador', 'Bug o dia inteiraço'),
	(2, 'Copeiro', 'Lavar louças'),
	(5, 'Frentista', 'Abastecer carros'),
	(8, 'Cientista de Dados', 'Mexe com dados dos bancos de dados.'),
	(9, 'Analista T.I', 'Analisa os bugs');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;

-- Copiando dados para a tabela idpv.centro_de_custo: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `centro_de_custo` DISABLE KEYS */;
INSERT INTO `centro_de_custo` (`id`, `nome`) VALUES
	(1, 'Financeiro'),
	(2, 'Operações');
/*!40000 ALTER TABLE `centro_de_custo` ENABLE KEYS */;

-- Copiando dados para a tabela idpv.departamento: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`id`, `nome`, `centro_de_custo_id`) VALUES
	(1, 'Centro de comando', 2),
	(7, 'Infraestrutura', 2),
	(11, 'Centro Financeiro', 1);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;

-- Copiando dados para a tabela idpv.endereco: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando dados para a tabela idpv.sessao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sessao` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessao` ENABLE KEYS */;

-- Copiando dados para a tabela idpv.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `senha`, `email`, `data_de_nascimento`, `cpf`, `cargo_id`, `departamento_id`) VALUES
	(33, 'Admin', '$2y$10$QMqm1aPChOk4MDgIaq/W5Oy83pvumbPasgeFhy2uVcvIYJlqPRbYm', 'admin@admin.com', '2021-12-13', '55555555555', 1, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
