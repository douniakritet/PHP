<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; 
            margin: 0;
        }

        fieldset {
            width: 50%; 
            position: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Fill down the form :</legend>
    <form action="form.php" method="POST">
        <label for="color">What's your favorite color ?</label>
        <input type="color" name="color" id="color" placeholder="enter your favorite color !">
        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>
    </fieldset>
</body>
</html>