<?php

namespace App\DAO;

use \App\Config\Conexao;
use \App\Model\Projeto;

class ProjetoDao{
        
        public function CadastrarProjeto(Projeto $projeto){

            $sqlProjeto = "INSERT INTO projeto (descricao, cod_depto) VALUES (?,?)";
            
            $stmt = Conexao::getConexaoBD()->prepare($sqlProjeto);
            
            $stmt->bindValue(1, $projeto->getDescricaoProjeto());
            $stmt->bindValue(2, $projeto->getCodigoDepartamento());
            
            $stmt->execute();            
        }

        public function ObterProjetos(){
            
            $sqlListarProjeto = "SELECT * FROM projeto p
                                   JOIN depto d 
                                     ON d.cod_depto = p.cod_depto";

            $smtp = Conexao::getConexaoBD()->prepare($sqlListarProjeto);
            $smtp->execute();
            $numRows = $smtp->rowCount();
            if ($numRows > 0) {
                $listaProjetos = $smtp->fetchAll(\PDO::FETCH_ASSOC);
                return $listaProjetos;
            }else{
                return[];
            }

        }

        public function ObterProjetosPorCodigo(Projeto $projeto){
            
            $sqlListarProjeto = "SELECT * FROM projeto p
                                   JOIN depto d 
                                     ON d.cod_depto = p.cod_depto
                                  WHERE p.codigo = ?";

            $smtp = Conexao::getConexaoBD()->prepare($sqlListarProjeto);
            $smtp->bindValue(1, $projeto->getCodigoProjeto());
            $smtp->execute();
            $listaProjetos = $smtp->fetchAll(\PDO::FETCH_ASSOC);
            return $listaProjetos;
        }

        public function AtualizarProjeto(Projeto $projeto){
            $sqlEditarProjeto = "UPDATE projeto SET descricao = ?, cod_depto = ? WHERE codigo = ?";
            $smtp = Conexao::getConexaoBD()->prepare($sqlEditarProjeto);
            $smtp->bindValue(1, $projeto->getDescricaoProjeto());
            $smtp->bindValue(2, $projeto->getCodigoDepartamento());
            $smtp->bindValue(3, $projeto->getCodigoProjeto());
            $smtp->execute();            
        }

        public function ExcluirProjeto(Projeto $projeto){
            
            $sqlExcluiProjeto = "DELETE FROM projeto WHERE codigo = ?";            
            $smtp = Conexao::getConexaoBD()->prepare($sqlExcluiProjeto);
            $smtp->bindValue(1, $projeto->getCodigoProjeto());
            $smtp->execute();
        }

    }