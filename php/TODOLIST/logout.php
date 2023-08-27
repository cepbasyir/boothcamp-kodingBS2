<?php

    session_start();
    session_destroy();
    header("Location: http://localhost/boothcampbs2/php/todolist/login.php");

?>