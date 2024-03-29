
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #005C3B, #333333); /* Dark green to dark gray gradient */
            color: #CCCCCC; /* Light gray text */
            min-height: 100vh; /* Ensure the body takes up at least the full viewport height */
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Stack children vertically */
        }

        header,
        nav,
        footer {
            background-color: #333333; /* Dark gray */
            padding: 20px;
            text-align: center;
        }
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-1000px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .main {
            width: 400px;
            height: 450px;
            border-radius: 25px;
            position: relative;
            top: 75px;
            left: 35%;
            background-color: #202225;
            animation: slideIn 1s ease-in-out forwards;
        }
        .f {
            margin: 50px 50px 50px 50px;
            font-size: 12px;
            text-align: center;
        }
        input {
            
            height: 25px;
            width: 75%;
            border-radius: 15px;
            background-color: #35383d;
            color:aliceblue;
        }
        input[type="submit"] {
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #00432A; /* Darker green background on hover */
            transform: scale(1.2);
        }
    </style>
    <nav>
        
        
    </nav>
    <div class="main">
        <form action="process.php" method="POST" class="f">
            <label for="email"> Email: </label> <input name="email"type="text" id="email" required> <br><br>
            <label for="username"> Username: </label> <input name="username"type="text" id="username" required> <br><br>
            <label for="password"> Password: </label> <input name="password"type="password" id="password" required> <br><br>
            <label for="numpeople"> Number of People in Your Group: </label> <input name="numpeople"type="number" id="numpeople" min="2" max="10"required><br><br>
            <input type="submit" class="submit">
        </form>
        
    </div>
    

</body>
</html>