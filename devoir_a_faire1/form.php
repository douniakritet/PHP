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
 
    <?php
   if(!empty($_POST['color']) && isset($_POST['color']) && isset($_POST['submit'])){
    $color = $_POST['color'];
        setcookie(
            'mycolor',
             $color,
             [
                'expires' => time() + 365*24*3600,
                'secure' => true,
                'httponly' => true,
            ]
             );
            ?>
            <fieldset>
            <?php
        echo 'Your favorite color is : '.$color;  ?>
        <form action="home.php" method="POST">
            <button type="submit" name="favorite" id="favorite">Yes</button>&nbsp
            <button type="submit" name="notfavorite" id="notfavorite">NO</button>
        </form> 
        </fieldset>
        <?php 
       }
     ?>
</body>
</html>