function showModal() {
    document.querySelector(".conteiner-form-adicao-funcionario").style.display = "flex";
}
function deleter(idFuncionario){
    // pede confirmçao do usuario 
    let confirmacao=confirm("Deseja deletar o funcionarios");
    //se confirmar que quer apagar, rediciona para arquivo de ações 
    //com id como parametro
    if(confirmacao){
        window.location = "acaosDeleter.php?id=" + idFuncionario
    }
}

document.getElementById("btnAddFuncionario")
.addEventListener("click", showModal);
