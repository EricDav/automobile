<?php 
$host = "rajje.db.elephantsql.com";
$user = "fpbkgkea";
$pass = "rbm40mfLeg7_juX3Bo8eXzW7UGFAwClt";
$db = "fpbkgkea";

$r = "host=$host dbname=$db user=$user password=$pass";

// var_dump($r); exit;

// Open a PostgreSQL connection

try {
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass");
} catch(Exception $e) {
    var_dump($e);
}

// var_dump($con); exit;

$query = 'SELECT * FROM "public"."Stocks"';
$results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());
// var_dump($results); 

$row = pg_fetch_row($results);
while ($row) {
 // var_dump($row);
 $row = pg_fetch_row($results);
}
// var_dump($row); 
// Closing connection
pg_close($con);

echo json_decode(array("id" => 12));
?>
