<?php 


session_start(); 
include("basic.php");
include("sql.php");

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['numpeople'])) {

$email = $_POST['email'];
$pass = $_POST['password'];
$numpeople = $_POST['numpeople'];
$_SESSION['numppl'] = $numpeople;
if (empty($email)) {
    header("Location: register.php?error=Email is required");
    exit();
}else if(empty($pass)){
    header("Location: register.php?error=Password is required");
    exit();
}else{
    $sql_check = "SELECT * FROM yt WHERE email='$email'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        header("Location: register.php?error=Email already exists");
        exit();
    }

    $sql = "INSERT INTO  yt (email, password, numppl)
            VALUES ('$email', '$pass', '$numpeople')";
    $result = mysqli_query($conn, $sql);

    header("Location: landingpage.php");
    mysqli_close($conn);
}
}
?>
