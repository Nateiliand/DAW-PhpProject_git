<?php
    /**
     * Script per eliminar un producte a la base de dades.
     *
     * Aquest script elimina un producte de la base de dades utilitzant l'ID proporcionat a través de $_GET.
     * Si hi ha cap error, mostrarà un missatge i retornarà a la pàgina principal.
     * 
     * @var type $_GET
     * 
     * @param int $id L'ID de la categoria del producte.
     * 
     */

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
        // Si hi ha algun error, mostra un missatge d'error i redirecciona a l'index
        echo "Error en eliminar el producte: " . mysqli_error($connexio);
        header("Location: index.php");
        exit();
    }   

    // Tanca la connexió a la base de dades
    mysqli_close($connexio);
?>

