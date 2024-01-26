document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.button_ajoutAmis');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var amiId = button.closest('form').querySelector('[name="ajout_id"]').value;

            $.ajax({
                // L'URL de la requête avec le paramètre action
                url: "http://localhost/~fbenyoussef/Sae_Dev_Web/SAE-DEV-WEB-S3/Ajax/ajoutAmis.php",
                type: "POST",
                contentType: "application/json",
                dataType: 'json',
                data: JSON.stringify({ ajout_id: amiId }),
                success: function (data) {
                    console.log("data", data);
                    if (data.success) {
                        console.log("je suis dans le success")
                        // La suppression a réussi, effectuez les actions nécessaires (par exemple, masquer l'élément)
                        var containerAmis = button.closest('.container_Ajoutamis');
                        if (containerAmis) {
                            // Cachez plutôt l'élément au lieu de le supprimer
                            containerAmis.style.display = 'none';
                        }

                        var hrElement = containerAmis.nextElementSibling;
                        if (hrElement) {
                            // Cachez plutôt l'élément hr au lieu de le supprimer
                            hrElement.style.display = 'none';
                        }

                        var containerSuivant = containerAmis.nextElementSibling;
                        if (containerSuivant) {
                            var amiId = containerSuivant.id.split('_')[1];
                            containerSuivant.id = 'ajout_' + amiId;
                        }
                    } else {
                        console.log("je suis dans le error")
                        // La suppression a échoué, affichez un message d'erreur
                        console.error("La suppression a échoué. Veuillez réessayer plus tard.");
                    }
                }
            });
        });
    });
});
