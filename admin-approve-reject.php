<html>
    <head>
        <title>STORY-HUB STORY APPROVAL</title>
        <link rel="stylesheet" href="story-hub.css" />
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class = "navbar">
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
        
        <?php
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "storyhub";
         $conn = mysqli_connect($servername,$username,$password,$dbname);
         if($conn){
             $uname = $_SESSION['Username'];
             $check = "SELECT * FROM story";
             $check_query = mysqli_query($conn,$check);
             
             if(mysqli_num_rows($check_query)>0){
                  while($rows=mysqli_fetch_array($check_query)){
                      echo '
                      <div class = "story-board">
                          <h1 class = "story-title">'.$rows['Subject'].'</h1>
                          <div class = "story-body">
                              <p class = "story-content">'.$rows['Body'].'</p>
                           </div>
                           <div class = "names"><h3>'.$rows['Username'].'</h3></div>
                          <form action = "content-delete-success.php" method = "post">
                              <input type = "hidden" name = "sub" value = "'.$rows['Subject'].'" />
                              <button class = "button">
                                  <span class="glyphicon glyphicon-remove"></span>
                              </button>
                         </form>
                         <form action = "admin-approve-success.php" method = "post">
                             <input type = "hidden" name = "sub" value = "'.$rows['Subject'].'" />
                             <button class = "button b1">
                                 <span class="glyphicon glyphicon-check"></span>
                             </button>
                        </form>
                    </div>
                      ';
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