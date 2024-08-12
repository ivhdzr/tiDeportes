document.addEventListener("DOMContentLoaded", function () {

    var deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {

            event.preventDefault();
            var nombreDeporte = button.getAttribute('data-nombre');
            Swal.fire({
                title: '¿Quieres eliminar el deporte?',
                text: 'Se eliminará el deporte "' + nombreDeporte + '". Si hay equipos de este deporte, también serán eliminados.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                // Si el usuario confirma, envía el formulario de eliminación
                if (result.isConfirmed) {
                    // Encuentra el formulario asociado al botón de eliminar
                    var form = button.closest('form');
                    // Envía el formulario
                    form.submit();
                }
            });
        });
    });
});
