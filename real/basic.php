
<html>
    <head>
        <title>Home</title>
        <style>
            
            @import url('https://fonts.googleapis.com/css2?family=Honk&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
            @keyframes slideLeft {
                0% {
                opacity: 0;
                transform: translateX(-5000px);
                }
                100% {
                opacity: 1;
                transform: translateY(0);
                }
            }
            @keyframes slideDown {
                0% {
                opacity: 0;
                transform: translateY(-10000px);
                }
                100% {
                opacity: 1;
                transform: translateY(0);
                }
            }
            
            body {
                overflow: hidden;
                font-family: Orbitron;
                background-image: radial-gradient(#192734, #181818);
                color: #CCCCCC; /* Light gray text */
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
                /*overflow-x: hidden; /* Prevent horizontal scrolling */
            }
            
            
            
            

        </style>
    </head>
    <body>
        
        
        
        




        <script>
        document.addEventListener('mousemove', (e) => {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        
        document.body.style.background = `radial-gradient(at ${x * 100}% ${y * 100}%, #192734, #181818)`;
        });
        </script>
    </body>
</html>