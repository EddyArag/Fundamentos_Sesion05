document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('reservaForm');
    const reservarBtn = document.getElementById('reservarBtn');

    // Validación avanzada del DNI
    const dniInput = document.getElementById('dni');
    const dniError = document.getElementById('dniError');
    
    dniInput.addEventListener('input', function () {
        if (dniInput.value.length < 8 || isNaN(dniInput.value)) {
            dniError.textContent = "El DNI debe ser un número de 8 dígitos.";
        } else {
            dniError.textContent = "";
        }
    });

    // Validar la fecha para que no sea en el pasado
    const fechaInput = document.getElementById('fecha_reserva');
    const fechaError = document.getElementById('fechaError');
    
    fechaInput.addEventListener('change', function () {
        const fechaSeleccionada = new Date(fechaInput.value);
        const hoy = new Date();

        if (fechaSeleccionada < hoy) {
            fechaError.textContent = "La fecha no puede ser en el pasado.";
        } else {
            fechaError.textContent = "";
        }
    });

    // Animación al hacer clic en el botón de reserva
    reservarBtn.addEventListener('click', function () {
        reservarBtn.classList.add('animate__pulse');
        setTimeout(() => {
            reservarBtn.classList.remove('animate__pulse');
        }, 500);
    });

    // Función para mostrar mensaje de confirmación
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        alert("Reserva procesada exitosamente.");
        form.reset();
    });
});
