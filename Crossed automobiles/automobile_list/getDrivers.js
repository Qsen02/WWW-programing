window.addEventListener("load", start);

function start() {
	const getDriversBtn = document.getElementById("get-drivers");
	getDriversBtn.addEventListener("click", getDrivers);
	const containerRef = document.getElementById("drivers");

	async function getDrivers(event) {
		event.preventDefault();
		try {
			const res = await fetch("getDrivers.php");
			if (!res.ok) {
				const err = await res.json();
				throw new Error(err.message);
			}
			const data = await res.json();
            containerRef.innerHTML=`
            <section class="header">
                <div class="header-items">
                    <p>Номер на автомобил</p>
                </div>
                <div class="header-items">
                    <p>Малко име</p>
                </div>
                <div class="header-items">
                    <p>Фамилия</p>
                </div>
                <div class="header-items">
                    <p>Град</p>
                </div>
                <div class="header-items">
                    <p>Държава</p>
                </div>
            </section>
            <section class="body" id="table-body">
            </section>
          `
          const bodyTable=document.getElementById("table-body");
			for(let el of data){
                bodyTable.innerHTML+=`
                <article class='body-row'>
                    <div class="body-data">
                        <p>${el.number}</p>
                    </div>
                    <div class="body-data">
                        <p>${el.firstname}</p>
                    </div>
                       <div class="body-data">
                        <p>${el.lastname}</p>
                    </div>
                    <div class="body-data">
                        <p>${el.city}</p>
                    </div>
                    <div class="body-data">
                        <p>${el.country}</p>
                    </div>
                </article>
                `
            }
		} catch (err) {
			alert(err.message);
		}
	}
}
