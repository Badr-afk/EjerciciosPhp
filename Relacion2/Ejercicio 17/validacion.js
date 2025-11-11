function validarForm() {
    let dividendo = parseFloat(document.getElementById('dividendo').value);
    let divisor = parseFloat(document.getElementById('divisor').value);

    var comprobador = true;
    if (isNaN(dividendo)) {
        marcarError('dividendo', "er1")
        comprobador = false;
    } else if (dividendo===0) {
        marcarError('dividendo', "er2")
        comprobador = false
    }

    if (isNaN(divisor)) {
        marcarError('divisor', 'er1')
        comprobador = false
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