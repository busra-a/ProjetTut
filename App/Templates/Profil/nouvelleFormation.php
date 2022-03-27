

<div class="container py-4">
    <h4>Choisissez la formation qui vous intéresse le plus</h4>

<!--    faire une boucle sur les formations, changer l'id grâce à concat-->

    <?php
    require_once("sparqllib.php");

    $db = sparql_connect("http://localhost:3030/training/sparql");

    if (!$db) {
        print sparql_errno() . ": " . sparql_error() . "\n";
        exit;
    }
    sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
    sparql_ns("owl", "http://www.w3.org/2002/07/owl#");
    sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");
    sparql_ns("xsd", "http://www.w3.org/2001/XMLSchema#");
    sparql_ns("traino", "http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#");

    $sparql = "SELECT distinct   ?title
WHERE {
?trade rdf:type traino:Trade .
?training traino:hasTrade ?trade .
?training rdf:type traino:Training .
?training traino:titleTraining ?titletraining .
?training traino:hasLearningObject ?lo .
?lo rdf:type traino:LearningObject .
?lo traino:titleLearningObject ?title .
}";

    $result = sparql_query($sparql);
    if (!$result) {
        print sparql_errno() . ": " . sparql_error() . "\n";
        exit;
    }

    $fields = sparql_field_array( $result );



    ?>
    <ol class="list-group list-group-numbered">
        <?php while( $row = sparql_fetch_array( $result ) ){
        foreach( $fields as $field )
        {
        print "<li class='list-group-item'><a href='#'> $row[$field] </a></li>";
        }}
        ?>
    </ol>

</div>

<?php
include_once"./Templates/Profil/completion.php";
?>