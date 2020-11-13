<?php

namespace App\Controller;
use \App\Model\Departamento;
use \App\DAO\DepartamentoDao;
require_once "../../vendor/autoload.php";

if (isset($_POST['formPost'])== true &&  $_POST['formPost']=='inserir') {
    $departamento = new \App\Model\Departamento();
    $departamento->setEnderecoDepartamento($_POST['endDepartamento']);
    $departamento->setNomeDepartamento($_POST['nomeDepartamento']);

    $departamentoDao = new \App\DAO\DepartamentoDao();
    $departamentoDao->CadastrarDepartamento($departamento);
    header("Location: ../View/relatorioDepartamento.php");
}

if (isset($_POST['formPost'])== true && $_POST['formPost']=='listar') {
    $departamentoDao = new \App\DAO\DepartamentoDao();
    $ObterDepartamentos = $departamentoDao->ObterDepartamentos();
    return $ObterDepartamentos;
}
if (isset($_POST['formPost'])== true && $_POST['formPost']=='listarRel') {
    $departamentoDao = new \App\DAO\DepartamentoDao();
    $ObterDepartamentos = $departamentoDao->ObterDepartamentosAgrupados();
    return $ObterDepartamentos;
}

if (isset($_GET['formGet']) == true && $_GET['formGet']=='excluir') {
    $departamento = new \App\Model\Departamento();
    $departamento->setCodigoDepartamento($_GET['codigo']);

    $departamentoDao = new \App\DAO\DepartamentoDao();
    $departamentoDao->ExcluirDepartamento($departamento); 
    header("Location: ../View/relatorioDepartamento.php");
}

if (isset($_GET['formGet']) == true && $_GET['formGet']=='alterar') {
    $departamento = new \App\Model\Departamento();
    $departamento->setCodigoDepartamento($_GET['codigo']);

    $departamentoDao = new \App\DAO\DepartamentoDao();
    $departamentoEscolhido = $departamentoDao->ObterDepartamentosPorCodigo($departamento); 
    return $departamentoEscolhido;
}

if (isset($_POST['formPost']) == true && $_POST['formPost']=='editar') {
    $departamento = new \App\Model\Departamento();
    $departamento->setCodigoDepartamento($_POST['cod_depto']);
    $departamento->setEnderecoDepartamento($_POST['endDepartamento']);
    $departamento->setNomeDepartamento($_POST['nomeDepartamento']);

    $departamentoDao = new \App\DAO\DepartamentoDao();
    $departamentoDao->AtualizarDepartamento($departamento); 
    header("Location: ../View/relatorioDepartamento.php"); 
}
