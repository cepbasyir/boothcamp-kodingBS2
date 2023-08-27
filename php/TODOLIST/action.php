<?php

    session_start();
    $conn = new mysqli('localhost', 'root', '', 'todolist');
    $fkUser_id = $_SESSION['user']['id'];

    
    if(isset($_POST['action']) )
    {
        if($_POST['action'] == 'add')
        {
        $description = $_POST['description'];
        $do_date = $_POST['do_date'];

        $result = $conn->query("INSERT INTO Task (description, do_date, fkUser_id) VALUES ('$description', '$do_date', $fkUser_id)" );

        if(!$result)
        {
            array_push($errors, 'Gagal menambah tugas.');
        }

        header('Location: http://localhost/boothcampbs2/php/todolist');
        
    }
    
    if($_POST['action'] == 'delete')
    {
        $id = $_POST['id'];
        
        $result = $conn->query("DELETE FROM Task WHERE ID = $id");
        
        header('Location: http://localhost/boothcampbs2/php/todolist');
        
        }
    }


?>