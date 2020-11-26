<html>
    <head>
        <title>STORY-HUB</title>
        <link rel="stylesheet" href="story-hub.css" />
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class = "navbar">
            <h1 class = "logo">ZONIX-STORY-HUB</h1>
            <a href = "sign-in.php">
                <button class = "log-out create">
                    <span class="glyphicon glyphicon-log-in"></span> CREATE STORY
                </button>
            </a>
            <a href = "admin-login.php">
                <button class = "log-out">
                    <span class="glyphicon glyphicon-user"></span> ADMIN PANNEL
                </button>
            </a>
        </div>
        <?php
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "storyhub";
         $conn = mysqli_connect($servername,$username,$password,$dbname);
         if($conn){
             $check = "SELECT * FROM feed";
             $check_query = mysqli_query($conn,$check);
             
             if(mysqli_num_rows($check_query)>0){
                  while($rows=mysqli_fetch_array($check_query)){
                      echo '
                      <div class = "story-board">
                          <h1 class = "story-title">'.$rows['Subject'].'</h1>
                          <div class = "story-body">
                              <p class = "story-content">'.$rows['Body'].'</p>
                          </div>
                          <div class = "credits"><h3>'.$rows['Username'].'</h3></div>
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