-- Scripts --


----- Tabela Projeto -----

CREATE TABLE projeto
(
codigo int PRIMARY KEY NOT null AUTO_INCREMENT,
descricao varchar(200),
cod_depto int
)

INSERT INTO `projeto` (`codigo`, `descricao`, `cod_depto`) VALUES
(14, 'ENGENHARIA', 123),
(15, 'URBANISMO', 221),
(16, 'TRANSPORTE', 123),
(17, 'INFORMÁTICA', 854),
(18, 'TELEMARKETING', 859),
(19, 'REDES', 232);

----- Tabela Carga Horária -----

CREATE TABLE carga_horaria
(
	cod_proj int,
    mat int,
    c_horaria int
)

INSERT INTO `carga_horaria` (`cod_proj`, `mat`, `c_horaria`) VALUES
(1, 11, 251),
(2, 111, 125),
(3, 101, 59),
(2, 209, 95),
(5, 129, 125),
(4, 149, 985),
(6, 254, 259),
(2, 165, 354),
(2, 101, 30);

----- Tabela Departamento -----

CREATE TABLE depto
(
	cod_depto int PRIMARY KEY not null AUTO_INCREMENT,
    nome varchar(200),
    endereco varchar(200)
)

INSERT INTO `depto` (`cod_depto`, `nome`, `endereco`) VALUES
(123, 'Planejamento', 'RUA A, 25'),
(221, 'Administrativo', 'RUA B, 36'),
(125, 'Segurança', 'RUA C, 125'),
(257, 'Recursos Humanos', 'RUA D, 225'),
(859, 'OnBoarding', 'RUA E, 285'),
(854, 'Tecnologia', 'RUA F, 27'),
(232, 'Suprimentos', 'RUA G, 127');

----- Tabela Empregado -----

CREATE TABLE empregado
(
	mat int not null PRIMARY KEY AUTO_INCREMENT,
    nome_emp varchar(200),
    endereco varchar(200),
    rg varchar(200),
	cpf varchar(200),
	cod_depto varchar(200)
)

INSERT INTO `empregado` (`mat`, `nome_emp`, `endereco`, `rg`, `cpf`, `cod_depto`) VALUES
(11, 'JOAO', 'AV. CLIMERIO N. 45', '2781230', '126543987-11', '123'),
(101, 'JOAQUIM', 'RUA DA PRAIA S/N', '1582650', '168572598-55', '123'),
(111, 'CARLOS', 'AV. PAULISTA 1236', '1215191', '126874598-58 ', '221'),
(209, 'ANA', 'RUA LOPES MENDES 12', '1800589', '369857198-55', '221'),
(129, 'MARIA', 'RUA PADRE CAFÉ, 125', '1800589', '125987720-18', '221'),
(259, 'PEDRO', 'RUA BOM JARDIM, 254', '1875921', '361254978-55', '232'),
(296, 'PAULO', 'RUA RIO BRANCO, 1284', '1459758', '125478998-15', '221'),
(149, 'JOSE', 'RUA LOPES, 154', '1245789', '854966521-14', '859'),
(254, 'PEDRO', 'RUA BATISTA, 222', '3601551', '124567898-55', '221'),
(167, 'JULIA', 'RUA JK, 1512', '1805874', '369857198-51', '854'),
(952, 'ANDREIA', 'RUA MARECHAL, 112', '1254698', '325145698-55', '859'),
(165, 'PAULA', 'RUA SILVA JARDIM, 2', '1534648', '363524198-55', '232'),
(103, 'ERICA', 'RUA FLORIANO, 982', '1236578', '367895128-57', '8593'),
(185, 'MARCOS', 'RUA LOPES MENDES 152', '1115489', '364578518-66', '854'),
(194, 'EDUARDO', 'RUA LOPES MENDES 578', '1789589', '195678968-55', '232');

----- Tabela Empregado - Dependente -----

CREATE TABLE empregado_dependente 
(
	mat_emp int,
    dependente int,
    nome_dep varchar (200),
    data_nasc date,
    tipo varchar(30)
)

INSERT INTO `empregado_dependente` (`mat_emp`, `dependente`, `nome_dep`, `data_nasc`, `tipo`) VALUES
(11, 1, 'Joana', '04/11/1989', 'Cônjuge'),
(11, 2, 'Marcos', '01/04/2009', 'Filho(a)'),
(11, 3, 'Mariana', '08/09/2011', 'Filho(a)'),
(103, 1, 'Matheus', '09/04/2006', 'Filho(a)'),
(129, 1, 'João Carlos', '04/05/1978', 'Cônjuge');
