<?php
$idfuncionario = $_GET["id"];
deletarFuncionrio("./empresaX.php",$idfuncionario);

header("location:index.php");