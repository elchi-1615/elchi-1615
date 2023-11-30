document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-signup");

    form.addEventListener("submit", async function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        // Realizar una solicitud AJAX para procesar el formulario
        try {
            const response = await fetch('registro.php', {
                method: 'POST',
                body: new FormData(form),
            });

            if (response.ok) {
                const data = await response.json();
                if (data.success) {
                    // Registro exitoso, mostrar un mensaje de alerta
                    alert(data.message);
                    // Puedes redirigir al usuario a otra página si es necesario
                } else {
                    alert(data.message);
                }
            } else {
                alert('Error en la solicitud al servidor.');
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
        }
    });
});
