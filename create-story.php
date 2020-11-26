<html>
    <head>
        <title>CREATE STORY</title>
        <link rel="stylesheet" href = "create-story.css" />
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class = "navbar">
            <h1 class = "logo-nav">ZONIX-STORY-HUB</h1>
            <?php              
            session_start();
                if(!$_SESSION['Username']){
                    header("Location: stories.php");
                    }
            $uname = $_SESSION['Username'];
            if($uname!=='ADMIN'){
                echo'<h3 class = "name">WELCOME:'.$_SESSION['Name'].'</h3>';
            }
            else{
                 echo'<h3 class = "name">WELCOME:'.$_SESSION['Username'].'</h3>'; 
            }
            ?>
            
            <form action = "logout-success.php" method = "psot">
                <button class = "log-out">
                    <span class="glyphicon glyphicon-log-out"></span> LOGOUT
                </button>
            </form>
        </div>
        
        <form action = "story-create-success.php" method = "post">
            <div class = 'login-card'>
                <h1 class = 'logo'>ZONIX-STORY-HUB</h1>
                    <div class = 'text-boxes'>
                        <input type = 'text' placeholder="STORY TITLE" name = "subject" id = "subject" />
                        <br/><br/>
                        <textarea placeholder="SUBJECT (MAX 150 WORDS)" name = "body" id = "body" class = "subject"></textarea>
                    </div>
                    <div class = 'button'>
                         <input type = "submit" class = 'login-button' value = "CREATE" />
                    </div>
                </div>
        </form>
    </body>
</html>