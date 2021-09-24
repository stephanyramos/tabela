<?php
session_start();
require("./funcoes.php");

$funcionarios = lerArquivo("empresaX.json");

if (isset($_GET["buscarFuncionario"]) && $_GET["buscarFuncionario"] != "") {
  $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="style.css">
  <title>Empresa X</title>
  <script src="script.js" defer></script>
</head>


<body>
  <section>

    <h1>Funcionários da empresa X</h1>
    <p style="text-align: center">
      A empresa conta com <em> <?= count($funcionarios) ?> </em> funcionários.
    </p>
    <h2>
            <?php echo 'Olá ' . strtoupper($_SESSION['usuario']) . ' - Login efetutado em: ' .$_SESSION['data_hora']; ?>
    </h2>

    <h2>

<a class="material-icons" href="processa_login.php?logout=true">logout</a>

</h2>

    <form>
      <input type="text" name="buscarFuncionario" placeholder="Buscar Funcionario" value="<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>">
      <button>BUSCAR</button>
    </form>

    <div class="conteiner-form-adicao-funcionario">
      <form action="acoes.php" method="POST">
        <div class="conteiner-id">
          <label for="id" class="titulo-form">ID</label>
          <input id="id" type="number" name="id" required>
        </div>
        <div class="conteiner-name">
          <label class="titulo-form">Name:</label>
          <input type="text" name="first_name" placeholder="PRIMEIRO NOME" required>
          <input type="text" name="last_name" placeholder="SOBRENOME " required>
        </div>
        <div class="conteiner-email">
          <label class="email">Email</label>
          <input name="email" type="text" required>
        </div>
        <div class="gender">
          <label class="gender">GENERO</label><br>
          <input type="radio" name="gender" id="female" value="Female" required>
          <label for="female">FEMININO</label><br>
          <input type="radio" name="gender" id="male" value="Female" required>
          <label for="male">MASCULINO</label><br>
          <input type="radio" name="gender" id="other" value="Other" required>
          <label for="other">OUTROS</label><br>
        </div>
        <div class="country">
          <label class="titulo-form">IP Adress</label>
          <input type="text" name="ip_address" maxlength="8" required></input>
        </div>
        <div class="country">
          <label class="country">Country</label>
          <input type="text" name="country" required>

        </div>
        <div class="department">
          <label class="departaments">department</label>
          <select name="department">
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

    <button id="btnAddFuncionario"> Acrescentar Funcionário!</button>
    <table>
   
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
          <th>Mudanças</th>
          <!-- <th>Excluir </th> -->
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
            <!-- <td> <button class="excluir">&#128465;</button></td> -->
           <td>
             <button onclick="editar(<?=$funcionario->id?>)"class ="Editar">&#9999;</button>
        
            <button onclick="deletar(<?=$funcionario->id?>)"class ="material-icons">delete</button>
           </td>
          </tr>
        <?php
        endforeach;
        ?>
    </table>


  </section>

</body>

</html>