<?php 
    include("basic.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grid Layout</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Adjust the number of columns as needed */
            gap: 30px; /* Adjust the gap between grid items */
            position: relative;
            top: 125px;
            left: 50%;
        }

        .grid-item {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
            height: 70px;
            width: 165px;
            border-radius: 10px;
            transition: transform 0.3s ease;
            background-color: darkgreen;
            
        }
        .grid-item:hover {
            
            transform: scale(1.25);
        }

        /* Optional: Style links */
        .grid-item a {
            color: aliceblue;
            text-decoration: none;
            padding: 0 20px;
            font-weight: bold;
        }
        .icon {
            
            font-size: 36px;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <?php
        // Generate links for days 1 to 20
        for ($day = 1; $day <= 20; $day++) {
            $num_people = 10; // Change this to the desired number of people for each day
            echo '<a href="day.php?day=' . $day . '&num_people=' . $num_people . '" class="grid-item">Day ' . $day . '</a>';
        }
        ?>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
