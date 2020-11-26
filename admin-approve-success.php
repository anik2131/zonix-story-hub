<html>
    <head>
        <title>STORY-HUB EDIT</title>
        <link rel="stylesheet" href="alert-style.css" />
    </head>
    <body>
        
        <?php
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "storyhub";
         $conn = mysqli_connect($servername,$username,$password,$dbname);
         if($conn){
             $sub = $_POST['sub'];
             
             $check = "SELECT * FROM story where Subject = '$sub'";
             $check_query = mysqli_query($conn,$check);
             
             if(mysqli_num_rows($check_query)>0){
                  while($rows=mysqli_fetch_array($check_query)){
                      $un = $rows['Username'];
                      $sb = $rows['Subject'];
                      $bd = $rows['Body'];
                      $insert = "INSERT INTO feed (Username,Subject,Body) VALUES('$un','$sb','$bd')";
                      $insert_success = mysqli_query($conn,$insert);
                      $delete = "Delete from story where Subject = '$sb'";
                      $delete_success = mysqli_query($conn,$delete);
                  }
             }
             echo '
                                     <div class = "alert-box">
                        <h1 class = "alert-text">SUCCESS</h1>
                        <div class = "alert-message">
                            <p>STORY SUCCESFULLY APPROVED. PLEASE CONTINUE</p>
                        </div>
                         <a href = "admin-dashboard.php"><button class = "to-go">CONTINUE</button></a>
                    </div>
                ';
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