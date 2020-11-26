<html>
    <head>
        <title>ALERT</title>
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
            $user=$_POST['user'];
            $password=$_POST['pass'];
            if(!$user || !$password ){
                echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">FAILURE</h1>
                    <div class = "alert-message">
                        <p>LOGIN FAILED. ALL FIELDS ARE MANDATORY</p>
                    </div>
                    <a href = "admin-login.html"><button class = "to-go">RETRY</button></a>
              </div>
                ';
            }
            else{
                $check = "SELECT * FROM admin WHERE Username = '{$user}'";
                $check_query = mysqli_query($conn,$check);
                
                if(mysqli_num_rows($check_query)>0){
                    while($rows=mysqli_fetch_array($check_query)){
                        if($rows['Username'] !== $username && $rows['Password'] !== $password){
                             echo '
                             <div class = "alert-box">
                                <h1 class = "alert-text">FAILURE</h1>
                                <div class = "alert-message">
                                    <p>USERNAME/PASSWORD NOT MATCHING. PLEASE TRY AGAIN</p>
                                </div>
                                <a href = "admin-login.html"><button class = "to-go">RETRY</button></a>
                            </div>
                          ';
                        }
                        else{
                             echo '
                             <div class = "alert-box">
                                <h1 class = "alert-text">SUCCESS</h1>
                                    <div class = "alert-message">
                                        <p>LOGIN SUCCESSFUL. PLEASE CONTINUE</p>
                                    </div>
                                    <a href = "admin-dashboard.php"><button class = "to-go">CONTINUE</button></a>
                            </div>
                             ';
                            $_SESSION['Username'] = 'ADMIN';
                        }
                    }
                }
                else{
                    echo '
                           <div class = "alert-box">
                                <h1 class = "alert-text">FAILURE</h1>
                                <div class = "alert-message">
                                    <p>USERNAME/PASSWORD NOT MATCHING. PLEASE TRY AGAIN</p>
                                </div>
                                <a href = "admin-login.php"><button class = "to-go">RETRY</button></a>
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