<?php

namespace App\DAO;

use \App\Config\Conexao;
use \App\Model\Empregado;

Class EmpregadoDao
{

    public function CadastrarEmpregado(Empregado $empregado, $projeto, int $c_horaria){

        $sqlEmpregado = "INSERT INTO empregado (nome_emp, endereco, rg, cpf, cod_depto) VALUES (?,?,?,?,?)";
        $pdo = Conexao::getConexaoBD();
        $stmt = $pdo->prepare($sqlEmpregado);
        
        $stmt->bindValue(1, $empregado->getNome());
        $stmt->bindValue(2, $empregado->getEndereco());
        $stmt->bindValue(3, $empregado->getRg());
        $stmt->bindValue(4, $empregado->getCpf());
        $stmt->bindValue(5, $empregado->getCodDepto());
        $stmt->execute();
        $last_id = $pdo->lastInsertId();

        foreach ($projeto as $key => $value) {
            $sqlCargaHoraria = "INSERT INTO carga_horaria (cod_proj, mat, c_horaria) VALUES (?,?,?)";
            $stmt = Conexao::getConexaoBD()->prepare($sqlCargaHoraria);
            $stmt->bindValue(1, $value);
            $stmt->bindValue(2, $last_id);
            $stmt->bindValue(3, $c_horaria);
            $stmt->execute();
        }

        
    }

    public function ObterEmpregados(){
        
        $sqlListarEmpregado = "SELECT * FROM empregado e
                               JOIN depto d 
                                 ON d.cod_depto = e.cod_depto";

        $smtp = Conexao::getConexaoBD()->prepare($sqlListarEmpregado);
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $listaEmpregados = $smtp->fetchAll(\PDO::FETCH_ASSOC);
            return $listaEmpregados;
        }else{
            return[];
        }

    }

    public function ObterEmpregadosFiltro($filtro){
        
        $sqlListarEmpregado = "SELECT * FROM empregado e
                               JOIN depto d 
                                 ON d.cod_depto = e.cod_depto
                              WHERE e.nome_emp like '%{$filtro}%'";

        $smtp = Conexao::getConexaoBD()->prepare($sqlListarEmpregado);
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $listaEmpregados = $smtp->fetchAll(\PDO::FETCH_ASSOC);
            return $listaEmpregados;
        }else{
            return[];
        }

    }
    public function ObterEmpregadosPorProjeto($filtro){
        
        $sqlListarEmpregado = "SELECT * FROM empregado e
                               JOIN carga_horaria d 
                                 ON d.mat = e.mat
                              WHERE d.cod_proj = ?";

        $smtp = Conexao::getConexaoBD()->prepare($sqlListarEmpregado);
        $smtp->bindValue(1, $filtro);
        $smtp->execute();
        $numRows = $smtp->rowCount();
        if ($numRows > 0) {
            $listaEmpregados = $smtp->fetchAll(\PDO::FETCH_ASSOC);
            return $listaEmpregados;
        }else{
            return[];
        }

    }

    public function ObterEmpregadosPorCodigo(Empregado $empregado){
        
        $sqlListarEmpregado = "SELECT * FROM empregado e
                               JOIN depto d 
                                 ON d.cod_depto = e.cod_depto
                              WHERE e.mat = ?";

        $smtp = Conexao::getConexaoBD()->prepare($sqlListarEmpregado);
        $smtp->bindValue(1, $empregado->getMatricula());
        $smtp->execute();
        $listaEmpregados = $smtp->fetchAll(\PDO::FETCH_ASSOC);
        return $listaEmpregados;
    }

    public function AtualizarEmpregado(Empregado $empregado){

        $sqlEditarEmpregado = "UPDATE empregado 
                                  SET nome_emp = ?, 
                                      cod_depto = ?,
                                      cpf = ?, 
                                      rg = ?,
                                      endereco = ?,
                                WHERE mat = ?";
        $smtp = Conexao::getConexaoBD()->prepare($sqlEditarEmpregado);
        $smtp->bindValue(1, $empregado->getNome());
        $smtp->bindValue(2, $empregado->getCodDepto());
        $smtp->bindValue(3, $empregado->getCpf());
        $smtp->bindValue(3, $empregado->getRg());
        $smtp->bindValue(3, $empregado->getEndereco());
        $smtp->bindValue(3, $empregado->getMatricula());
        $smtp->execute();

        
    }

    public function ExcluirEmpregado(Empregado $empregado){
        
        $sqlExcluiEmpregado = "DELETE FROM empregado WHERE mat = ?";
        
        $smtp = Conexao::getConexaoBD()->prepare($sqlExcluiEmpregado);

        $smtp->bindValue(1, $empregado->getMatricula());

        $smtp->execute();

    }

}