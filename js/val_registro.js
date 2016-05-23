function valEmail(valor){
	re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*[.]([a-z]{2,3})$/
	if(!re.exec(valor)) {
		return false;
	}else{
		return true;
	}
}

function validar(){
	enviar=false;
	if(f1.pass.value==f1.repass.value){
		if(f1.mail.value!=""){
			if(valEmail(f1.mail.value)){
				enviar=true;
			} else {
				alert("El email " + f1.mail.value + " es incorrecto.");
				enviar=false;
			}
		} else {
			alert("El email está en blanco");
			enviar=false;
		}
	} else {
		alert("Las contraseñas no coinciden");
		enviar=false;
		// alert(f1.mail.value);
	}

	return enviar;
}