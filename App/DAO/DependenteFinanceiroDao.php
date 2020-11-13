<?php

namespace App\DAO;
use \App\Config\Conexao;
use \App\Model\DependenteFinanceiro;

    Class DependenteFinanceiroDao
    {

        public function CadastrarDependente(DependenteFinanceiro $dependenteF){

            $pdo =  Conexao::getConexaoBD();
            $cont = $pdo->prepare('SELECT * FROM empregado_dependente WHERE mat_emp = ?');
            $cont->bindValue(1, $dependenteF->getMatriculaEmp());
            $cont->execute();
            $count = $cont->rowCount();
            $count++;

            $sqlCadastroDep = "INSERT INTO empregado_dependente (mat_emp, dependente, nome_dep, data_nasc, tipo) VALUES (?,?,?,?,?)";
            $smtp = Conexao::getConexaoBD()->prepare($sqlCadastroDep);
            $smtp->bindValue(1, $dependenteF->getMatriculaEmp());
            $smtp->bindValue(2, $count);
            $smtp->bindValue(3, $dependenteF->getNome_dep());
            $smtp->bindValue(4, $dependenteF->getDt_nascimento());
            $smtp->bindValue(5, $dependenteF->getTipo());
            $smtp->execute();
        }

    }