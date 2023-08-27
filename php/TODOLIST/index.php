<?php
error_reporting();
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', '1');


    session_start();

    if(!isset($_SESSION['user']))
    {
        return header("Location: htpp://localhost/boothcampbs2/php/todolist/login.php");
    }

    $errors = [];
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
       }
    }

        $result = $conn->query("SELECT * FROM Task WHERE fkUser_id = '$fkUser_id' ");
        $tasks = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List App</title>
</head>
<body>
    <div id="wrapper">
        <h1>
            TODO List App
        </h1>
        <div>
             Selamat datang <?php echo $_SESSION['user']['fullname']; ?>. <a href="http://localhost/boothcampbs2/php/todolist/logout.php">Log Out</a>
        </div>
        <div id="task-list">
            <?PHP
                foreach($tasks as $task)
                {
            ?>
                <div class="task">
                    <div class="description">
                        <?php echo $task['description'] . '(' . $task['do_date'] . ')' ?>
                    </div>
                    <div class="action">
                        <a href="http://localhost/boothcampbs2/php/todolist/edit.task.php?id=<?php echo $task['ID']?>">
                            <button>Edit</button>            
                        </a>
                        <form action="action.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $task['ID'] ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <form action="action.php" method="POST">
            <input type="hidden" name="action" value="add">
            <input type="text" name="description">
            <input type="date" name="do_date">
            <input type="submit" value="add">
        </form>
        
    </div>
</body>

<style>
    .task, .action {
        display: flex;
    
    }
    .task {
        border-bottom: 1px solid gray;
    }
    .description {
        flex: 1;
        display: flex;
        align-items: center;
        padding-left: 16px ;
    }
    #wrapper {
        max-width: 480px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 64px;
        border: 1px solid gray;
        padding: 16px;
        background-color: cadetblue;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
    h1 {
        text-shadow: 2px 2px 4px #ddd;
    }
    input, button {
        
        padding: 8px;
        
    }
    * {
        box-sizing: border-box;
    }
    form{
        display: flex;
    }
    #task-list {
        min-height: 320px;
        border: 1px solid gray;
        margin-top: 16px;
        background-color: antiquewhite;
    }
    input[name="description"] {
        flex: 1;
    }
</style>
</html>