<?php
require_once( "sparqllib.php" );

$db = sparql_connect("http://localhost:3030/training/sparql");

if(!$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns( "rdf","http://www.w3.org/1999/02/22-rdf-syntax-ns#" );
sparql_ns( "owl","http://www.w3.org/2002/07/owl#" );
sparql_ns( "rdfs","http://www.w3.org/2000/01/rdf-schema#" );
sparql_ns( "xsd","http://www.w3.org/2001/XMLSchema#" );
//sparql_ns( "upo","http://linc.iut.univ-paris8.fr/learningCafe/UserProfile.owl#" );
//sparql_ns( "traino","http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#" );
sparql_ns( "upo","http://linc.iut.univ-paris8.fr/learningCafe/upo.owl#" );
sparql_ns( "traino","http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#" );

//liste des titres de formations, titres des lo liés à ces formations, titres des ressources pédago(cours) liés à ces lo
$sparql0 = "SELECT distinct  ?titletraining ?title ?titlePr
WHERE {
?trade rdf:type traino:Trade .
?training traino:hasTrade ?trade .
?training rdf:type traino:Training .
?training traino:titleTraining ?titletraining .
?training traino:hasLearningObject ?lo .
?lo rdf:type traino:LearningObject .
?lo traino:titleLearningObject ?title .
?lo traino:hasPedagogicalResource ?pr .
?pr rdf:type traino:PedagogicalResource .
?pr traino:titlePedagogicalResource ?titlePr .
}";

//liste des formations dans l'ontologie training
$sparql = "SELECT distinct ?ind
WHERE {
?ind rdf:type traino:Training .

}";


$result = sparql_query($sparql);
if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

$fields = sparql_field_array( $result );

//afficher les données dans des cartes (?)
?>
<div class="p-5 border-bottom">
    <h2 class="text-center">Catalogue des formations</h2>
    <?php print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>"; ?>
    <!--CAROUSSEL FORMATIONS-->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <?php

            $i=0;
            while( $row = sparql_fetch_array( $result ) ) {

                foreach( $row as $field ) {

                    if($i==0){ ?>

                        <div class='carousel-item active'> <?php print_r((explode('#', $field))[1]) ?> </div>

                    <?php } ?>

                    <div class='carousel-item'> <?php print_r((explode('#', $field))[1]) ?> </div>
                    <?php
                    $i++;
                }
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

