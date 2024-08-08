<?php

require 'config.php';

$ID = $conn->real_escape_string($_POST['ID']);
$nombre = $conn->real_escape_string($_POST['nombre']);
$apellido = $conn->real_escape_string($_POST['apellido']);
$edad = $conn->real_escape_string($_POST['edad']);
$pulsera = $conn->real_escape_string($_POST['pulsera']);

$sql = "INSERT INTO participantes (ID, nombre, apellido, edad, pulsera)
VALUES ('$ID', '$nombre', '$apellido', '$edad', '$pulsera')";
if ($conn->query($sql)) {
    $id = $conn->insert_id;
}

header('Location:   index.php');