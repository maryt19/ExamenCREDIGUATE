var nombre = document.getElementById('txtNombres');
var email = document.getElementById('txtCorreo');
var error = document.getElementById('error');
error.style.color ='red';

function enviarformulario(){
	
	var mensajesError = [];

	if(nombre.value==null nombre.value==''){
		mensajesError.push('Ingrese su nombre');
	}

	if(email.value==null email.value==''){
		mensajesError.push('Ingrese su correo');
	}

	error.innerHTML = mensajesError.join(', ');


}