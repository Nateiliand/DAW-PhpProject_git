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
        <div class="form">
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
	    				<select name="categoria_id" required>
	    					<option value="1">Elecrònics</option>
	    					<option value="2">Roba</option>
	    				</select>
                    <hr>
                    <!--Botons-->
                    <input type="submit" value="Afegir">
                </fieldset>
            </form>
        </div>
    </main>

    <footer>
    </footer>
</body>
</html>

<?php
// Recull les dades enviades pel formulari
    $nom = $_POST["nom"];
    $descripció = $_POST["descripció"];
    $preu = $_POST["preu"];
    $categoria_id = $_POST["categoria_id"];

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
        // Si hi ha algun error, mostra un missatge d'error.
        echo "Error en afegir el producte: " . mysqli_error($connexio);
    }   

    // Tanca la connexió a la base de dades
    mysqli_close($connexio);
?>

