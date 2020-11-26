<html>
    <head>
        <title>SIGN-UP</title>
        <link rel="stylesheet" href = "neumorphic_style.css" />
    </head>
    <body>
        <?php
         session_start();
        session_destroy();
        ?>
        <form action = "insert-alert.php" method = "post">
            <div class = 'signup-card'>
                <h1 class = 'logo'>ZONIX-STORY-HUB</h1>
                <div class = 'text-boxes'>
                    <input type = 'text' placeholder="FULL NAME" name = "name" id = "name" />
                    <br/><br/>
                    <input type = 'text' placeholder="USERNAME" name = "user" id = "user" />
                    <br/><br/>
                    <input type = 'text' placeholder="EMAIL-ID" name = "email" id = "mail" />
                    <br/><br/>
                    <input type = 'password' placeholder="PASSWORD" name = "pass" id = "pass" />
                    <br/><br/>
                    <input type = 'password' placeholder="RE-ENTER PASSWORD" name = "re" id = "re" />
                </div>
                <div class = 'button'>
                    <input type = "submit" class = 'login-button' value="CREATE USER" />
                </div>
                <div class = 'old-user'>
                    <a href = 'sign-in.php'>ALREADY AN USER? SIGN IN</a>
                </div>
            </div>
        </form>
    </body>
</html>