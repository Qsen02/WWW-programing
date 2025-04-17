window.addEventListener("load", start);

function start() {
    const formRef = document.querySelector(".form");
    formRef.addEventListener("submit", validate);

    function validate(event) {
        const errors = [];
        const form = new FormData(event.target);
        const number = form.get("number");
        const type = form.get("type");
        const trailer = Number(form.get("trailer"));
        const passengers = Number(form.get("passengers"));

        if (number.length > 8) {
            errors.push("Номера трябва да бъде максимум 8 символа!");
        }

        if (!(type == "лек" || type == "товарен" || type == "автобус")) {
            errors.push("Изберете една от трите опции за тип на автомобила!");
        }

        if (trailer < 0 || trailer > 1) {
            errors.push(
                "Изберете една от двете опции дали има или няма ремарке!"
            );
        }

        if(passengers<0){
            errors.push("Броя на пътниците трябва да бъде положително число!");
        }

        if(errors.length>0){
            event.preventDefault();
            alert(errors.join("\n"));
        }

    }
}
