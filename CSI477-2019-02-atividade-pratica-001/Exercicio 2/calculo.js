function calcular(){


    const imagem1 = document.getElementById("figura1")
    const imagem2 = document.getElementById("figura2")
    const imagem3 = document.getElementById("figura3")
    const imagem4 = document.getElementById("figura4")



    const resultado = document.getElementById("Tresultado")


    if(verifica(imagem1) && verifica(imagem2) && verifica(imagem3) && verifica(imagem4)){



        if((imagem1.value=="2") && (imagem2.value=="1") && (imagem3.value=="4") && (imagem4.value=="3")){
        Tresultado.value = "VOCÊ ACERTOU !" }
        else{
        Tresultado.value = "VOCÊ ERROU ! "

    }
}
}

function verifica(field) {

    let n = field.value;

    if (n.length == 0 || isNaN(parseFloat(n))) {
        window.alert("Informe o valor corretamente!");

        field.value = "";
        field.focus();
        return false;

    }
    // Correto
    return true;
}