<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if(empty($attractie)){
    $errors[] = "attractie is verplicht";
}
$type = $_POST['type'];
if(empty($type)){
    $errors[] = "type is verplicht";
}
$capaciteit = $_POST['capaciteit']; 
if(is_numeric($capaciteit)){
    $errors[] = "capaciteit is verplicht";
}
if(isset($_POST['prioriteit'])){
    $prioriteit = 1;
} 
else {
    $prioriteit = 0;
}
$melder = $_POST['melder'];
if(empty($melder)){
    $errors[] = "melder is verplicht";
}
$overige_info = $_POST['overige_info'];

if (isset($errors)){
    var_dump($errors);
    header("Location: ../meldingen/create.php");
    die();
}
//echo $attractie . " / " . $capaciteit . " / " . $melder . " / " . $overige_info;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query= "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement -> Execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overige_info
]);
//5. Redirect
header("Location: ../index.php");
?>