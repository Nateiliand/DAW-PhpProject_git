<?php
    // Inclou l'arxiu de connexio
    include ("Connexio.php");

    // Recull l'id
    $id = $_GET["id"];
        
    //consulta sql
    $eliminar= "DELETE FROM productes WHERE id='$id'";

    $resultat= mysqli_query($connexio,$eliminar);

    // Executa la consulta
    if($resultat){
        // Redirecció l'index
        header("Location: index.php");
        exit();
    } else {
        echo "Error en eliminar el producte: " . mysqli_error($connexio);
    }   

    // Tanca la connexió a la base de dades
    mysqli_close($connexio);
?>

