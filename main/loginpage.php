<html>
    <head><title> Login </title>
    <style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #005C3B, #333333); /* Dark green to dark gray gradient */
    color: #CCCCCC; /* Light gray text */
    /*overflow-x: hidden; /* Prevent horizontal scrolling */
  }

  header {
    background-color: #333333; /* Dark gray */
    padding: 20px;
    text-align: center;
  }

  nav {
    background-color: #333333; /* Dark gray */
    padding: 10px;
    text-align: center;
  }

  nav ul {
    list-style-type: none;
  }

  nav ul li {
    display: inline;
    margin-right: 20px;
  }

  nav ul li a {
    color: #CCCCCC; /* Light gray text */
    text-decoration: none;
    font-size: 18px;
  }


  @keyframes slideIn {
    0% {
      opacity: 0;
      transform: rotate(90);
      transform: translateY(-100px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .title-box h2 {
    color: #00FF00; /* Electric green */
    font-size: 48px;
    margin-bottom: 20px;
  }

  footer {
    background-color: #333333; /* Dark gray */
    padding: 20px;
    text-align: center;
  }

  footer p {
    color: #CCCCCC; /* Light gray text */
    font-size: 16px;
  }
  /* Reset default browser styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
    overflow: hidden;
  font-family: Arial, sans-serif;
  background: linear-gradient(to bottom, #005C3B, #333333); /* Dark green to dark gray gradient */
  color: #CCCCCC; /* Light gray text */
  min-height: 100vh; /* Ensure the body takes up at least the full viewport height */
  display: inline-block; /* Use flexbox for layout */
  flex-direction: column; /* Stack children vertically */
}

header {
  background-color: #333333; /* Dark gray */
  padding: 20px;
  text-align: center;
}

nav {
  background-color: #333333; /* Dark gray */
  padding: 10px;
  text-align: center;
}

nav ul {
  list-style-type: none;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  color: #CCCCCC; /* Light gray text */
  text-decoration: none;
  font-size: 18px;
}

.container {
    
  max-width: 100%;
  margin: auto; /* Center the container horizontally */
  padding: 20px;
  text-align: center;
  position: relative;
  top: 100px;
  left: 35%;
  border-radius: 50%;
}

.title-box {
  background-color: #333333; /* Dark gray */
  padding: 40px;
  margin-bottom: 20px;
  animation: slideIn 2s ease-in-out forwards;
}

@keyframes slideIn {
  0% {
    opacity: 0;
    transform: translateY(-1000px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
a {
    color: rgb(62, 170, 0);
}
.title-box h2 {
  color: #00FF00; /* Electric green */
  font-size: 48px;
  margin-bottom: 20px;
}

footer {
  position: fixed;
  background-color: #333333; /* Dark gray */
  padding: 20px;
  text-align: center;
  bottom: 0; /* Position the footer at the bottom */
  width: 100%; /* Ensure the footer spans the full width */
}


p {
  color: #CCCCCC; /* Light gray text */
  font-size: 32px;
}

</style>
</head>
<body>
    <div class = "main">
        <div>

        </div>
    </div>
  
</body>
</html>
