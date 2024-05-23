function comprobarActualizarEmp() {
	// Mensaje de confirmación
	var mensaje = "¿Está seguro que desea actualizar al empleado?";
	var eleccion = confirm(mensaje);

	// Verificar la elección del usuario
	if (eleccion) {
		return true;
	} else {
		return false;
	}
}

//Comprobación para inactivar empleado
function comprobarInactivar() {
        // Mensaje de confirmación
        var mensaje = "¿Está seguro que desea inactivar al empleado?";
        var eleccion = confirm(mensaje);

        // Verificar la elección del usuario
        if (eleccion) {
			var link = document.getElementById("inactivarBtn").getAttribute("href");
			window.location.href = link;
            return true;
        } else {
            return false;
        }
}

//Comprobación para activar empleado
function comprobarActivar() {
	// Mensaje de confirmación
	var mensaje = "¿Está seguro que desea activar al empleado?";
	var eleccion = confirm(mensaje);

	// Verificar la elección del usuario
	if (eleccion) {
		var link = document.getElementById("activarBtn").getAttribute("href");
		window.location.href = link;
		return true;
	} else {
		return false;
	}
}



//nomina
function comprobarActualizarNom() {
	// Mensaje de confirmación
	var mensaje = "¿Está seguro que desea actualizar este registro?";
	var eleccion = confirm(mensaje);

	// Verificar la elección del usuario
	if (eleccion) {
		return true;
	} else {
		return false;
	}
}
function comprobarEliminar() {
	// Mensaje de confirmación
	var mensaje = "¿Está seguro que desea eliminar el registro?";
	var eleccion = confirm(mensaje);

	// Verificar la elección del usuario
	if (eleccion) {
		var link = document.getElementById("eliminarBtn").getAttribute("href");
		window.location.href = link;
		return true;
	} else {
		return false;
	}
}

function comprobarCodigo() {
	var cod = document.getElementById("cod").value;
	var mensajeError = document.getElementById("mensajeError");

	if (cod !== "15D49") {
		mensajeError.innerHTML =  "El codigo de acceso es incorrecto.";
		return false;
	} else {
		mensajeError.innerHTML = "";
		return true;
	}
}