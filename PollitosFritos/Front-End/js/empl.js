document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch("http://localhost:3000/empleados"); // Me dicen cuando lo tengan pls
        const empleados = await response.json();

        const contenedor = document.body; // Cambia esto por el contenedor real donde pondrás las tarjetas

        empleados.forEach(empleado => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.innerHTML = `
                <div class="profile-pic"><img src="${empleado.foto}" alt="Foto" /></div>
                <div class="bottom">
                    <div class="content">
                        <span class="name">${empleado.nombre}</span>
                        <span class="about-me">${empleado.puesto}</span>
                    </div>
                    <div class="bottom-bottom">
                        <button class="button">Contactar</button>
                    </div>
                </div>
            `;
            contenedor.appendChild(card);
        });
    } catch (error) {
        console.error("Error obteniendo los datos:", error);
    }
});
