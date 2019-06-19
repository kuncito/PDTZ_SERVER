<?php
include("config.php");

$sql = "INSERT INTO eventos (id_alumno, id_sesion, tipo_evento, titulo, datos)
VALUES ('".$_POST["alumno"]."','".$_POST["id_sesion"]."','".$_POST["tipo_evento"]."','".$_POST["titulo"]."','".$_POST["datos"]."')";

if (mysqli_query($conn, $sql)) {
    ob_start();
    var_dump("Event Saved: ".$_POST["titulo"]);
    error_log(ob_get_clean(), 4);
} else {
    ob_start();
    var_dump("Error: " .$sql.mysqli_error($conn));    
    error_log(ob_get_clean(), 4);
}

mysqli_close($conn);
?>
