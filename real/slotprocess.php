<?php 

session_start(); 
include("basic.php");
include("selectconnection.php");
$myemail = $_SESSION['email'];
$num = $_GET['slot_number'];
$day = $_GET['day'];

$sqls = "SELECT email FROM slotselect WHERE slotnum='$num'";
$result = mysqli_query($conn, $sqls);
if($result) {
    $row = mysqli_fetch_assoc($result);
    if($row) {
        $email = $row['email'];
        if(preg_match('/^[a-f]/i', $email)) {
            try {
                // Attempt to insert the new email
                $insertQuery = "INSERT INTO slotselect (email, slotnum) VALUES ('$myemail', '$num')";
                $insertResult = mysqli_query($conn, $insertQuery);
                
                // Check if the insertion was successful
                if (!$insertResult) {
                    throw new Exception("Error inserting data into database");
                }
                
            } catch(Exception $e) {
                // Handle the exception (e.g., duplicate email)
                echo $e->getMessage();
                exit();
            } 
            
            // If insertion is successful, delete the previous email
            $deleteQuery = "DELETE FROM slotselect WHERE email='$email'";
            $deleteResult = mysqli_query($conn, $deleteQuery);
            
            // Redirect to the day.php page
            header("Location: day.php?day=$day");
            exit();
        } else {
            // Redirect with error message if the slot is already filled
            header("Location: day.php?day=$day&error=Slot already filled.");
            exit();
        }
    }
}
mysqli_close($conn);
?>
