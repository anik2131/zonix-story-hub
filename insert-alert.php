<html>
    <head>
        <title>ALERT</title>
        <link rel="stylesheet" href="alert-style.css">
    </head>
    <body>
        <?php
        session_start();
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "storyhub";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        if($conn){
            $email=$_POST['email'];
            $name=$_POST['name'];
            $user=$_POST['user'];
            $password=$_POST['pass'];
            $repassword=$_POST['re'];
            
            if(!$name || !$user || !$email || !$password || !$repassword){
                echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">FAILURE</h1>
                    <div class = "alert-message">
                        <p>LOGIN FAILED. PLEASE CHECK USERNAME/PASSWORD</p>
                    </div>
                    <a href = "sign-up.html"><button class = "to-go">RETRY</button></a>
              </div>
                ';
            }
            
            else if($password!==$repassword){
                echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">FAILURE</h1>
                    <div class = "alert-message">
                        <p>PASSWORD NOT MATCHING. PLEASE TRY AGAIN</p>
                    </div>
                     <a href = "sign-up.html"><button class = "to-go">RETRY</button></a>
              </div>
                ';
            }
            
            else{
                $insert = "INSERT INTO users(Username,Name,Email,Password) VALUES('$user','$name','$email','$password')";
                $ins = mysqli_query($conn,$insert);
                echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">SUCCESS</h1>
                    <div class = "alert-message">
                        <p>LOGIN SUCCESSFUL. PLEASE CONTINUE</p>
                    </div>
                     <a href = "sign-in.php"><button class = "to-go">CONTINUE</button></a>
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