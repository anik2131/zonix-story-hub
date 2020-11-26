<html>
    <head>
        <title>DASHBOARD</title>
        <link rel="stylesheet" href="dashboard.css">
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class = "navbar-dashboard">
            <h1 class = "logo">ZONIX-STORY-HUB</h1>
            <?php session_start();
            if(!$_SESSION['Username']){
                header("Location: stories.php");
            }
            echo'<h3 class = "name">WELCOME:'.$_SESSION['Username'].'</h3>'; ?>
            <form action = "logout-success.php" method = "psot">
                <button class = "log-out">
                    <span class="glyphicon glyphicon-log-out"></span> LOGOUT
                </button>
            </form>
        </div>
        
        <h3 class = "note">ADMIN POSTS ARE AUTO APPROVED</h3>
        
        <div class = "container">
            <a href = "create-story.php">
                <div class = "options">
                    <h1>CREATE</h1>
                </div>
            </a>
            <a href = "admin-approve-reject.php">
                <div class = "options">
                    <h1>APPROVE / REJECT</h1>
                </div>
            </a>
            <a href = "admin-delete-from-feed.php">
                <div class = "options">
                    <h1>DELETE FROM FEED</h1>
                </div>
            </a>
        </div>
    </body>
</html>