<?php 
    include("database.php");

    $sql = "INSERT INTO users (email, username, password)
            VALUES ('sora@gmail.com','sora', '123sora')";

    try {
        if(mysqli_query($conn, $sql)) {
            echo "HELLO conn sql";
        } else {
            throw new Exception(mysqli_error($conn));
        }
    } catch(Exception $e) {
        echo "CAUGHT: " . $e->getMessage();
    }
    mysqli_close($conn);

?>