
<div class="border-top container py-4">
    <h4>Mon e-portfolio</h4>
    <p>Vous trouverez ici toutes les leçons que vous avez commencé à suivre</p>

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


$var = "Adil";

$sparql = "SELECT distinct  ?TitleTool
WHERE {
?ind rdf:type UserProfile:Learner .
?ind UserProfile:firstname '{$var}'^^xsd:string.
?ind UserProfile:firstname ?firstname .
?ind UserProfile:lastname ?lastname .
?ind UserProfile:email ?email .
?ind UserProfile:hasSeen ?hasS .
?ind UserProfile:like ?Like .
?ind UserProfile:preferredCollectiveLearningMode ?PrCLM .  
?ind UserProfile:preferredLanguage ?PrL .
?ind UserProfile:followed ?Lp .

?Lp UserProfile:hasGivenCompetence ?comp1 .

?comp a UserProfile:Competence .
 ?comp UserProfile:idCompetence ?o   .
 ?comp UserProfile:titleCompetence ?titleComp .
?cmt UserProfile:hasCompetence ?comp .
?cmt UserProfile:hasTool ?tool .
?tool UserProfile:titleTool ?titreTool .



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
bind(str(?ind) as ?Utilisateur) .
bind(str(?Lp) as ?LearningPath) .
bind(str(?hasS) as ?hasSeen) .
bind(str(?train) as ?Formation) .
bind(str(?comp1) as ?Competence1) .

bind(str(?titreTool) as ?TitleTool) .
bind(str(?titleComp) as ?TitleComp) .

}

LIMIT 10";



$result = sparql_query($sparql);

if (!$result) {
    print sparql_errno() . ": " . sparql_error() . "\n";
    exit;
}

$fields = sparql_field_array( $result );

print "<div class='row'>";

while( $row = sparql_fetch_array( $result ) ){

    foreach( $fields as $field ) {
        print"<div class='col-sm-2'>";
        print"<div class='card'>";
        print"<div class='card-body'>";
        print"<h5 class='card-title'>$row[$field]</h5>";
        print"</div> </div> </div>";
    }
}
print"</div>"
?>

</div>