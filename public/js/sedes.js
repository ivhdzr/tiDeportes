document.addEventListener("DOMContentLoaded", function () {
    // FUNCIÓN DE BORRAR
    var deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            var nombreSede = button.getAttribute("data-nombre");
            Swal.fire({
                title: "¿Quieres eliminar la sede?",
                text:
                    'Se eliminará la sede "' +
                    nombreSede +
                    '". Si hay torneos en esta sede, también serán eliminados.',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                // Si el usuario confirma, envía el formulario de eliminación
                if (result.isConfirmed) {
                    // Encuentra el formulario asociado al botón de eliminar
                    var form = button.closest("form");
                    // Envía el formulario
                    form.submit();
                }
            });
        });
    });

    // PETICIÓN A WS
    const inputNombre = document.getElementById("inputNombreSede");

    inputNombre.addEventListener("input", function () {
        const query = this.value;

        if (query.length > 2) {
            // Hacer la solicitud cuando hay más de 2 caracteres
            fetchPlaces(query);
        }
    });

    async function fetchPlaces(query) {
        const apiUrl = `https://nominatim.openstreetmap.org/search?q=${query},Puebla,MX&format=json&limit=5`;

        try {
            const response = await fetch(apiUrl);
            const data = await response.json();
            showSuggestions(data);
            console.log(data);
        } catch (error) {
            console.error("Fetch error: ", error);
        }
    }

    function showSuggestions(places) {
        const suggestionsList = document.getElementById("suggestions");
        suggestionsList.innerHTML = "";

        places.forEach((place) => {
            const listItem = document.createElement("li");
            listItem.textContent = place.display_name;
            listItem.addEventListener("click", () => {
                inputNombre.value = place.display_name;
                suggestionsList.innerHTML = "";
            });
            suggestionsList.appendChild(listItem);
        });
    }
});
