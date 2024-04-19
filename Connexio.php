<?php
    /**
     * Establiment de connexió amb la base de dades.
     *
     * Aquest script es fa servir per connectar-se a la base de dades.
     *
     * @param mysqli $connexio Connexió amb la base de dades
     * 
     * @param string $host La direcció IP de la màquina (localhost per defecte).
     * @param string $user Nom de l'usuari de la base de dades.
     * @param string $password Contrasenya de l'usuari.
     * @param string $database Nom de la base de dades a la qual ens connectem.
     * 
     */

    $connexio = mysqli_connect("localhost", "root", "Sy1varant", "la_meva_botiga");
    mysqli_set_charset($connexio, "utf8");
?>

