
<div class="border-top container py-4">
    <h4>Mes informations</h4>

    <!--collecter les informations manquantes dans le profil de l'utilisateur SESSION
    faire un if à chaque fois
    on remplit le conteneur si l'info a déjà été donnée par l'utilisateur-->

    <?php

    require_once("sparqllib.php");

    $db = sparql_connect("http://localhost:3030/TrainingUpoGlobal/sparql");

    if (!$db) {
        print sparql_errno() . ": " . sparql_error() . "\n";
        exit;
    }

    sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
    sparql_ns("owl", "http://www.w3.org/2002/07/owl#");
    sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");
    sparql_ns("xsd", "http://www.w3.org/2001/XMLSchema#");
    sparql_ns("upo", "http://linc.iut.univ-paris8.fr/learningCafe/UserProfile.owl#");
    sparql_ns("traino", "http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#");
    sparql_ns("UserProfile", "http://linc.iut.univ-paris8.fr/learningCafe/UserProfile.owl#");

    $var="Adil";
    $sparql = "SELECT distinct ?email ?firstname ?lastname 
WHERE {
?ind rdf:type UserProfile:Learner .
  ?ind UserProfile:hasTraining ?HasT .
  ?ind UserProfile:firstname '{$var}' ^^xsd:string .
  ?ind UserProfile:firstname ?firstname .
?ind UserProfile:lastname ?lastname .
?ind UserProfile:email ?email .

}";

    $result = sparql_query( $sparql );
    if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

    $fields = sparql_field_array( $result );

    print "<table class='example_table'>";
    while( $row = sparql_fetch_array( $result ) )
    {
        print "<tr>";
        foreach( $fields as $field )
        {
            print "<td>$row[$field]       </td>";
        }
        print "</tr>";
    }
    print "</table>";

    ?>

</div>

<?php
include_once "./Templates/Profil/e-portfolio.php";
?>
