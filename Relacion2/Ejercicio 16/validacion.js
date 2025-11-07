function validarForm() {
    let num = parseFloat(document.getElementById('num').value);

    var comprobador = true;
    if(isNaN(num)){
        marcarError('num' , "er1")
        comprobador=false;
    }else if(num < 0){
        marcarError('num' , "er2")
        comprobador=false
    }

    return comprobador
}

function marcarError(parametro, er) {
    if (er === "er2") {
        document.getElementById(parametro + "rango").style.visibility = "visible";
    } else if (er === "er1") {
        document.getElementById(parametro + "help").style.visibility = "visible";
    }
}

function limpiarError(parametro) {
    document.getElementById(parametro + "help").style.visibility = "hidden"
}