<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            <?php
            if (isset($_POST['favorite'])) {
                
                echo "background-color: ". $_COOKIE['mycolor'] .";";
            
             } 
           if(isset($_POST['notfavorite'])) {

            header('Location: index.php');                
                }
                
            ?>
        
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
        <legend><strong>Your favorite color is :</strong></legend>
<p> <?php echo $_COOKIE['mycolor'];?></p>
</fieldset>
</body>
</html>