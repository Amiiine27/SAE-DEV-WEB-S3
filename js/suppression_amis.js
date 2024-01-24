document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.button_supprimerAmis');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            // Trouve le conteneur parent
            var containerAmis = button.closest('.container_amis');
            if (containerAmis) {
                // Récupère l'élément hr associé
                var hrElement = containerAmis.nextElementSibling;

                // Supprime le conteneur actuel et l'élément hr associé
                containerAmis.remove();
                if (hrElement) {
                    hrElement.remove();
                }

                // Si le conteneur suivant existe, remplace l'ID et déplace-le à la place du conteneur supprimé
                var containerSuivant = containerAmis.nextElementSibling;
                if (containerSuivant) {
                    var amiId = containerSuivant.id.split('_')[1];
                    containerSuivant.id = 'ami_' + amiId;
                }
            }
        });
    });
});
