<?php
    session_start();
    $errors = [];
    $conn = new mysqli('localhost', 'root', '', 'todolist');
    
    if(isset($_POST['action']) )
    {
        if($_POST['action'] == 'login')
        {
            if(!isset($_POST['username']) || !isset($_POST['password']) )
            {
                array_push($errors, 'semua field harus di isi.');
            }
            else
            {
               $username = $_POST['username'];
               $password = $_POST['password'];

               $result = $conn->query("SELECT * FROM User WHERE username = '$username' AND password = '$password' ");

               if($result->num_rows > 0 )
               {
                $result = $result->fetch_assoc();
                $fullname = $result['fullname'];
                $id = $result['ID'];

                session_start();
                $_SESSION['user'] = [
                    'username' => $username,
                    'fullname' => $fullname,
                    'id' => $id
                ];
                header ("Location: http://localhost/boothcampbs2/php/todolist/index.php");
               }
               else
               {
                array_push($errors, 'Username atau password salah.');
               }
            }        
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to TODO List App</title>
</head>
<body>
    <div id="wrapper">
        <h1>
            Login to TODO List App
        </h1>
        <form method="POST" action="">
            <input type="hidden" name="action" value="login">
            <div>
                <input type="text" placeholder="Enter Username" name="username">
            </div>
            <div>
                <input type="password" placeholder="Enter Password" name="password">
            </div>
        
            <?php
                foreach($errors as $error)
                {
                    echo "<div>$error</div>";
                }
            
            ?>
            <div style="margin-top: 16px;">
                <input type="submit" value="login ">
            </div>
        </form>
    </div>
</body>

<style>
    #wrapper {
        max-width: 480px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 64px;
        border: 1px solid black;
        padding: 16px;
        background-color: cadetblue;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
    h1 {
        text-shadow: 2px 2px 4px #ddd;
    }
    input {
        width: 100%;
        padding: 8px;
        /* text-align: center; */
    }
    * {
        box-sizing: border-box;
    }
</style>
</html>