<?php

class ModeleProfil {

//    username en paramètre
    function portfolio(){
        // customize your ARC2 location
        include_once("/var/www/html/phprdftest/arc2-master/ARC2.php");

        $dbpconfig = array(
            // customize your endpoint address
            "remote_store_endpoint" => "http://localhost:3030/default/query",
        );

        $store = ARC2::getRemoteStore($dbpconfig);

        if ($errs = $store->getErrors()) {
            echo "<h1>getRemoteSotre error<h1>";
        }

        $query = "
            PREFIX tr: <http://linc.iut.univ-paris8.fr/learningCafe/Training.owl#>
            PREFIX type: <http://www.w3.org/2001/XMLSchema#>
            SELECT ?PR ?title ?url ?language ?format ?duration ?level WHERE {
                ?iri tr:titleLearningObject type:string.
                ?iri tr:hasPedagogicalResource ?PR.
                ?PR tr:titlePedagogicalResource ?title.
                ?PR tr:urlPedagogicalResource ?url.
                ?PR tr:languagePedagogicalResource ?language.
                ?PR tr:formatPedagogicalResource ?format.
                ?PR tr:durationPedagogicalResource ?duration.
                ?PR tr:levelPedagogicalResource ?level.
            }
        ";

        $rows = $store->query($query, 'rows'); /* execute the query */
    }
}