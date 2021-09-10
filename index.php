<<?php

require("./funcoes.php");

$funcionarios = lerArquivo ("empresaX.json");

if(isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Empresa X</title>
</head>
<body>
<section>

<h1>Funcionários da empresa X</h1>
<p style="text-align: center">
      A empresa conta com <em> <?= count($funcionarios) ?> </em> funcionários.
    </p>

<form>
    <input type="text" name="buscarFuncionario" placeholder="Buscar Funcionario" value="<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>">
    <button>BUSCAR</button>  </form>


<table>
  <form>
<button id="btnAddFuncionario"> Acrescentar  Funcionário!</button>
<div class="modal-form">
         <form id="form-funcionario" action="acoes.php" method="POST">
        <h1>Adicionar funcionário</h1>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>E-mail</th>
        <th>Sexo</th>
        <th>Endereço IP</th>
        <th>País</th>
        <th>Departamento</th>
    </tr>

    <?php
    foreach ($funcionarios as $funcionario) :
    ?>
        <tr>
            <td><?= $funcionario->id ?></td>
            <td><?= $funcionario->first_name ?></td>
            <td><?= $funcionario->last_name ?></td>
            <td><?= $funcionario->email ?></td>
            <td><?= $funcionario->gender ?></td>
            <td><?= $funcionario->ip_address ?></td>
            <td><?= $funcionario->country ?></td>
            <td><?= $funcionario->department ?></td>

        </tr>
    <?php
    endforeach;
    ?>
</table>

<div class="conteiner-form-adicao-funcionario">
    <form method="POST">
        <h3>Adicionar Funcionario</h3>
        <div class="conteiner-id">
            <label for="id" class="titulo-form">ID</label>
            <input id="id" type="number" name="idFuncionario" required>
        </div>
        <div class="conteiner-name">
            <label class="titulo-form">Name:</label>
            <input type="text" name="primeiroNomeFuncionario" placeholder="PRIMEIRO NOME" required>
            <input type="text" name="ultimoNomeFuncionario" placeholder="SOBRENOME " required>
        </div>
        <div class="conteiner-email">
            <label class="titulo-form">Email</label>
            <input name="emailFuncionario" type="text" required>
        </div>
        <div class="conteiner-gender">
            <label class="titulo-form">GENERO</label><br>
            <input type="radio" name="gender" id="female" value="Female" required>
            <label for="female">FEMININO</label><br>
            <input type="radio" name="gender" id="male" value="Female" required>
            <label for="male">MASCULINO</label><br>
            <input type="radio" name="gender" id="other" value="Other"required>
            <label for="other">OUTROS</label><br>
        </div>
        <div class="conteiner-ip-adress">
            <label class="titulo-form">IP Adress</label>
            <input type="text" name="ipAddressFuncionario" maxlength="8" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required></input>
        </div>
        <div class="conteiner-country">
            <label class="titulo-form">Country</label>
            <input type="text" name="countryFuncionario" required>

        </div>
        <div class="conteiner-department">
            <label class="titulo-form">department</label>
            <select name="departments">
                <option selected disabled value=" ">Selecione</option>
                <option value="Marketing">Marketing</option>
                <option value="Engineering">Engineering</option>
                <option value="Human Resources">Human Resources</option>
                <option value="Research and Development">Research and Development</option>
                <option value="Support">Support</option>
                <option value="Accounting">Accounting</option>
                <option value="Training">Training</option>
                <option value="Legal">Legal</option>

            </select>
        </div>
  </table>

        <button>Adicionar Funcionário!</button>
    </form>
</div>
</section>

</body>

</html>