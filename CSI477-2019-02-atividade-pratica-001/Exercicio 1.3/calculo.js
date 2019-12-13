function calcular(){

    const Vamplitude = document.getElementById("Txamplitude")

    const Vdelta = document.getElementById("Txdelta")

    const Vresultado = document.getElementById("Txresultado")


    if(verifica(Vamplitude) && verifica(Vdelta)){

        const escalaRichter = (Math.log(Vamplitude.value)/Math.log(10)) +  3*(Math.log(8*Vdelta.value)/Math.log(10)) - 2.82
        Vresultado.value = escalaRichter
        calculaEfeito(escalaRichter)
    }
}

function calculaEfeito(escalaRichter){
    const resultadofinal = document.getElementById("efeitoMagnitude")
    if(escalaRichter < 3.5){
        resultadofinal.innerHTML = "Geralmente nao sentido, mas gravado."
    }else if(escalaRichter>3.5 && escalaRichter<5.4){
        resultadofinal.innerHTML = "As vezes sentido, mas raramente causa danos."
    }else if(escalaRichter>5.5 && escalaRichter<6.0){
        resultadofinal.innerHTML = "No maximo causa pequenos danos a prédios bem constuidos, mas pode danificar seriamente casas mal construidas em regioes proximas."
    }else if(escalaRichter>7.0 && escalaRichter<7.9){
        resultadofinal.innerHTML = "Grande terremoto. Pode causar serios danos numa grande faixa."
    }else{
        resultadofinal.innerHTML = "Enorme terremoto. Pode causar graves danos em muitas areas mesmo que estejam a centenas de quilometros"
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