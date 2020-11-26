<html>
    <head>
        <title>ALERT</title>
        <link rel="stylesheet" href="alert-style.css">
    </head>
    <body>
        <div class = 'alert-box'>
            <h1 class = "alert-text">SUCCESS</h1>
            <div class = "alert-message">
                <p>YOU HAVE BEEN SUCCESSFULLY LOGGED-OUT. ENJOY THE STORIES</p>
            </div>
            <a href = "stories.php"><button class = "to-go">CONTINUE</button></a>
        </div>
        <?php
        session_start();
        session_destroy();
        ?>
    </body>
</html>