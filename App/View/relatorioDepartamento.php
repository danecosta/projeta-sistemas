<?php 
require_once "header.php";
$_POST['formPost'] = 'listar';
$listagem = require_once "../Controller/DepartamentoController.php";
?>
<div class="container">
    <div class="div_center">
    <legend>Relatório de Departamentos</legend>

        <table class="table table-striped table-secondary">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listagem as $key => $value) {?>
                <tr>
                    <td><?= $value['cod_depto']?></td>
                    <td><?= $value['nome']?></td>
                    <td><?= $value['endereco']?></td>
                    <td><a href="editarDepartamento.php?formGet=alterar&codigo=<?= $value['cod_depto']?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="../Controller/DepartamentoController.php?formGet=excluir&codigo=<?= $value['cod_depto']?>" class="btn btn-sm btn-danger">Excluir</a></td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
    <a type="button" class="btn btn-secondary" href="inicio.php">Voltar</a>
</div>



<?php 
require_once "../View/footer.php";
?>