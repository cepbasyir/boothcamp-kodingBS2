<?php

    $errors = [];
    $conn = new mysqli('localhost', 'root', '', 'todolist');
    
    if(isset($_POST['action']) )
    {
        if($_POST['action'] == 'create')
        {
            if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['confirm_password']) || !isset($_POST['fullname']) )
            {
                array_push($errors, 'semua field harus di isi.');
            }
            else
            {
                if($_POST['password'] != $_POST['confirm_password'])
                {
                    array_push($errors, 'Konfirmasi password harus sama dengan password.');
                }
                else
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];

                    $result = $conn->query("SELECT * FROM User WHERE username = '$username' ");

                    if($result->num_rows > 0)
                    {   
                        array_push($errors, 'username sudah ada yang menggunakan.');
                    }
                    else
                    {
                        $result = $conn->query("INSERT INTO User (username, password, fullname) VALUES ('$username','$password', '$fullname') ");

                        if($result)
                        {
                            header ("Location: http://localhost/boothcampbs2/php/todolist/login.php");
                        }
                        else
                        {   
                            array_push($errors, 'Gagal menambah user.');
                        }
                    }

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
    <title>Register to TODO List App</title>
</head>
<body>
    <div id="wrapper">
        <h1>
            Register to TODO List App
        </h1>
        <form action="" method="POST">
            <input type="hidden" name="action" value="create">
            <div>
                <input type="text" placeholder="Enter Username" name="username">
            </div>
            <div>
                <input type="password" placeholder="Enter Password" name="password">
            </div>
            <div>                
            <input type="password" placeholder="Confirm Password" name="confirm_password">
            </div>
            <div>
                <input type="text" placeholder="Enter Fullname" name="fullname">
            </div>
            <?php
                foreach($errors as $error)
                {
                    echo "<div>$error</div>";
                }
            
            ?>
            <div style="margin-top: 16px;">
                <input type="submit" value="Register">
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