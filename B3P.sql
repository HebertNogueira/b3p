SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `B3P`
--

CREATE DATABASE IF NOT EXISTS `B3P` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `B3P`;
--
-- Estrutura da tabela `cursoarea`
--

CREATE TABLE `cursoarea` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursoarea`
--

INSERT INTO `cursoarea` (`codigo`, `descricao`) VALUES
(1, 'CIÊNCIAS HUMANAS E EDUCAÇÃO'),
(2, 'EXATAS'),
(3, 'GESTÃO E NEGÓCIOS'),
(3, 'SAÚDE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursoduracao`
--

CREATE TABLE `cursoduracao` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursoduracao`
--

INSERT INTO `cursoduracao` (`codigo`, `descricao`) VALUES
(1, '4 SEMESTRES'),
(2, '6 SEMESTRES'),
(3, '8 SEMESTRES'),
(4, '10 SEMESTRES'),
(5, '12 SEMESTRES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursomodalidade`
--

CREATE TABLE `cursomodalidade` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursomodalidade`
--

INSERT INTO `cursomodalidade` (`codigo`, `descricao`) VALUES
(1, 'TECNOLÓGICOS'),
(2, 'LICENCIATURA'),
(3, 'BACHARELADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pcurso`
--

CREATE TABLE `pcurso` (
  `codigo` varchar(5) NOT NULL,
  `descricao` varchar(70) NOT NULL,
  `abreviacao` varchar(50) NOT NULL,
  `duracao` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `presencial` varchar(1) NOT NULL,
  `semiPresencial` varchar(1) NOT NULL,
  `ead` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pcurso`
--

INSERT INTO `pcurso` (`codigo`, `descricao`, `abreviacao`, `duracao`, `area`, `modalidade`, `presencial`, `semiPresencial`, `ead`) VALUES
('001', 'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS', 'ADS', '4 SEMESTRES', 'EXATAS', 'TECNOLÓGICOS', 'S', 'S', 'S'),
('002', 'GESTÃO DA TECNOLOGIA DA INFORMAÇÃO', 'GTI', '4 SEMESTRES', 'EXATAS', 'TECNOLÓGICOS', 'S', 'S', 'S'),
('003', 'REDES DE COMPUTADORES', 'REDE', '4 SEMESTRES', 'EXATAS', 'TECNOLÓGICOS', 'S', 'N', 'S'),
('004', 'CIÊNCIA DA COMPUTAÇÃO', 'CIC', '8 SEMESTRES', 'EXATAS', 'TECNOLÓGICOS', 'S', 'N', 'S'),
('005', 'ARQUITETURA E URBANISMO', 'ARTUB', '4 SEMESTRES', 'EXATAS', 'TECNOLÓGICOS', 'S', 'S', 'S'),
('006', 'MEDICINA', 'MEDC', '12 SEMESTRES', 'EXATAS', 'TECNOLÓGICOS', 'S', 'N', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prova`
--

CREATE TABLE `prova` (
  `codProva` int(11) NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `aprovado` varchar(1) NOT NULL,
  `disciplina` int(11) NOT NULL,
  `osbservaçao` varchar(500) NOT NULL,
  `tipoProva` varchar(2) NOT NULL,
  `curso` varchar(5) NOT NULL,
  `campi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provaquestoes`
--

CREATE TABLE `provaquestoes` (
  `codProva` int(11) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `codQuestao` int(11) NOT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `provatipo`
--

CREATE TABLE `provatipo` (
  `tipoProva` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provatipo`
--

INSERT INTO `provatipo` (`tipoProva`, `descricao`) VALUES
('A1', 'PROVA REGIMENTAL'),
('A2', 'AVALIAÇÃO DO PROFESSOR'),
('AF', 'AVALIAÇÃO FINAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qalternativas`
--

CREATE TABLE `qalternativas` (
  `codQuestao` int(11) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `descricaoAlterVF` text,
  `opcao` char(1) NOT NULL,
  `resLacunas` text,
  `resDissertativa` text,
  `resAlternativa` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `qalternativas`
--

INSERT INTO `qalternativas` (`codQuestao`, `tipo`, `descricaoAlterVF`, `opcao`, `resLacunas`, `resDissertativa`, `resAlternativa`) VALUES
(1, 'AT', 'Operação', 'A', NULL, NULL, 'N'),
(1, 'AT', 'Desenvolvimento', 'B', NULL, NULL, 'N'),
(1, 'AT', 'Homologação', 'C', NULL, NULL, 'N'),
(1, 'AT', 'Produção ', 'D', NULL, NULL, 'N'),
(1, 'AT', 'Iniciação ', 'E', NULL, NULL, 'S'),
(2, 'AT', 'um empreendimento “cíclico” ou continuado com o objetivo de criar produtos ou serviços “variados”. O termo “cíclico” significa que cada projeto não tem nem começo nem fim definidos e o termo “variados” significa que os produtos ou serviços produzidos devem ser os mais diversificados possíveis, garantindo assim a característica de reaproveitamento de um projeto.', 'A', NULL, NULL, 'N'),
(2, 'AT', 'um empreendimento “cíclico” ou continuado com o objetivo de criar um produto ou serviço “único”. O termo “cíclico” significa que cada projeto não tem nem começo nem fim definidos e o termo “único” significa que o produto ou serviço produzido é, de alguma forma, diferente de todos os outros produtos ou serviços semelhantes.', 'B', NULL, NULL, 'N'),
(2, 'AT', 'um empreendimento “temporário” com o objetivo de criar um produto ou serviço “único”. O termo “temporário” significa que cada projeto tem um começo e um fim bem definidos e o termo “único” significa que o produto ou serviço produzido é, de alguma forma, diferente de todos os outros produtos ou serviços semelhantes.', 'C', NULL, NULL, 'S'),
(2, 'AT', 'um empreendimento “temporário” com o objetivo de criar produtos ou serviços “variados”. O termo “temporário” significa que cada projeto tem um começo e um fim bem definidos e o termo “variados” significa que os produtos ou serviços produzidos devem ser os mais diversificados possíveis, garantindo assim a característica de re-aproveitamento de um projeto.', 'D', NULL, NULL, 'N'),
(2, 'AT', 'Um empreendimento tanto “cíclico” ou continuado quanto “temporário”, com o objetivo de gerenciar o desenvolvimento de produtos que envolvem mão-de-obra especializada.', 'E', NULL, NULL, 'N'),
(3, 'AT', 'Iniciação, Planejamento, Execução, Monitoramento e Encerramento.', 'A', NULL, NULL, 'S'),
(3, 'AT', 'Escopo, Tempo, Custo, RH, Qualidade e Riscos.', 'B', NULL, NULL, 'N'),
(3, 'AT', 'Escopo, Planejamento, Execução, Monitoramento e Implantação.', 'C', NULL, NULL, 'N'),
(3, 'AT', 'Contrato, Escopo, Custo, Cronograma, Planejamento e Monitoramento.', 'D', NULL, NULL, 'N'),
(3, 'AT', 'Termo de Abertura, Iniciação, Contrato, Gerenciamento do Projeto, Monitoramento e Encerramento.', 'E', NULL, NULL, 'N'),
(4, 'VF', 'I, II e V.', 'A', NULL, NULL, 'S'),
(4, 'VF', 'I, III e IV. ', 'B', NULL, NULL, 'N'),
(4, 'VF', 'II, III e V.', 'C', NULL, NULL, 'N'),
(4, 'VF', 'II, IV e VI.', 'D', NULL, NULL, 'N'),
(4, 'VF', 'II, IV e VI.', 'E', NULL, NULL, 'N'),
(5, 'VF', 'II e IV', 'A', NULL, NULL, 'N'),
(5, 'VF', 'I, II e IV', 'B', NULL, NULL, 'N'),
(5, 'VF', 'III, IV e V', 'C', NULL, NULL, 'N'),
(5, 'VF', 'I, II, IV e V', 'D', NULL, NULL, 'S'),
(5, 'VF', 'I, II, III e IV', 'E', NULL, NULL, 'N'),
(6, 'VF', 'Cronograma ', 'A', NULL, NULL, 'S'),
(6, 'VF', 'Controlar os custos ', 'B', NULL, NULL, 'N'),
(6, 'VF', 'Controlar os riscos ', 'C', NULL, NULL, 'N'),
(6, 'VF', 'O número de recursos disponíveis ', 'D', NULL, NULL, 'N'),
(6, 'VF', 'Controlar o cronograma e os custos', 'E', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qcampus`
--

CREATE TABLE `qcampus` (
  `cnpj` varchar(15) NOT NULL,
  `nomeCampus` varchar(50) NOT NULL,
  `apelido` varchar(10) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `qcampus`
--

INSERT INTO `qcampus` (`cnpj`, `nomeCampus`, `apelido`, `localizacao`) VALUES
('01123456000156', 'Universidade Cidade de Sao Paulo', 'UNICID', 'TATUAPE'),
('01123456000256', 'Universidade Cidade de Sao Paulo', 'UNICID', 'PINHEIROS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qdificuldade`
--

CREATE TABLE `qdificuldade` (
  `codDificuldade` int(11) NOT NULL,
  `nomeDificuldade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `qdificuldade`
--

INSERT INTO `qdificuldade` (`codDificuldade`, `nomeDificuldade`) VALUES
(3, 'DIFICIL'),
(1, 'FACIL'),
(2, 'MEDIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qdisciplinas`
--

CREATE TABLE `qdisciplinas` (
  `codDisciplina` int(11) NOT NULL,
  `disciplina` varchar(40) NOT NULL,
  `dOnline` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `qdisciplinas`
--

INSERT INTO `qdisciplinas` (`codDisciplina`, `disciplina`, `dOnline`) VALUES
(6680, 'MÍDIA POLÍTICA E PODER', 'S'),
(8525, 'GESTÃO DE TECNOLOGIA DA INFORMAÇÃO', 'S'),
(8820, 'PROGRAMAÇÃO PARA DISPOSITIVOS MÓVEIS', 'N'),
(8856, 'PROJETO INTEGRADO', 'N'),
(8870, 'QUALIDADE DE SOFTWARE', 'N'),
(8908, 'SISTEMAS CLIENTE/SERVIDOR', 'N'),
(8970, 'TÓPICOS ESPECIAIS', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qopcoes`
--

CREATE TABLE `qopcoes` (
  `codOpcao` int(11) NOT NULL,
  `opcao` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `qopcoes`
--

INSERT INTO `qopcoes` (`codOpcao`, `opcao`) VALUES
(2, 'A'),
(3, 'B'),
(4, 'C'),
(5, 'D'),
(6, 'E'),
(1, 'X');

-- --------------------------------------------------------

--
-- Estrutura da tabela `qtipo`
--

CREATE TABLE `qtipo` (
  `tipoq` varchar(2) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `tipominimo` tinyint(2) NOT NULL,
  `tipomaximo` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `qtipo`
--

INSERT INTO `qtipo` (`tipoq`, `descricao`, `tipominimo`, `tipomaximo`) VALUES
('AT', 'ALTERNATIVAS', 3, 5),
('DS', 'DISSERTATIVA', 1, 1),
('LC', 'LACUNAS', 3, 5),
('VF', 'VERDADEIRO/FALSO', 3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `codQuestao` int(11) NOT NULL,
  `enunciado` text,
  `tags` varchar(100) DEFAULT NULL,
  `qtdAlternativa` tinyint(2) NOT NULL DEFAULT '1',
  `dificuldade` int(11) NOT NULL,
  `disciplina` int(11) NOT NULL,
  `tipoq` varchar(2) NOT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`codQuestao`, `enunciado`, `tags`, `qtdAlternativa`, `dificuldade`, `disciplina`, `tipoq`, `ativo`) VALUES
(1, 'Que alternativa apresenta um grupo de processos previsto no PMBOK?', 'PMBOK,processos', 5, 1, 8870, 'AT', 'S'),
(2, 'Segundo o PMBOK, um projeto pode ser definido como:', 'PMBOK,PROJETO', 5, 1, 8820, 'AT', 'S'),
(3, 'As áreas que compõem o conjunto de conhecimentos sobre gerenciamento de projetos são dez. Para essas dez áreas, o PMBOK propõe o agrupamento de processos em função da sua natureza. Entre as opções abaixo, selecione aquela que enuncia corretamente os grupos de processos de gerenciamento de projetos.\r\n	   ', 'GRUPO DE PROCESSOS,GERENCIAMENTO DE PROCESSOS', 5, 1, 8870, 'AT', 'S'),
(4, 'As organizações, sejam as de caráter público ou privado, tomam decisões e implementam ações que lhes possibilitem alcançar seus objetivos. Essas ações, em função de suas peculiaridades, podem ser classificadas em atividades ou projetos, o que supõe a adoção de modelos distintos de gestão. Nessa perspectiva, considere as ações abaixo.\r\n\r\n	I - Implantação de um novo sistema de gestão financeira.\r\n\r\n	II - Obras de duplicação de uma rodovia.\r\n\r\n	III - Controle do consumo de energia para emissão de faturas de cobrança.\r\n\r\n	IV - Elaboração da folha de pagamento.\r\n\r\n	V - Construção de uma hidroelétrica.\r\n\r\n	VI - Atendimento ambulatorial em um hospital.\r\n\r\n	São identificadas como projetos APENAS as ações:', 'ACOES DE PROJETO,', 5, 2, 8525, 'VF', 'S'),
(5, 'Com relação às melhores práticas de gestão de projetos, considere as afirmativas abaixo:\r\n\r\n	I. Para realizar os projetos é necessário concentrar esforços em projetos menores, que tenham entregas alcançáveis e cujos prazos possam ser cumpridos.\r\n\r\n	II. O gerente de projeto deve se posicionar de forma a que todas as áreas diretamente envolvidas no sucesso do projeto estejam comprometidas e disponíveis na medida da necessidade.\r\n\r\n	III. Não existe um tamanho ideal para a equipe, mas uma boa regra é ter sempre mais de uma pessoa para cada papel ou mais de um papel para cada pessoa.\r\n\r\n	IV. O planejamento deve garantir que as pessoas não estejam envolvidas em mais projetos do que seria racional, o que geraria disputa de recursos entre os projetos.\r\n\r\n	V. Equipes de projeto que já estejam se esforçando para cumprir seus escopos e prazos devem se dedicar às atividades essenciais que agregam valor ao projeto, e a estrutura deve se esforçar para adaptar-se a estas condições.', 'MELHORES PRATICAS,GESTAO DE PROJETOS', 5, 3, 8820, 'AT', 'S'),
(6, 'Um projeto tem Índice de Desempenho de Custo\r\n\r\n	(IDC) = 0,81 e Índice de Desempenho de Prazo (IDP) = 1,1. Qual deve ser a maior preocupação do gerente do projeto?', 'IDC,IDP', 5, 1, 8870, 'AT', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(5) NOT NULL,
  `rgm` int(5) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `rgm`, `senha`, `nome`) VALUES
(1, 50500, 'teste', 'Usuário Teste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursoarea`
--
ALTER TABLE `cursoarea`
  ADD PRIMARY KEY (`descricao`),
  ADD UNIQUE KEY `cursoArea2` (`codigo`,`descricao`);

--
-- Indexes for table `cursoduracao`
--
ALTER TABLE `cursoduracao`
  ADD PRIMARY KEY (`descricao`),
  ADD UNIQUE KEY `cursoDuracao2` (`codigo`,`descricao`);

--
-- Indexes for table `cursomodalidade`
--
ALTER TABLE `cursomodalidade`
  ADD PRIMARY KEY (`descricao`),
  ADD UNIQUE KEY `cursoModalidade1` (`codigo`,`descricao`);

--
-- Indexes for table `pcurso`
--
ALTER TABLE `pcurso`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `prvcurso2` (`descricao`),
  ADD KEY `prvcurso3` (`duracao`),
  ADD KEY `prvcurso4` (`area`),
  ADD KEY `prvcurso5` (`modalidade`);

--
-- Indexes for table `prova`
--
ALTER TABLE `prova`
  ADD PRIMARY KEY (`codProva`),
  ADD KEY `prova2` (`disciplina`),
  ADD KEY `prova3` (`curso`),
  ADD KEY `prova4` (`campi`),
  ADD KEY `prova5` (`tipoProva`);

--
-- Indexes for table `provaquestoes`
--
ALTER TABLE `provaquestoes`
  ADD PRIMARY KEY (`codProva`,`codQuestao`,`tipo`),
  ADD KEY `provaQuest2` (`codQuestao`),
  ADD KEY `provaQuest3` (`tipo`);

--
-- Indexes for table `provatipo`
--
ALTER TABLE `provatipo`
  ADD PRIMARY KEY (`tipoProva`),
  ADD UNIQUE KEY `provaTipo2` (`tipoProva`);

--
-- Indexes for table `qalternativas`
--
ALTER TABLE `qalternativas`
  ADD PRIMARY KEY (`codQuestao`,`tipo`,`opcao`),
  ADD KEY `altern3` (`tipo`),
  ADD KEY `altern4` (`opcao`);

--
-- Indexes for table `qcampus`
--
ALTER TABLE `qcampus`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `qdificuldade`
--
ALTER TABLE `qdificuldade`
  ADD PRIMARY KEY (`codDificuldade`),
  ADD UNIQUE KEY `qdific2` (`nomeDificuldade`);

--
-- Indexes for table `qdisciplinas`
--
ALTER TABLE `qdisciplinas`
  ADD PRIMARY KEY (`codDisciplina`),
  ADD UNIQUE KEY `qdiscipl2` (`disciplina`);

--
-- Indexes for table `qopcoes`
--
ALTER TABLE `qopcoes`
  ADD PRIMARY KEY (`opcao`),
  ADD UNIQUE KEY `qopcao2` (`opcao`);

--
-- Indexes for table `qtipo`
--
ALTER TABLE `qtipo`
  ADD PRIMARY KEY (`tipoq`),
  ADD UNIQUE KEY `tipquest2` (`tipoq`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`codQuestao`,`tipoq`),
  ADD KEY `quest3` (`dificuldade`),
  ADD KEY `quest4` (`disciplina`),
  ADD KEY `quest5` (`tipoq`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prova`
--
ALTER TABLE `prova`
  MODIFY `codProva` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qdificuldade`
--
ALTER TABLE `qdificuldade`
  MODIFY `codDificuldade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `codQuestao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pcurso`
--
ALTER TABLE `pcurso`
  ADD CONSTRAINT `prvcurso3` FOREIGN KEY (`duracao`) REFERENCES `cursoduracao` (`descricao`),
  ADD CONSTRAINT `prvcurso4` FOREIGN KEY (`area`) REFERENCES `cursoarea` (`descricao`),
  ADD CONSTRAINT `prvcurso5` FOREIGN KEY (`modalidade`) REFERENCES `cursomodalidade` (`descricao`);

--
-- Limitadores para a tabela `prova`
--
ALTER TABLE `prova`
  ADD CONSTRAINT `prova2` FOREIGN KEY (`disciplina`) REFERENCES `qdisciplinas` (`codDisciplina`),
  ADD CONSTRAINT `prova3` FOREIGN KEY (`curso`) REFERENCES `pcurso` (`codigo`),
  ADD CONSTRAINT `prova4` FOREIGN KEY (`campi`) REFERENCES `qcampus` (`cnpj`),
  ADD CONSTRAINT `prova5` FOREIGN KEY (`tipoProva`) REFERENCES `provatipo` (`tipoProva`);

--
-- Limitadores para a tabela `provaquestoes`
--
ALTER TABLE `provaquestoes`
  ADD CONSTRAINT `provaQuest2` FOREIGN KEY (`codQuestao`) REFERENCES `questoes` (`codQuestao`),
  ADD CONSTRAINT `provaQuest3` FOREIGN KEY (`tipo`) REFERENCES `questoes` (`tipoq`),
  ADD CONSTRAINT `provaQuest4` FOREIGN KEY (`codProva`) REFERENCES `prova` (`codProva`);

--
-- Limitadores para a tabela `qalternativas`
--
ALTER TABLE `qalternativas`
  ADD CONSTRAINT `altern2` FOREIGN KEY (`codQuestao`) REFERENCES `questoes` (`codQuestao`),
  ADD CONSTRAINT `altern3` FOREIGN KEY (`tipo`) REFERENCES `questoes` (`tipoq`),
  ADD CONSTRAINT `altern4` FOREIGN KEY (`opcao`) REFERENCES `qopcoes` (`opcao`);

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `quest3` FOREIGN KEY (`dificuldade`) REFERENCES `qdificuldade` (`codDificuldade`),
  ADD CONSTRAINT `quest4` FOREIGN KEY (`disciplina`) REFERENCES `qdisciplinas` (`codDisciplina`),
  ADD CONSTRAINT `quest5` FOREIGN KEY (`tipoq`) REFERENCES `qtipo` (`tipoq`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
