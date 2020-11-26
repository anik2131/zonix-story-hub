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
            <?php session_start();
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
            echo '<form action = "logout-success.php" method = "psot">
                <button class = "log-out">
                    <span class="glyphicon glyphicon-log-out"></span> LOGOUT
                </button>
            </form>
        </div>';
            
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "storyhub";
         $conn = mysqli_connect($servername,$username,$password,$dbname);
         if($conn){
             $sub = $_POST['sub'];
             $_SESSION['subedit'] = $sub;
             $check = "SELECT * FROM story WHERE Subject = '{$sub}'";
             $check_query = mysqli_query($conn,$check);
             
             if(mysqli_num_rows($check_query)>0){
                  while($rows=mysqli_fetch_array($check_query)){
                      echo '<form action = "story-edit-success.php" method = "post">
            <div class = "login-card">
                <h1 class = "logo">ZONIX-STORY-HUB</h1>
                    <div class = "text-boxes">
                        <input type = "text" placeholder="STORY TITLE" name = "subject" id = "subject" value = "'.$rows['Subject'].'" />
                        <br/><br/>
                        <textarea placeholder="SUBJECT (MAX 150 WORDS)" name = "body" id = "body" class = "subject">'.$rows['Body'].'</textarea>
                    </div>
                    <div class = "button">
                         <input type = "submit" class = "login-button" value = "CREATE" />
                    </div>
                </div>
        </form>';
                  }
             }
         }
            else{
            echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">FATAL ERROR</h1>
                    <div class = "alert-message">
                        <p>CHECK CONNECTION</p>
                    </div>
                     <a href = "sign-in.html"><button class = "to-go">RETRY</button></a>
              </div>
                '; 
            }
            ?>
             
    </body>
</html>