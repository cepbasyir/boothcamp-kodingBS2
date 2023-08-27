<html>
    <head>
        <title>hello world!</title>
    </head>
    <body>
        <div>
            <?php

                echo 'hasil perkalian dari' . $_GET['angkapertama'] . ' dan ' . $_GET['angkakedua'] . ' adalah: ';
            ?>
        </div>
        <div>
            <?php
                echo $_GET['angkapertama'] * $_GET['angkakedua'];
            ?>
        </div>
        
    </body>
</html>