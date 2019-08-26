function iniciar() {
	var username = window.localStorage.getItem('cedula');

	if(username) {
		document.getElementById("username").value = username;
		document.getElementById("guardar").checked = true;
	}
}


function cambiar() {

	var username = document.getElementById("username").value;
	var check = document.getElementById("guardar").checked;

	if(check == true) {
		window.localStorage.setItem('cedula',username);
	} else {
		window.localStorage.removeItem('cedula');
	}
}