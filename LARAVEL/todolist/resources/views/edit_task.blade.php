<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Task - TODO List App</title>
</head>
<body>
    <div id="wrapper">
        <h1>
            Edit a Task - TODO List App
        </h1>
        @if($errors->any())
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
        @endif
        <form method="POST" action="/update">
            @csrf
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
            <div>
                <input type="text" placeholder="Description" name="description" value="<?php echo $task['description'] ?>">
            </div>
            <div>
                <input type="date" name="do_date" value="<?php echo $task['do_date'] ?>">
            </div>
                
            <div style="margin-top: 16px;">
                <input type="submit" value="edit ">
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