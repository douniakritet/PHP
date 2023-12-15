<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coloration Dynamique</title>
    <style>
        body {
            background-color: <?php echo $couleur; ?>;
            color: #000000; /* Couleur du texte */
        }
    </style>
</head>
<body>
    <h1>Coloration Dynamique</h1>
    <p>Ce texte aura une couleur de fond définie par l'utilisateur.</p>

    <form method="post">
        <label for="couleur">Choisissez une couleur :</label>
        <input type="color" id="couleur" name="couleur" value="<?php echo $couleur; ?>">
        <button type="submit">Appliquer la couleur</button>
    </form>
</body>
</html>