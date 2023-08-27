<!DOCTYPE html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h1>Hasil</h2>
    <div>
        <?php 
            $angka1 = $_POST['angkake1'];
            $angka2 = $_POST['angkake2'];
            $operator = $_POST['operasi'];

            if($_POST['operasi'] == 'tambah')
            {
                echo $_POST['angkake1'] + $_POST['angkake2'];
            }
            else if($_POST['operasi'] == 'kurang')
            {
                echo $_POST['angkake1'] - $_POST['angkake2'];
            }
            else if($_POST['operasi'] == 'kali')
            {
                echo $_POST['angkake1'] * $_POST['angkake2'];
            }
            else
            {
                echo $_POST['angkake1'] / $_POST['angkake2'];
            }
        
        
        ?>
    </div>
</body>
</html>