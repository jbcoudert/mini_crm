<?php

$db = new PDO("mysql:host=localhost;dbname=crm_desbg", 'root', 'plop');
var_dump("DELETE FROM Entreprise WHERE id = " . $_POST['id']);
$deleteClient =$db->query("DELETE FROM Entreprise WHERE id = " . $_POST['id']);

?>