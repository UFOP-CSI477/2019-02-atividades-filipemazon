$(document).ready( function(){

});

var corpo_tabela = document.querySelector("#corpo_tabela");
var corpo_tabela2 = document.querySelector("#corpo_tabela2");
var lista_largada = new Array();
var lista_competidor = new Array();
var lista_tempo = new Array();
var posicao = 1;

$("#insere").click(function(){
    var line = document.createElement("tr");

    var field_largada = document.createElement("td");
    var field_competidor = document.createElement("td");
    var field_tempo = document.createElement("td");


    var text_largada = document.createTextNode(document.adiciona.largada.value);
    var text_competidor = document.createTextNode(document.adiciona.competidor.value);
    var text_tempo = document.createTextNode(document.adiciona.tempo.value);
    lista_largada.push(document.adiciona.largada.value);
    lista_competidor.push(document.adiciona.competidor.value);
    lista_tempo.push(document.adiciona.tempo.value);



    field_largada.appendChild(text_largada);
    field_competidor.appendChild(text_competidor);
    field_tempo.appendChild(text_tempo);


    line.appendChild(field_largada);
    line.appendChild(field_competidor);
    line.appendChild(field_tempo);


    corpo_tabela.appendChild(line);

    $("#largada").val("");
    $("#competidor").val("");
    $("#tempo").val("");
});



$("button[name = 'vencedor']").click(function() {
  lista_competidor.sort();
  lista_tempo.sort();

  for(var i = 0; i < lista_largada.length; i++){

      var line = document.createElement("tr");

      var field_posicao = document.createElement("td");
      var field_largada = document.createElement("td");
      var field_competidor = document.createElement("td");
      var field_tempo = document.createElement("td");
      var field_resultado = document.createElement("td");

      var text_posicao = document.createTextNode(i+1);
      var text_largada = document.createTextNode(lista_largada[i]);
      var text_competidor = document.createTextNode(lista_competidor[i]);
      var text_tempo = document.createTextNode(lista_tempo[i]);

      if(posicao == 1) {
        var text_resultado = document.createTextNode(" Vencedor ");
      }else {
        var text_resultado = document.createTextNode(" - ");
      }
      if(lista_tempo[i]=!lista_tempo[i-1] && i > 1 ){
         posicao++;
      }
      field_posicao.appendChild(text_posicao);
      field_largada.appendChild(text_largada);
      field_competidor.appendChild(text_competidor);
      field_tempo.appendChild(text_tempo);
      field_resultado.appendChild(text_resultado);


      line.appendChild(field_posicao);
      line.appendChild(field_largada);
      line.appendChild(field_competidor);
      line.appendChild(field_tempo);
      line.appendChild(field_resultado);

      corpo_tabela2.appendChild(line);

  }
});

$("#limpar").click(function(){
  $("#largada").val("");
  $("#competidor").val("");
  $("#tempo").val("");
});
