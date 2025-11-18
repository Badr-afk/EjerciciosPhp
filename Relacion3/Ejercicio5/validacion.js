function validarForm() {
    // 1. Recogida de valores
    let notaIn = parseFloat(document.getElementById('notaIn').value);
    let notaPrim = parseFloat(document.getElementById('notaPrim').value);
    let notaSeg = parseFloat(document.getElementById('notaSeg').value);
    let notaTer = parseFloat(document.getElementById('notaTer').value);
    let correo = document.getElementById('correo').value;
    let docIdent = document.getElementById('documento').value;
    let tipoDoc = document.getElementById('tipoDocumento').value;

    var comprobador = true;

    if (isNaN(notaIn)) {
        marcarError('notaIn', "er1");
        comprobador = false;
    } else if (notaIn < 0 || notaIn > 10) {
        marcarError('notaIn', "er2");
        comprobador = false;
    }

    if (isNaN(notaPrim)) {
        marcarError('notaPrim', "er1");
        comprobador = false;
    } else if (notaPrim < 0 || notaPrim > 10) {
        marcarError('notaPrim', "er2");
        comprobador = false;
    }

    if (isNaN(notaSeg)) {
        marcarError('notaSeg', "er1");
        comprobador = false;
    } else if (notaSeg < 0 || notaSeg > 10) {
        marcarError('notaSeg', "er2");
        comprobador = false;
    }

    if (isNaN(notaTer)) {
        marcarError('notaTer', "er1");
        comprobador = false;
    } else if (notaTer < 0 || notaTer > 10) {
        marcarError('notaTer', "er2");
        comprobador = false;
    }

    // 3. NUEVO: Validación de Correo
    if (!validarEmail(correo)) {
        marcarError('correo', "er1"); // Reutilizo er1 para mostrar el mensaje de ayuda
        comprobador = false;
    }

    // 4. NUEVO: Validación de Documento
    if (!validarDocumento(docIdent, tipoDoc)) {
        marcarError('documento', "er1");
        comprobador = false;
    }

    return comprobador;
}

// --- Funciones Auxiliares de Validación ---

function validarEmail(email) {
    // Regex estándar para email
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validarDocumento(valor, tipo) {
    valor = valor.toUpperCase(); // Convertimos a mayúsculas para evitar errores
    const letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    if (tipo === "dni") {
        // Formato DNI: 8 números + Letra
        const regexDNI = /^\d{8}[A-Z]$/;
        
        if (!regexDNI.test(valor)) return false; // Falla el formato básico

        const numero = parseInt(valor.substring(0, 8));
        const letra = valor.substring(8, 9);
        
        // Comprobación matemática (Módulo 23)
        return letras[numero % 23] === letra;

    } else if (tipo === "nie") {
        // Formato NIE: X/Y/Z + 7 números + Letra
        const regexNIE = /^[XYZ]\d{7}[A-Z]$/;

        if (!regexNIE.test(valor)) return false;

        // Para calcular la letra, sustituimos X, Y, Z por 0, 1, 2
        let primerCaracter = valor.charAt(0);
        let numeroStr = valor.substring(1, 8);
        
        if (primerCaracter === 'X') numeroStr = '0' + numeroStr;
        if (primerCaracter === 'Y') numeroStr = '1' + numeroStr;
        if (primerCaracter === 'Z') numeroStr = '2' + numeroStr;

        const numero = parseInt(numeroStr);
        const letra = valor.substring(8, 9);

        return letras[numero % 23] === letra;

    } else if (tipo === "tie") {
        // Formato TIE (Número de Soporte): E + 8 dígitos
        // Según el enunciado: "empieza por la letra E, seguido de 8 dígitos"
        const regexTIE = /^E\d{8}$/;
        return regexTIE.test(valor);
    }

    return false; // Si no coincide ningún tipo
}

// --- Funciones de UI (Visualización de errores) ---

function marcarError(parametro, er) {
    if (er === "er2") {
        let elemento = document.getElementById(parametro + "rango");
        if(elemento) elemento.style.visibility = "visible";
    } else if (er === "er1") {
        let elemento = document.getElementById(parametro + "help");
        if(elemento) elemento.style.visibility = "visible";
    }
}

function limpiarError(parametro) {
    let help = document.getElementById(parametro + "help");
    let rango = document.getElementById(parametro + "rango");
    
    if(help) help.style.visibility = "hidden";
    if(rango) rango.style.visibility = "hidden";
}