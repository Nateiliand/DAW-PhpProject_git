<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>Taula MySQL</title>
</head>
<body>
    <header>
        <h1>Afegeix un nou producte</h1>
    </header>
    
    <main>
        <hr>
        <form method="post" autocomplete="on">
            <fieldset>
                <!--nom-->
                <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" required>
                <!--cognoms-->
                <label for="descripció">Descripció:</label>
                    <input type="text" name="descripció" id="descripció" required>
                <!--telefon-->
                <label for="preu">Preu:</label>
                    <input type="number" name="preu" id="preu" step="0.01" required>
                <!--correu-->
	    	<label for="categoria_id">Categoría:</label><br>
                    <select name="categoria_id" id="categoria_id" required>
                        <option value="" disabled selected hidden>Selecciona una categoría</option>
	    		<option value="1">Elecrònics</option>
	    		<option value="2">Roba</option>
                    </select>
                <hr>
                <!--Botons-->
                <input type="submit" value="Afegir">
            </fieldset>
        </form>

    </main>

    <footer>
    </footer>
</body>
</html>

<?php

    /**
     * Script per afegir un producte a la base de dades.
     *
     * Aquest script recull les dades enviades per un formulari (nom, descripció, preu i categoria del producte)
     * i les insereix a la base de dades de productes.
     * Si hi ha cap error, mostrarà un missatge i retornarà a la pàgina principal.
     * 
     * @param string $nom El nom del producte.
     * @param string $descripció La descripció del producte.
     * @param float $preu El preu del producte.
     * @param int $categoria_id L'ID de la categoria del producte.
     * 
     */

    // Recull les dades enviades pel formulari
    $nom = filter_input(INPUT_GET,"nom") ?? null;
    $descripció = filter_input(INPUT_GET, "descripció") ?? null;
    $preu = filter_input(INPUT_GET,"preu") ?? null;
    $categoria_id = filter_input(INPUT_GET,"categoria_id") ?? null;

    // Inclou l'arxiu de connexio
    include ("Connexio.php");
        
    //consulta sql
    $consulta= "INSERT INTO productes (nom, descripció, preu, categoria_id) VALUES ('$nom', '$descripció', $preu, '$categoria_id')";
    // Executa la consulta
    $resultat= mysqli_query($connexio,$consulta);

    // Comprova si la consulta s'ha executat correctament
    if($resultat){
        // Redirecció l'index
        header("Location: index.php");
        exit();
    } else {
        // Si hi ha algun error, mostra un missatge d'error i redirecciona a l'index
        echo "Error en afegir el producte: " . mysqli_error($connexio);
        header("Location: index.php");
        exit();
    }   

    // Tanca la connexió a la base de dades
    mysqli_close($connexio);
?>

