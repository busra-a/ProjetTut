
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
sparql_ns( "upo","http://linc.iut.univ-paris8.fr/learningCafe/UserProfile.owl#" );
sparql_ns( "traino","http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#" );


//recup liste des compétences dans l'ontologie upo (portfolio)
$sparql = "SELECT distinct ?ind ?firstname ?email ?hasS ?PrL ?train ?titletraining ?pr ?comp ?comptdetails
WHERE {
?ind rdf:type UserProfile:Learner .
?ind UserProfile:firstname 'Adil' ^^xsd:string .
?ind UserProfile:firstname ?firstname .
?ind UserProfile:email ?email .
?ind UserProfile:hasSeen ?hasS .
?ind UserProfile:preferredLanguage ?PrL .
?ind UserProfile:followed ?Lp .
?Lp UserProfile:hasGivenCompetence ?comp .
?comp UserProfile:hasCompetence ?comptdetails .
?ind UserProfile:hasTraining ?train .
?train traino:hasTrade ?trade .
?train rdf:type traino:Training .
?train traino:titleTraining ?titletraining .
?train traino:hasLearningObject ?lo .
?lo rdf:type traino:LearningObject .
?lo traino:titleLearningObject ?title .
?lo traino:hasPedagogicalResource ?pr .
?pr rdf:type traino:PedagogicalResource .
?pr traino:titlePedagogicalResource ?titlePr .

} 
LIMIT 5";

$result = sparql_query($sparql);
print "<p>Number of rows: " . sparql_num_rows($result) . " results.</p>";

//information d'un utilisateur, toutes les formations suivies, liste des compétences
//liste des intérêts, réalisations perso
include_once "./Templates/Profil/suggestionsperso.php";
?>