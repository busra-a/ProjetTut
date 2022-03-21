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
 
 
 $sparql = "SELECT distinct ?ind 
WHERE {
?ind rdf:type traino:Training .

}";


$sparql1 = "SELECT distinct ?competence
WHERE { 
?competence rdf:type upo:Competence .

}";



$result = sparql_query( $sparql ); 
if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

$fields = sparql_field_array( $result );

print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>";
print "<table class='example_table'>";
print "<tr>";
foreach( $fields as $field )
{
	print "<th>$field</th>";
}
print "</tr>";
while( $row = sparql_fetch_array( $result ) )
{
	print "<tr>";
	foreach( $fields as $field )
	{
		print "<td>$row[$field]</td>";
	}
	print "</tr>";
}
print "</table>";


