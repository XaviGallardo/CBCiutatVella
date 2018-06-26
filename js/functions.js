// function Eliminiar($equip, $jug) {
//     $objEquipoJugador = new EquipoJugador($equip, $jug);
//     $objEquipoJugador->Eliminar();
// }

var boton = $('.EnviarEliminar');
// var allowSubmit = false; 
// function cogerDNI() {
//      var DNI = $(this).parent()[0][0].value;
//     console.log(DNI);
//     $('#BuscaDNI').val(DNI);

// }

boton.click(function (e) {
    e.preventDefault();
    // var DNI = $(this).parent()[0][0].val();
    var DNI = $(this).parent().find('#inputDNI').val();
    console.log(DNI);
    // $('#BuscaDNI').val(DNI);
    // document.getElementById('BuscaDNI').value = DNI;
    document.getElementById("BuscaDNI").setAttribute('value', DNI);
    $('#BtBuscaDNI')[0][1];
    console.log($('#BtBuscaDNI')[0][0]);
    console.log($('#BtBuscaDNI')[0][1]);
    // $('#BtBuscaDNI').submit();
    // document.getElementById('BtBuscaDNI').submit();
    pasarvariable(DNI);
});



function pasarvariable(DNI) {
    location.href = "EliminarPersona.php?BuscaDNI=" + DNI + "&BtBuscaDNI=Busca+DNI";
}
function pasarvariable2() {
    location.href = "EliminarPersona.php?BuscaDNI=&BtMuestraSocios=SOCIOS";
}

// BuscaDNI =& BtMuestraSocios=SOCIOS

var boton2 = $('.BtSocios');
console.log(boton2);

boton2.click(function (e) {
    // document.getElementById("Encontrado").className += "NoEncontrado";
     e.preventDefault();
    document.getElementById("Encontrado").className += " NoEncontrado";
    console.log(document.getElementById("Encontrado"));
    pasarvariable2();
});
