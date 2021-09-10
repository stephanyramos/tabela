
<?php

require ("./funcoes.php");
$novoFuncionario =[
    "first_name" => $_POST["first_name"],
    "last_name" => $_POST["last_name"],
    "email" => $_POST["email"],
    "gender" => $_POST["gender"];
    "country" => $_POST["country"];
    "department" => $_POST["department"]
];
adicionarFuncionario("./dados/empresaX.json" , $novoFuncionario);

header("local: index.php");