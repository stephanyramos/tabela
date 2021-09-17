<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $arquivoArr = json_decode($arquivo);

    return $arquivoArr;

}

function buscarFuncionario($funcionarios, $filtro){

    $funcionariosFiltro = [];

    foreach($funcionarios as $funcionario){
        if(
            strpos($funcionario->first_name, $filtro) !== false
            || 
            strpos($funcionario->last_name, $filtro) !== false
            ||
            strpos($funcionario->department, $filtro) !== false
        ){
            $funcionariosFiltro[] = $funcionario;
        }
    }

    return $funcionariosFiltro;

}

function adicionarFuncionario($nomeArquivo, $novoFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);

}
function deletarFuncionrio($nomeArquivo , $idFuncionario){
    $funcionarios = lerArquivo($nomeArquivo);
    foreach ($funcionarios as $chave => $funcionario){
        if ($funcionario-> id == $idFuncionario){
            unset($funcionarios[$chave]);
        }

    }
    $json = json_encode(array_values($funcionarios));
    file_put_contents($nomeArquivo, $json);
}
// busca fincinario por ID:
function buscarFuncionarioPorId($nomeArquivo, $idFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $funcionario) {

        if ($funcionario->id == $idFuncionario){
        return $funcionario;
        }

    }

}
function editarFuncionario($nomeArquivo, $funcionarioEditado)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $funcionarioEditado["id"]) {
            $funcionarios[$chave] = $funcionarioEditado;

        }
    }
    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
}

    



