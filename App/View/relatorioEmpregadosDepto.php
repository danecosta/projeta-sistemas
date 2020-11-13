<?php 
require_once "header.php";
$_POST['formPost'] = 'listarRel';
$listarDepartamentos = require_once "../Controller//DepartamentoController.php";
$listagem = require_once "../Controller/EmpregadoController.php";
?>
<div class="container">
<div class="div_center">
<legend>Relatório da Quantidade de Empregados por Departamento</legend>
    <table class="table table-striped table-secondary">
        <thead>
            <tr>
                <th>Quantidade de Empregados</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($listarDepartamentos as $key => $value) {?>
            <tr>
                <td><?= $value['qtde']?></td>
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