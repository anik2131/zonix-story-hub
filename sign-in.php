<html>
    <head>
        <title>SIGN-IN</title>
        <link rel="stylesheet" href = "neumorphic_style.css" />
    </head>
    <body>
          <?php
        session_start();
        session_destroy();
        ?>
        <form action = "login-alert.php" method = "post">
            <div class = 'login-card'>
                <h1 class = 'logo'>ZONIX-STORY-HUB</h1>
                    <div class = 'text-boxes'>
                        <input type = 'text' placeholder="USERNAME" name = "user" id = "user" />
                        <br/><br/>
                        <input type = 'password' placeholder="PASSWORD" name = "pass" id = "pass" />
                    </div>
                    <div class = 'button'>
                        <input type = "submit" class = 'login-button' value="LOGIN" />
                    </div>
                    <div class = 'new-user'>
                        <a href = 'sign-up.php'>NEW USER? SIGN UP</a>
                    </div>
                </div>
        </form>
    </body>
</html>