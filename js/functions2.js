

var boton = $('.EnviarEliminar');
console.log(boton);

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
    location.href = "ModificarPersona2.php?BuscaDNI=" + DNI + "&BtBuscaDNI=Busca+DNI";
}
function pasarvariable2() {
    location.href = "ModificarPersona2.php?BuscaDNI=&BtMuestraSocios=SOCIOS";
}

var prueba = document.getElementById("Socio");
console.log("prueba NO ENCONTRADO");
console.log(prueba);
if (prueba === null) {
    document.getElementById("Encontrado").className += " NoEncontrado";
}

//  -------------->>>>>>>    MEDIA QUERY

console.log(document.getElementById("BoxBuscaContent").className);
    function myFunction(x) {
    if (x.matches) { // If media query matches
        document.getElementById("BoxBuscaContent").className += " text-center";
        // document.getElementById("BoxBuscaContent").toggleClass("text-center");
        // console.log("jQuery", $('#BoxBuscaContent'));
        console.log(document.getElementById("BoxBuscaContent").className);
    } else {
        // document.getElementById("BoxBuscaContent").className -= " text-center";
        // document.getElementById("BoxBuscaContent").toggleClass("text-center");
        console.log("jQuery", $('#BoxBuscaContent'));
        $('#BoxBuscaContent').removeClass("text-center");

        console.log(document.getElementById("BoxBuscaContent").className);
    }
    }

    var x = window.matchMedia("(max-width: 1200px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes


//  -------------->>>>>>>    MEDIA QUERY






