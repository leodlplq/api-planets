<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require("./model.php");
        require("./functions.php");
        

        

        createTableHTML($planets);

      
    ?>
    <a href="newPlanet.php">add a planet</a>
</body>
</html>