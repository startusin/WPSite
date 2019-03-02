<?php
$data = file_get_contents('php://input');
$datajson = json_decode($data);
$id = $datajson->meta->id;
$mark = $datajson->current->d7fe5235b5c8ae50968b42ffbca68e266e476418;
$marks = array( '89' => 1, '48' => 2, '49' => 3, '50' => 4, '88' => 5 );

function ext_sql_connect(){
    $servername = "srv05db01.cc66opexrbcj.eu-west-1.rds.amazonaws.com";
    $username = "wp_dev";
    $password = "FiWabgek5";
    $dbname = "nixdb";
    return mysqli_connect($servername, $username, $password, $dbname);
}

$query = 'UPDATE `users` SET `mark` = '.$marks[$mark].' WHERE `crmId` = '.$id;

$connection = ext_sql_connect();
if (!$connection): die('err db'); endif;

$stmt = $connection->prepare($query);
$stmt->execute();
?>
