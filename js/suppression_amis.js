document.addEventListener('DOMContentLoaded', function () {
    var deleteButtons = document.querySelectorAll('.button_supprimerAmis');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var amiId = button.closest('form').querySelector('[name="ami_id"]').value;

            $.ajax({
                // L'URL de la requête avec le paramètre action
                url: "http://localhost/~fbenyoussef/Sae_Dev_Web/SAE-DEV-WEB-S3/Ajax/suppression_amis.php",
                type: "POST",
                contentType: "application/json",
                dataType: 'json',
                data:  JSON.stringify({ ami_id: amiId }),
                success:function(data){
                    console.log("data", data);
                    if (data.success) {
                        console.log("je suis dans le success")
                        // La suppression a réussi, effectuez les actions nécessaires (par exemple, masquer l'élément)
                        var containerAmis = button.closest('.container_amis');
                        if (containerAmis) {
                            var hrElement = containerAmis.nextElementSibling;
                            containerAmis.remove();
                            if (hrElement) {
                                hrElement.remove();
                            }
                            var containerSuivant = containerAmis.nextElementSibling;
                            if (containerSuivant) {
                                var amiId = containerSuivant.id.split('_')[1];
                                containerSuivant.id = 'ami_' + amiId;
                            }
                        }
                    } else {
                        console.log("je suis dans le error")
                        // La suppression a échoué, affichez un message d'erreur
                        console.error("La suppression a échoué. Veuillez réessayer plus tard.");
                    }
                }
            })
            })  
        });
    });

    
