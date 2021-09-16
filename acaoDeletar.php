<?php
require("./funcoes.php");
$idfuncionario = $_GET["id"];
deletarFuncionrio("./empresaX.json",$idfuncionario);

header("location:index.php");