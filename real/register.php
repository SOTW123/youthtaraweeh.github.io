<?php 
    include("basic.php")

    
?>
<html>
<head>
    <title>Login</title>
    <style>
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }form {
                width: 500px;
                padding: 30px;
                
                border-radius: 15px;
                animation: slideLeft 1s ease-in-out forwards;
            }input {
            
            height: 25px;
            width: 50%;
            border-radius: 15px;
            background-color: #35383d;
            color:aliceblue;
            transition: 1s;
        }
        input[type="submit"] {
            height: 50px;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #00432A; /* Darker green background on hover */
            
            transform: scale(1.2);
        }
    </style>
</head>
<body>
<form action="process.php" method="POST" class="f">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label for="email"> Email: </label> <input name="email"type="text" id="email"> <br><br>
            <label for="password"> Password: </label> <input name="password"type="password" id="password"> <br><br>
            <label for="numpeople"> Number of People in Your Group: </label> <input name="numpeople"type="number" id="numpeople" min="2" max="10"required><br><br>
            <input type="submit" class="submit">
        </form>
</body>
</html>