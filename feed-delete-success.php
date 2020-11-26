<html>
    <head>
        <title>CREATE STORY</title>
         <link rel="stylesheet" href="alert-style.css">
    </head>
    <body>
        <?php    
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "storyhub";
         $conn = mysqli_connect($servername,$username,$password,$dbname);
         if($conn){
             session_start();
                if(!$_SESSION['Username']){
                    header("Location: stories.php");
                    }
             $sub = $_POST['sub'];
             $delete = "Delete from feed where Subject = '$sub'";
             $delete_success = mysqli_query($conn,$delete);
             
             if($_SESSION['Username']!=='ADMIN'){
                              echo '
                                     <div class = "alert-box">
                        <h1 class = "alert-text">SUCCESS</h1>
                        <div class = "alert-message">
                            <p>STORY SUCCESFULLY DELETED. PLEASE CONTINUE</p>
                        </div>
                         <a href = "dashboard.php"><button class = "to-go">CONTINUE</button></a>
                    </div>
                ';
             }
             else{
                                               echo '
                                     <div class = "alert-box">
                        <h1 class = "alert-text">SUCCESS</h1>
                        <div class = "alert-message">
                            <p>STORY SUCCESFULLY DELETED. PLEASE CONTINUE</p>
                        </div>
                         <a href = "admin-dashboard.php"><button class = "to-go">CONTINUE</button></a>
                    </div>
                ';
             }


         }
          else{
           echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">FATAL ERROR</h1>
                    <div class = "alert-message">
                        <p>CHECK CONNECTION</p>
                    </div>
                     <a href = "sign-up.html"><button class = "to-go">RETRY</button></a>
              </div>
                '; 
        }
        ?>
    </body>
</html>