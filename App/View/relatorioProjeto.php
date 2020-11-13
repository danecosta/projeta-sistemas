<?php 
require_once "header.php";
$_POST['formPost'] = 'listar';
$listagem = require_once "../Controller/ProjetoController.php";
?>
<div class="container">
    <div class="div_center">
        <table class="table table-striped table-secondary">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listagem as $key => $value) {?>
                <tr>
                    <td><?= $value['codigo']?></td>
                    <td><?= $value['descricao']?></td>
                    <td><?= $value['cod_depto']?> - <?= $value['nome']?></td>
                    <td><a href="editarProjeto.php?formGet=alterar&codigo=<?= $value['codigo']?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="../Controller/ProjetoController.php?formGet=excluir&codigo=<?= $value['codigo']?>" class="btn btn-sm btn-danger">Excluir</a></td>
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