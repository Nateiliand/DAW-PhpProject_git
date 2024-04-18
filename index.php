<?php 
    // Inclou l'arxiu de connexio
    include ("Connexio.php");
    //consulta sql
    $query= "SELECT p.id, p.nom, p.descripció, p.preu, c.nom AS categoria
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
                //Executa la consulta i recorre els resultats
                $resultat=mysqli_query($connexio, $query);
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
