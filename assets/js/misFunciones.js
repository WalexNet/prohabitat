/**
 * 
 * FUNCIONES DE USO GERAL PARA CONFIRMAR ACCIONES Y VALIDAR PSW
 */


function confirmar(msg)
{
    if(confirm(msg))
        return true;
    else
        return false;
}

function ValidarPsw() {
    var password = document.getElementById("txtPassword").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;
    if (password != confirmPassword) {
        document.getElementById("txtPassword").value='';
        document.getElementById("txtConfirmPassword").value='';
        alert("Las contraseñas no coinciden");
        return false;
    }
    return true;
}

