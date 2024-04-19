<?php

    /**
     * Script per eliminar un producte de la base de dades.
     *
     * Aquest script elimina un producte de la base de dades utilitzant l'ID proporcionat a través de $_GET.
     * Si hi ha cap error, mostrarà un missatge i retornarà a la pàgina principal.
     * 
     * @package Connexio.php
     * @param int $id L'ID de la categoria del producte a eliminar.
     * @param string $consulta Consulta SQL que elimina el producte amb el 
     * qual l'id coincideix de la base de dades.
     * @param mysqli $resultat Execcució de la consulta SQL connectant-se a la base de dades.
     * 
     */

    // Inclou l'arxiu de connexio
    include ("Connexio.php");

    // Recull l'id
    $id = $_GET["id"];
        
    //consulta sql
    $eliminar= "DELETE FROM productes WHERE id='$id'";

    $resultat= mysqli_query($connexio,$eliminar);
    
    /**
     * 
     * @throws Exception Si es realitza correctament, torna a la pàgina principal, i si no, 
     * es mostrarà un missatge i es retornarà a la pàgina principal.
     * 
     * Per finalitzar es tancarà la connexió.
     * 
     */
    
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

