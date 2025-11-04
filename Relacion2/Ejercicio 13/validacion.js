function validarForm() {
    let notaIn = parseFloat(document.getElementById('notaIn').value);

    let notaPrim = parseFloat(document.getElementById('notaPrim').value);

    let notaSeg = parseFloat(document.getElementById('notaSeg').value);

    let notaTer = parseFloat(document.getElementById('notaTer').value);

    var comprobador = true;

    if (isNaN(notaIn)) {
        marcarError('notaIn', "er1")
        comprobador = false
    } else if (notaIn < -1 || notaIn > 10) {
        marcarError('notaIn', "er2")
        comprobador = false
    }
    
    if (isNaN(notaPrim)) {
        marcarError('notaPrim', "er1")
        comprobador = false
    } else if (notaPrim < -1 || notaPrim > 10) {
        marcarError('notaPrim', "er2")
        comprobador = false
    }

    if (isNaN(notaSeg)) {
        marcarError('notaSeg', "er1")
        comprobador = false
    } else if (notaSeg < -1 || notaSeg > 10) {
        marcarError('notaSeg', "er2")
        comprobador = false
    }

    if (isNaN(notaTer)) {
        marcarError('notaTer' ,"er1")
        comprobador = false
    } else if (notaTer < -1 || notaTer > 10) {
        marcarError('notaTer', "er2")
        comprobador = false
    }

    return comprobador
}

function marcarError(parametro, er) {
    if(er === "er2"){
    document.getElementById(parametro + "rango").style.visibility = "visible";
    }else if(er=== "er1"){ 
    document.getElementById(parametro + "help").style.visibility = "visible";
    }
}

function limpiarError(parametro) {
    document.getElementById(parametro + "help").style.visibility = "hidden"
}