<?php

$db = new PDO("sqlite:database.sqlite");
$query = $db->query("SELECT * FROM livros");

$livros = $query->fetchAll();

?>