<div class="container py-4">
    <h4>Choisissez une nouvelle formation</h4>

<!--    faire une boucle sur les formations, changer l'id grâce à concat-->

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        titre de la formation (ex : informatique)
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> Description de la formation
                    </div>
                </div>
            </div>
        </div>

</div>

<?php
include_once"./Templates/Profil/completion.php";
?>