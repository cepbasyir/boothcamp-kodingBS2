<?php

    session_start();
    session_destroy();
    header("Location: http://localhost/boothcampbs2/todolist/login.php");

?>