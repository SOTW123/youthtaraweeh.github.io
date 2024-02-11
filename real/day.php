<?php 
    include("basic.php");
    include("sql.php");

    
    mysqli_close($conn);
?>

<html lang="en">
<head>
    <title>Slot Selection</title>
    <style>
        
        .slot {
            height: 50px;
            width: 300px;
            background-color: white; 
            display: flex;
            border-radius: 10cm;
            margin-bottom: 10px;
        }
        .m1 {
            height: 50px;
            width: 200px;
            background-color: lightgreen;
            border-top-left-radius: 10cm;
            border-bottom-left-radius: 10cm;
            color: black;
            font-family: monospace;
            font-size: 36px;
            text-align: center;
        }
        .m2 {
            height: 50px;
            width: 100px;
            background-color: lightgreen;
            opacity: 50%;
            transition: 0.1s;
            border-top-right-radius: 10cm;
            border-bottom-right-radius: 10cm;
            text-decoration: none;
            text-align: center;
            align-items: center;
        }
        .m2:hover {
            background-color: darkseagreen;
            transform: scale(1.1);
            opacity: 100%;
        }
        .m2:active {
            background-color: darkgreen;
        }
        .booked {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>        
<?php
    include("selectconnection.php");
    session_start();
    $email = $_SESSION['email'];
    // Assuming $numSlots contains the number of slots you want to generate
    $numpeople = $_SESSION['numppl']; // You can replace this with your PHP variable containing the number of slots
    function generate($day) {
        $day--;
        $result = array(
            array(2, 6),
            array(7, 11),
            array(12, 16),
            array(17, 21),
            array(22, 26),
            array(27, 31)
        );
    
        for ($l = 0; $l < $day; $l++) {
            for ($i = 0; $i < 6; $i++) {
                for ($j = 0; $j < 2; $j++) {
                    $result[$i][$j] += 30;
                }
            }
        }
    
        return $result;
    }
    $currday = $_GET['day'];
    $result = generate($currday);
    $_SESSION['list'] = $result;
    function verify($conn) {
        // Initialize the array to hold the slot verification status
        $slots = array('false', 'false', 'false', 'false', 'false', 'false');
        
        // Query to fetch data from the database
        $sql = "SELECT email FROM slotselect";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Extract the email from the current row
                $email = $row['email'];
                
                // Check if the email matches the pattern
                if (preg_match('/^a[1-6]$/', $email)) {
                    // Extract the slot number from the email
                    $slotNumber = (int) substr($email, 1);
                    
                    // Set the corresponding slot to true
                    $slots[$slotNumber - 1] = 'true';
                }
            }
            
            // Free the result set
            mysqli_free_result($result);
        }
        
        return $slots;
    }
    mysqli_close($conn);
?>

<form action="slotprocess.php">
<div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[0][0] . ' to ' . $list[0][1];
        ?>
        </div>
        
        <a href="slotprocess.php?slot_number=1&day=1" class="m2">
            <div class="m2">
                
            </div>
        </a>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[1][0] . ' to ' . $list[1][1];
        ?>
        </div>
        <a href="slotprocess.php?slot_number=2&day=1" class="m2">
            <div class="m2">
                
            </div>
        </a>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[2][0] . ' to ' . $list[2][1];
        ?>
        </div>
        <a href="slotprocess.php?slot_number=3&day=1" class="m2">
            <div class="m2">
                
            </div>
        </a>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[3][0] . ' to ' . $list[3][1];
        ?>
        </div>
        <a href="slotprocess.php?slot_number=4&day=1" class="m2">
            <div class="m2">
                
            </div>
        </a>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[4][0] . ' to ' . $list[4][1];
        ?>
        </div>
        <a href="slotprocess.php?slot_number=5&day=1" class="m2">
            <div class="m2">
                
            </div>
        </a>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[5][0] . ' to ' . $list[5][1];
        ?>
        </div>
        <a href="slotprocess.php?slot_number=6&day=1" class="m2">
            <div class="m2">
                
            </div>
        </a>
    </div>
</form>


<script>
function off() {
    // Perform some actions
    // Disable the button after it's clicked
    document.getElementById("slot").disabled = true;
}
function setButtonNumber(buttonNumber) {
    document.getElementById("button_number").value = buttonNumber;
}
</script>
</body>
</html>

