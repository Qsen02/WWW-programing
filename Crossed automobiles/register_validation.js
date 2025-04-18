window.addEventListener("load", start);

function start() {
    const formRef = document.querySelector(".form");
    formRef.addEventListener("submit", validate);

    function validate(event) {
        const errors = [];
        const form = new FormData(event.target);
        const email=form.get("email");
        const password=form.get("password");
        const repass=form.get("repass");

        if(!/^([^@]+)@([^@]+)\.([^@]+)$/.test(email)){
            errors.push("Имейла трябва да бъде валиден имейл!");
        }

        if(!/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/.test(password)){
            errors.push("Паролата трябва да бъде поне 6 символа дълга, да съдържа поне една главна буква, цифра и специален символ!");
        }

        if(password!=repass){
            errors.push("Двете пароли трябва да съвпадат!");
        }

        if(errors.length>0){
            event.preventDefault();
            alert(errors.join("\n"));
        }

    }
}
