<?php

namespace App\Controller;
use \App\DAO\ProjetoDao;
use \App\Model\Projeto;
require_once "../../vendor/autoload.php";

if (isset($_POST['formPost'])== true && $_POST['formPost']=='salvar') {
    $projeto = new \App\Model\Projeto();
    $projeto->setDescricaoProjeto($_POST['descProj']);    
    $projeto->setCodigoDepartamento($_POST['selectDep']);    

    $ProjetoDao = new \App\DAO\ProjetoDao();
    $ProjetoDao->CadastrarProjeto($projeto);
    header("Location: ../View/relatorioProjeto.php");
}

if (isset($_POST['formPost'])== true && $_POST['formPost']=='listar') {
    $ProjetoDao = new \App\DAO\ProjetoDao();
    $listagemProjetos = $ProjetoDao->ObterProjetos();
    return $listagemProjetos;
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
    $projetoEditar = $ProjetoDao->ObterProjetosPorCodigo($projeto);
    return $projetoEditar;
}

if (isset($_POST['formPost'])== true && $_POST['formPost']=='editar') {
    $projeto = new \App\Model\Projeto();
    $projeto->setDescricaoProjeto($_POST['descProj']);    
    $projeto->setCodigoDepartamento($_POST['selectDep']);    
    $projeto->setCodigoProjeto($_POST['codigo']);    

    $ProjetoDao = new \App\DAO\ProjetoDao();
    $ProjetoDao->AtualizarProjeto($projeto);
    header("Location: ../View/relatorioProjeto.php");
}