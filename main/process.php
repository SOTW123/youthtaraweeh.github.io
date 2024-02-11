<?php 
    include("basic.php");

    session_start(); // Start session
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        include("database.php");

        // Check if email already exists in the database
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($result) > 0) {
            // Email already exists, show error message
            echo "Email already exists, please choose a different email.";
        } else {
            // Email does not exist, proceed with registration
            $sql = "INSERT INTO users (email, username, password)
                    VALUES ('$email','$username', '$password')";

            try {
                if(mysqli_query($conn, $sql)) {
                    echo "CONNECTION SUCCESSFUL";
                    // Set a session variable to indicate successful registration
                    $_SESSION["registration_success"] = true;
                } else {
                    throw new Exception(mysqli_error($conn));
                }
            } catch(Exception $e) {
                echo "CAUGHT: " . $e->getMessage();
            }
        }
        mysqli_close($conn);
    }

    // Check if registration success message needs to be displayed
    if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"] === true) {
        // Redirect to page.php only if registration was successful
        header("Location: page.php");
        // Unset session variable to prevent message from displaying on subsequent page loads
        unset($_SESSION["registration_success"]);
    }
    
?>
<?php
        session_start(); // Start session
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];

            include("database.php");

            // Check if email already exists in the database
            $check_query = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($result) > 0) {
                // Email already exists, show error message
                echo "Email already exists, please choose a different email.";
            } else {
                // Email does not exist, proceed with registration
                $sql = "INSERT INTO users (email, username, password)
                        VALUES ('$email','$username', '$password')";

                try {
                    if(mysqli_query($conn, $sql)) {
                        echo "CONNECTION SUCCESSFUL";
                        // Set a session variable to indicate successful registration
                        $_SESSION["registration_success"] = true;
                    } else {
                        throw new Exception(mysqli_error($conn));
                    }
                } catch(Exception $e) {
                    echo "CAUGHT: " . $e->getMessage();
                }
            }
            mysqli_close($conn);
        }

        // Check if registration success message needs to be displayed
        if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"] === true) {
            // Redirect to page.php only if registration was successful
            header("Location: page.php");
            // Unset session variable to prevent message from displaying on subsequent page loads
            unset($_SESSION["registration_success"]);
        }
        ?>