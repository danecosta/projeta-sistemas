<?php 
require_once "header.php";

if (!isset($_GET['retorno'])) {
$_POST['formPost'] = 'listar';
$listarProjetos = require_once "../Controller/ProjetoController.php";
?>

<div class="container">
<div class="div_center"></div>
    <form action="../Controller/EmpregadoController.php" method="GET">
        <div class="form-group">
            <label for="selectProj">Informe o projeto para consulta</label>
            <select class="form-control" id="selectProj" name="selectProj">
                <?php foreach ($listarProjetos as $key => $value) { ?>                        
                    <option value="<?= $value['codigo']?>"><?= $value['descricao']?></option>
                <?php } ?>
            </select>
        </div>
        <input type="hidden" name="formGet" value="buscaRelEmp_Proj_null">
        <a type="button" class="btn btn-secondary" href="inicio.php">Voltar</a>
        <input type="submit" class="btn btn-primary" value="Buscar">
    </form>
    </div>
</div>

<?php
}else{
    $_GET['formGet'] = 'buscaRelEmp_Proj';
    $_GET['selectProj'] =  $_GET['selectProj'];
    $listagem = require_once "../Controller/EmpregadoController.php";
?>
    <div class="container">
        <div class="div_center">
        <legend>Relatório de Empregados</legend>
            <table class="table table-striped table-secondary">
                <thead>
                    <tr>
                        <th>Cod Projeto</th>
                        <th>Cod Depto</th>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Rg</th>
                        <th>CPF</th>
                        <th>Carga Horária</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($listagem as $key => $value) {?>
                    <tr>
                        <td><?= $value['cod_proj']?></td>
                        <td><?= $value['cod_depto']?></td>
                        <td><?= $value['mat']?></td>
                        <td><?= $value['nome_emp']?></td>
                        <td><?= $value['endereco']?></td>
                        <td><?= $value['rg']?></td>
                        <td><?= $value['cpf']?></td>
                        <td><?= $value['c_horaria']?></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        <a type="button" class="btn btn-secondary" href="inicio.php">Voltar</a>
        </div>
    </div>  

<?php 
}
require_once "../View/footer.php";
?>