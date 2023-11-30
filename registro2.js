document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("myForm"); // Asegúrate de que el formulario tenga el atributo id="myForm"

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevenir el envío del formulario de forma predeterminada

        // Obtener los datos del formulario
        const id = document.querySelector("[name=id]").value;
        const email = document.querySelector("[name=email]").value;
        const telefono = document.querySelector("[name=telefono]").value;
        const fecha = document.querySelector("[name=fecha]").value;
        const sillas = document.querySelector("[name=sillas]").value;

        // Realizar una solicitud AJAX al servidor para procesar el registro
        fetch("registro.php", {
            method: "POST",
            body: new URLSearchParams({ id, email, telefono, fecha, sillas }),
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // Mostrar mensaje de registro exitoso
                    form.reset(); // Restablecer el formulario
                } else {
                    alert(data.message); // Mostrar mensaje de error
                }
            })
            .catch(error => {
                console.error("Error en la solicitud AJAX: " + error);
            });
    });
});
