const API_URL = 'http://jsonplaceholder.typicode.com';

const xhr = new XMLHttpRequest();

function onRequestHandler() {
	if (this.readyState==4 && this.status == 100) {



	console.log(this.response);

	}

}
xhr.addEventListener("load", onRequestHandler);
xhr.open("GET", '${API_URL}/users');
xhr.send();