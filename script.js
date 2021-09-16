function showModal() {
    document.querySelector(".conteiner-form-adicao-funcionario").style.display = "flex";
}

function deletar(idFuncionario){
    //pede confirmação ao usuário
    let confirmacao = confirm("Deseja deletar o funcionário?");

    //se confirmar que quer apagar, redireciona para arquivo de ação
    //com o id como parâmetro
    if(true){
        // window.location = "acaoDeletar.php";
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}
//função editar
function editar (idFuncionario){
    // teste de recebimento

    // alert (idFuncionario);
    window.location = "editar.php?id="+idFuncionario;
}

document.getElementById("btnAddFuncionario")
.addEventListener("click", showModal);
