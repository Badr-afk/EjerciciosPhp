function validarFormulario() {
    let esValido = true; 
    
    limpiarErrores();

    const nota1Input = document.getElementById("nota1");
    const nota1Valor = nota1Input.value.trim(); 

    if (nota1Valor === "") {
        mostrarError("nota1", "errorNota1", "La nota 1 es obligatoria.");
        esValido = false;
    } else if (isNaN(nota1Valor)) {
        mostrarError("nota1", "errorNota1", "La nota 1 debe ser un número.");
        esValido = false;
    } else {
        const notaNum = parseFloat(nota1Valor);
        if (notaNum < 1 || notaNum > 10) {
            mostrarError("nota1", "errorNota1", "La nota debe estar entre 1 y 10.");
            esValido = false;
        }
    }

    const nota2Input = document.getElementById("nota2");
    const nota2Valor = nota2Input.value.trim();

    if (nota2Valor === "") {
        mostrarError("nota2", "errorNota2", "La nota 2 es obligatoria.");
        esValido = false;
    } else if (isNaN(nota2Valor)) {
        mostrarError("nota2", "errorNota2", "La nota 2 debe ser un número.");
        esValido = false;
    } else {
        const notaNum = parseFloat(nota2Valor);
        if (notaNum < 1 || notaNum > 10) {
            mostrarError("nota2", "errorNota2", "La nota debe estar entre 1 y 10.");
            esValido = false;
        }
    }

    const fallosInput = document.getElementById("fallos");
    const fallosValor = fallosInput.value.trim();

    if (fallosValor === "") {
        mostrarError("fallos", "errorFallos", "El número de fallos es obligatorio.");
        esValido = false;
    } else if (isNaN(fallosValor)) {
        mostrarError("fallos", "errorFallos", "Los fallos deben ser un número.");
        esValido = false;
    } else {
        const fallosNum = parseFloat(fallosValor); 
        if (!Number.isInteger(fallosNum)) {
             mostrarError("fallos", "errorFallos", "Los fallos deben ser un número entero.");
            esValido = false;
        } else if (fallosNum < 0) {
            mostrarError("fallos", "errorFallos", "Los fallos no pueden ser negativos.");
            esValido = false;
        }
    }

    return esValido;
}


function mostrarError(idInput, idErrorDiv, mensaje) {
    const input = document.getElementById(idInput);
    const divError = document.getElementById(idErrorDiv);

    input.classList.add("is-invalid");
    divError.textContent = mensaje;
}


function limpiarErrores() {
    document.querySelectorAll(".form-control.is-invalid").forEach(input => {
        input.classList.remove("is-invalid");
    });

    document.querySelectorAll(".invalid-feedback").forEach(div => {
        div.textContent = "";
    });
}


document.addEventListener("DOMContentLoaded", function() {
    
    const formulario = document.getElementById("notaForm");

    formulario.addEventListener("submit", function(event) {
        
        if (validarFormulario() === false) {
            event.preventDefault();
        }
    });
});