<?php

$db = new PDO("mysql:host=localhost;dbname=crm_desbg", 'root', 'plop');
var_dump("DELETE FROM Client WHERE id = " . $_POST['id']);
$deleteClient =$db->query("DELETE FROM Client WHERE id = " . $_POST['id']);

?>