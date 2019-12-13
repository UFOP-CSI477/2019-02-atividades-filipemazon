$(document).ready(function(){
  $("#IMC").hide();

  $("#calculo").click(function(){
    var peso = parseFloat(document.formImc.peso.value);
    var altura = parseFloat(document.formImc.altura.value);

    
    var imc = peso/(altura*altura);
    document.formImc.resultado.value = imc.toFixed(2);
    if ( imc < 18.5 ){
      $("#IMC").text("Subnutrição");
      $("#IMC").show();
    } else if (imc == 18.5 || imc <=24.9) {
      $("#IMC").text("Peso Saudável");
      $("#IMC").show();
    } else if (imc == 25 || imc <=29.9) {
      $("#IMC").text("Sobrepeso");
      $("#IMC").show();
    } else if (imc == 30 || imc <=34.9) {
      $("#IMC").text("Obesidade grau 1");
      $("#IMC").show();
    } else if (imc == 35|| imc <=39.9) {
      $("#IMC").text("Obesidade grau 2");
      $("#IMC").show();
    } else {
      $("#IMC").text("Obesidade grau 3");
      $("#IMC").show();
    }
  });

  $("#limpar").click(function(){
    console.log("teste2");
    $("#peso").val("");
    $("#altura").val("");
    $("#resultado").val("");
    $("#IMC").hide();
  });



});



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
