
<div class="border-top container py-4">
    <h4>Mon e-portfolio</h4>
</div>

<?php

require_once( "sparqllib.php" );

$db = sparql_connect("http://localhost:3030/training/sparql");

if(!$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns( "rdf","http://www.w3.org/1999/02/22-rdf-syntax-ns#" );
sparql_ns( "owl","http://www.w3.org/2002/07/owl#" );
sparql_ns( "rdfs","http://www.w3.org/2000/01/rdf-schema#" );
sparql_ns( "xsd","http://www.w3.org/2001/XMLSchema#" );
//sparql_ns( "upo","http://linc.iut.univ-paris8.fr/learningCafe/UserProfile.owl#" );
sparql_ns( "upo","http://linc.iut.univ-paris8.fr/learningCafe/UserProfile.owl#" );
sparql_ns( "traino","http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#" );

//recup liste des compétences dans l'ontologie upo (portfolio)
$sparql = "SELECT distinct ?competence
WHERE {
?competence rdf:type upo:Competence .

}";

$result = sparql_query($sparql);
print "<p>Number of rows: " . sparql_num_rows($result) . " results.</p>";

var_dump($result);
//information d'un utilisateur, toutes les formations suivies, liste des compétences
//liste des intérêts, réalisations perso
include_once "./Templates/Profil/suggestionsperso.php";
?>
