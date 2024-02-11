<?php 
    include("basic.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day <?php echo $_GET['day']; ?></title>
</head>
<body>
    <h1>Day <?php echo $_GET['day']; ?></h1>
    <!-- Add any content specific to each day here -->
    <?php
        $daynum = $_GET['day'];
        $numpeople = $_GET['numpeople'];
        echo $daynum;
        echo $numpeople;
        
    
    
    ?>
</body>
</html>
