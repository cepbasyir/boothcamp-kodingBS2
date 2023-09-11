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
             Selamat datang {{'$fullname'}}. <a href="{{ url('/logout') }}">Log Out</a>
        </div>
        @if($errors->any())
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
        @endif
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
                        <a href="{{ url('/edit/' . $task['id']) }}">
                            <button>Edit</button>            
                        </a>
                        <form action="{{ url('/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <form action="{{ url('/add') }}" method="POST">
            @csrf
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