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
            @csrf
            <input type="hidden" name="action" value="login">
            <div>
                <input type="text" placeholder="Enter Username" name="username">
            </div>
            <div>
                <input type="password" placeholder="Enter Password" name="password">
            </div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
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