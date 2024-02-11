<?php include("basic.php"); ?>

<html>
<head>
    <title>Select Day</title>
    <style>
        body {
            font-family: monospace;
            font-size: x-large;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Adjust the number of columns as needed */
            gap: 50px 30px; /* Adjust the gap between grid items */
            
            position: fixed;
            text-decoration: none;
        }

        .grid-item a{
            color: aliceblue;
                opacity: 99%;
                height: fit-content;
                width: fit-content;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 1.5em;
                letter-spacing: 0.1em;
                padding: 15 30;
                transition: 0.5s;
            
        }
        .grid-item a:hover {
            border: 2px solid;
                transform: scale(1.05);
                box-shadow: 0 0 100px var(--clr);
                color: var(--clr);
        }
        
        /* Optional: Style links */
        .grid-item:hover  {
            
        }
    </style>
</head>
<body>


<div class="grid-container">
<?php
        session_start();
        $numppl = $_SESSION['numppl'];
        // Generate links for days 1 to 20
        for ($day = 1; $day <= 20; $day++) {
            echo '<div class="grid-item"><a style="--clr:#FF5F1F" href="day.php?day=' . $day . '">Day ' . $day . '</a></div>';
        }
        ?>
    </div>
</body>
</html>