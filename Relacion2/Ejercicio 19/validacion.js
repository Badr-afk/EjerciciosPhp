function validarForm() {
    let numero = parseFloat(document.getElementById('numero').value);
    var comprobador = true;
    if (isNaN(numero)) {
        marcarError('numero', "er1")
        comprobador = false;
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