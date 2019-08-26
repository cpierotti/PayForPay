function iniciar() {
	var username = window.localStorage.getItem('username');
	var password = window.localStorage.getItem('password');

	if(username != null && password !=null) {
		document.getElementById("username").value = username;
		document.getElementById("password").value = password;
		document.getElementById("guardar").checked = true;
	}
}


function cambiar(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var check = document.getElementById("guardar").checked;

	if(check == true) {
		window.localStorage.setItem('username',username);
		window.localStorage.setItem('password',password);
	} else {
		window.localStorage.removeItem('username');
		window.localStorage.removeItem('password');
	}
}