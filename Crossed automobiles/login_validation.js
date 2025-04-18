window.addEventListener("load", start);

function start() {
	const formRef = document.querySelector(".form");
	formRef.addEventListener("submit", validate);

	function validate(event) {
		let error = false;
		const form = new FormData(event.target);
		const email = form.get("email");
		const password = form.get("password");

        if(!/^([^@]+)@([^@]+)\.([^@]+)$/.test(email)){
            error=true;
        }

        if(!/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/.test(password)){
            error=true;
        }

		if (error) {
			event.preventDefault();
			alert("Имейла или паролата не съответстват!");
		}
	}
}
