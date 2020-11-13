<?php 
require_once "header.php";
$_GET['formGet'] = 'listarTodos';
$listagem = require_once "../Controller/EmpregadoController.php";
?>
<div class="container">
    <div class="div_center">
    <legend>Relatório de Empregados</legend>
        <table class="table table-striped table-secondary">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Rg</th>
                    <th>CPF</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listagem as $key => $value) {?>
                <tr>
                    <td><?= $value['mat']?></td>
                    <td><?= $value['nome_emp']?></td>
                    <td><?= $value['endereco']?></td>
                    <td><?= $value['rg']?></td>
                    <td><?= $value['cpf']?></td>
                    <td><?= $value['cod_depto']?> - <?= $value['nome']?></td>
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