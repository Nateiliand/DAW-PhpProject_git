<?php 
    /**
     *
     * Script per obtenir i mostrar productes de la base de dades.
     * 
     * En primer lloc cridam l'arxiu connexio.php amb l'include.
     * 
     * @package Connexio.php
     *
     */

    // Inclou l'arxiu de connexio
    include ("Connexio.php");
    
    /**
     *
     * Script per crear la sentencia SQL.
     * 
     * @param string $consulta Consulta SQL que crida els elements necessaris per a la taula.
     *
     */
    
    //consulta sql
    $consulta= "SELECT p.id, p.nom, p.descripció, p.preu, c.nom AS categoria
                FROM productes AS p 
                INNER JOIN categories AS c 
                ON p.categoria_id = c.id;";
?>

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
        <h1>Productes</h1>            
    </header>
    <main>
        <hr>
        <button class="afegir"><a href="Nou.php">Nou Producte</a></button>
        <hr>
        <table class="productes">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Preu</th>
                <th>Categoría</th>
                <th>Acció</th>
            </tr>

            <?php 
                /**
                * Script per executar la consulta SQL
                * 
                * Aquest script executarà la consulta SQL, recorre els resultats a 
                * dins de la base de dades i els inserta a la taula HTML a dins 
                * de cadascuna de les etiquetes <td>
                * 
                * @param mysqli $resultat Execcució de la consulta SQL connectant-se a la base de dades.
                * @param mysqli $connexió Connexió a la base de dades
                * @var array $row Array associatiu que conté les dades de la fila de la base de dades.
                * 
                */
            
                //Executa la consulta i recorre els resultats
                $resultat=mysqli_query($connexio, $consulta);
                while($row=mysqli_fetch_assoc($resultat)){
            ?>
                <tr>
                    <td> <?php echo $row["id"];?> </td>
                    <td> <?php echo $row["nom"];?> </td>
                    <td> <?php echo $row["descripció"];?> </td>
                    <td> <?php echo $row["preu"];?> </td>
                    <td> <?php echo $row["categoria"];?> </td>
                    <td> <button class="elimina"><a href="Elimina.php?id=<?php echo $row["id"];?>">Elimina</a></button></td>
                </tr>
            <?php 
                /**
                * Script per tancar la connexió
                *
                * Per finalitzar, aquest script alliberarà la memòrial dels resultats 
                * a la variable $resultat i tancarà la connexió.
                * 
                */
                }
                //Allibera la memòria dels resultats
                mysqli_free_result($resultat);
                //Tanca la connexio
                mysqli_close($connexio);
            ?>
            </tr>
        </table>
    </main>
    <footer>
    </footer>
</body>
</html>
