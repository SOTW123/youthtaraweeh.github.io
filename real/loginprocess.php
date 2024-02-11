<?php 


session_start(); 
include("basic.php");
include("sql.php");

if (isset($_POST['email']) && isset($_POST['password'])) {

$email = $_POST['email'];
$_SESSION['email'] = $email;
$pass = $_POST['password'];
if (empty($email)) {
    header("Location: login.php?error=Email is required");
    exit();
}else if(empty($pass)){
    header("Location: login.php?error=Password is required");
    exit();
}else{
    $sql_check = "SELECT * FROM yt WHERE email='$email'";
    $result_check = mysqli_query($conn, $sql_check);
    $checkpass = "SELECT * FROM yt WHERE password='$pass'";
    $resultpass = mysqli_query($conn, $checkpass);
    if (mysqli_num_rows($result_check) > 0 && mysqli_num_rows($resultpass) > 0) {
        $row = mysqli_fetch_assoc($result_check);
        $numpeople = $row['numppl'];
        $_SESSION['numppl'] = $numpeople;     
        header("Location: landingpage.php");
        exit();
    } else if(mysqli_num_rows($result_check) < 1) {
        header("Location: login.php?error=Email has never been registered");
        exit();
    } else if(mysqli_num_rows($resultpass) < 1) {
        header("Location: login.php?error=Wrong Password");
        exit();
    }


    mysqli_close($conn);
}
}
?>
