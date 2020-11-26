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
                if(!$_SESSION['Username']){
                    header("Location: stories.php");
                    }
            $subject=$_POST['subject'];
            $body=$_POST['body'];
            if(!$subject || !$body ){
                echo '
                <div class = "alert-box">
                    <h1 class = "alert-text">FAILURE</h1>
                    <div class = "alert-message">
                        <p>STORY NOT CREATED. ALL FIELDS ARE MANDATORY</p>
                    </div>
                    <a href = "dashboard.php"><button class = "to-go">RETRY</button></a>
              </div>
                ';
            }
            else{
                $uname = $_SESSION['Username'];
                if($uname!=='ADMIN'){
                    
                    $prev = $_SESSION['subedit'];
                    $insert = "UPDATE story
                    SET Subject = '$subject', Body= '$body'
                    WHERE Subject = '$prev'";
                    $ins = mysqli_query($conn,$insert);
                    
                    echo '
                    <div class = "alert-box">
                        <h1 class = "alert-text">SUCCESS</h1>
                        <div class = "alert-message">
                            <p>STORY SUCCESFULLY EDITED. PLEASE CONTINUE</p>
                        </div>
                         <a href = "dashboard.php"><button class = "to-go">CONTINUE</button></a>
                    </div>
                ';
                }
                else{
                    $prev = $_SESSION['subedit'];
                    
                    $insert = "UPDATE story
                    SET Subject = '$subject', Body= '$body'
                    WHERE Subject = '$prev'";
                    $ins = mysqli_query($conn,$insert);
                    echo '
                    <div class = "alert-box">
                        <h1 class = "alert-text">SUCCESS</h1>
                        <div class = "alert-message">
                            <p>STORY SUCCESFULLY EDITED. PLEASE CONTINUE</p>
                        </div>
                         <a href = "dashboard.php"><button class = "to-go">CONTINUE</button></a>
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
                     <a href = "sign-up.html"><button class = "to-go">RETRY</button></a>
              </div>
                '; 
        }
        ?>
    </body>
</html>