<?php

namespace App\Controller;
use \App\DAO\EmpregadoDao;
use \App\Model\Empregado;
require_once "../../vendor/autoload.php";

if (isset($_POST['formPost'])== true && $_POST['formPost']=='salvar') {
    $empregado = new \App\Model\Empregado();
    $empregado->setNome($_POST['nomeEmpregado']);    
    $empregado->setEndereco($_POST['end_empregado']);    
    $empregado->setRg($_POST['rgEmpregado']);    
    $empregado->setCpf($_POST['cpfEmpregado']);    
    $empregado->setCodDepto($_POST['selectDep']);   
    $projetos = $_POST['selectProj'];      
    $cargaHoraria = $_POST['cargahoraria'];      

    $EmpregadoDao = new \App\DAO\EmpregadoDao();
    $EmpregadoDao->CadastrarEmpregado($empregado, $projetos, $cargaHoraria); 
    
    header("Location: ../View/inicio.php");
}

if (isset($_POST['formPost'])== true && $_POST['formPost']=='listar') {
    $Empregado = new \App\DAO\EmpregadoDao();
    $listarEmpregados = $Empregado->ObterEmpregados();
    return $listarEmpregados;
}

if (isset($_GET['formGet'])== true && $_GET['formGet']=='listarFiltro') {
    $empregado = new \App\DAO\EmpregadoDao();
    $filtro = $_GET['buscaEmp'];
    $listarEmpregados = $empregado->ObterEmpregadosFiltro($filtro);
    return $listarEmpregados;
}

if (isset($_GET['formGet'])== true && $_GET['formGet']=='listarTodos') {
    $empregado = new \App\DAO\EmpregadoDao();
    $listarEmpregados = $empregado->ObterEmpregadosFiltro("");
    return $listarEmpregados;
}

if (isset($_GET['formGet'])== true && $_GET['formGet']=='buscaRelEmp_Proj_null') {
    header("Location: ../View/relatorioEmpregadosProjeto.php?retorno=true&selectProj=".$_GET['selectProj']);
}
if (isset($_GET['formGet'])== true && $_GET['formGet']=='buscaRelEmp_Proj') {
    $empregado = new \App\DAO\EmpregadoDao();
    $filtro = $_GET['selectProj'];
    $listarEmpregados = $empregado->ObterEmpregadosPorProjeto($filtro);
    return $listarEmpregados;
    header("Location: ../View/relatorioEmpregadoProjeto.php");
}

if (isset($_GET['formGet'])== true && $_GET['formGet']=='excluir') {
    $projeto = new \App\Model\Projeto(); 
    $projeto->setCodigoProjeto($_GET['codigo']);    

    $ProjetoDao = new \App\DAO\ProjetoDao();
    $ProjetoDao->ExcluirProjeto($projeto);
    header("Location: ../View/relatorioProjeto.php");
}

if (isset($_GET['formGet'])== true && $_GET['formGet']=='alterar') {
    $projeto = new \App\Model\Projeto(); 
    $projeto->setCodigoProjeto($_GET['codigo']);    

    $ProjetoDao = new \App\DAO\ProjetoDao();
    $projetoEditar = $ProjetoDao->ObterEmpregadosPorCodigo($projeto);
    return $projetoEditar;
}

if (isset($_POST['formPost'])== true && $_POST['formPost']=='editar') {
    $projeto = new \App\Model\Projeto();
    $projeto->setDescricaoProjeto($_POST['descProj']);    
    $projeto->setCodigoDepartamento($_POST['selectDep']);    
    $projeto->setCodigoProjeto($_POST['codigo']);    

    $ProjetoDao = new \App\DAO\ProjetoDao();
    $ProjetoDao->CadastrarProjeto($projeto);
    header("Location: ../View/relatorioProjeto.php");
}