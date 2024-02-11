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
            height: 50px;
            width: 100px;
            background-color: red;
            opacity: 50%;
            transition: 0.1s;
            border-top-right-radius: 10cm;
            border-bottom-right-radius: 10cm;
            text-decoration: none;
            text-align: center;
            align-items: center;
            
            
        }
        .booked:hover {
            background-color: darkred;
            transform: scale(1.1);
            opacity: 100%;
        }
        .booked:active {
            background-color: #880808;
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
    

    $referenceTime = strtotime("2024-02-11 00:00:00");

    // Get the current timestamp
    $currentTimestamp = time();
    
    // Calculate the time difference in seconds
    $timeDifference = $currentTimestamp - $referenceTime;
    
    // Define the duration of 24 hours in seconds
    $oneDayInSeconds = 24 * 60 * 60;
    
    // Check if 24 hours have passed since the reference time
    if ($timeDifference >= $oneDayInSeconds) {
        // Increment the day variable by the number of days that have passed
        $_SESSION['day'] = isset($_SESSION['day']) ? $_SESSION['day'] + (int) ($timeDifference / $oneDayInSeconds) : 1;
    } else {
        // If less than 24 hours have passed, retrieve the day from the session
        $_SESSION['day'] = isset($_SESSION['day']) ? $_SESSION['day'] : 1;
    }

// Display or use the updated day variable
echo "Current Day: " . $_SESSION['day'];
// Store the current day value in session
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
    $currday = $_SESSION['day'];
    $result = generate($currday);
    $_SESSION['list'] = $result;
    function verify($conn) {
        // Initialize the array to hold the slot verification status
        $slots = array('false', 'false', 'false', 'false', 'false', 'false');
        
        // Query to fetch data from the database
        $sql = "SELECT email, slotnum FROM slotselect ORDER BY slotselect.slotnum ASC";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Extract the email and slot number from the current row
                $email = $row['email'];
                $slotNumber = $row['slotnum'];
                
                // Check if the email contains a character between 'a' and 'f'
                if (preg_match('/^[a-fA-F]/', $email)) {
                    // Set the corresponding slot to true
                    $slots[$slotNumber - 1] = 'true';
                }
            }
            
            // Free the result set
            mysqli_free_result($result);
        }
        
        return $slots;
    }
    
?>

<form action="slotprocess.php">
<div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[0][0] . ' to ' . $list[0][1];
        ?>
        </div>
        
        
        <?php 
            $arr = verify($conn);
            if($arr[0]=='true') {
                ?> <a href="slotprocess.php?slot_number=1&day=1" class="m2">
                <div class="m2"></div>
            </a> <?php
            } else {
                ?><a href="slotprocess.php?slot_number=1&day=1" class="booked">
                <div class="booked"></div>
            </a><?php
            }
        ?>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[1][0] . ' to ' . $list[1][1];
        ?>
        </div>
        <?php 
            $arr = verify($conn);
            if($arr[1]=='true') {
                ?> <a href="slotprocess.php?slot_number=2&day=1" class="m2">
                <div class="m2"></div>
            </a> <?php
            } else {
                ?><a href="slotprocess.php?slot_number=2&day=1" class="booked">
                <div class="booked"></div>
            </a><?php
            }
        ?>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[2][0] . ' to ' . $list[2][1];
        ?>
        </div>
        <?php 
            $arr = verify($conn);
            if($arr[2]=='true') {
                ?> <a href="slotprocess.php?slot_number=3&day=1" class="m2">
                <div class="m2"></div>
            </a> <?php
            } else {
                ?><a href="slotprocess.php?slot_number=3&day=1" class="booked">
                <div class="booked"></div>
            </a><?php
            }
        ?>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[3][0] . ' to ' . $list[3][1];
        ?>
        </div>
        <?php 
            $arr = verify($conn);
            if($arr[3]=='true') {
                ?> <a href="slotprocess.php?slot_number=4&day=1" class="m2">
                <div class="m2"></div>
            </a> <?php
            } else {
                ?><a href="slotprocess.php?slot_number=4&day=1" class="booked">
                <div class="booked"></div>
            </a><?php
            }
        ?>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[4][0] . ' to ' . $list[4][1];
        ?>
        </div>
        <?php 
            $arr = verify($conn);
            if($arr[4]=='true') {
                ?> <a href="slotprocess.php?slot_number=5&day=1" class="m2">
                <div class="m2"></div>
            </a> <?php
            } else {
                ?><a href="slotprocess.php?slot_number=5&day=1" class="booked">
                <div class="booked"></div>
            </a><?php
            }
        ?>
    </div>
    <div class="slot">
        <div class="m1">
        <?php 
        $list = $_SESSION['list']; 
        echo $list[5][0] . ' to ' . $list[5][1];
        ?>
        </div>
        <?php 
            $arr = verify($conn);
            if($arr[5]=='true') {
                ?> <a href="slotprocess.php?slot_number=6&day=1" class="m2">
                <div class="m2"></div>
            </a> <?php
            } else {
                ?><a href="slotprocess.php?slot_number=6&day=1" class="booked">
                <div class="booked"></div>
            </a><?php
            }
        ?>
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

<?php 
mysqli_close($conn);
?>