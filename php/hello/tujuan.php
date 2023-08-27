<!DOCTYPE html>
<head>
    <title>BMI Calculator</title>
</head>
<body>
    <h1>Hasil BMI Calculator</h1>
    <div>
        Nama Anda <?php echo $_POST['nama_orang'] ?>, berikut hasil BMI anda : 
    </div>
    <div>
        <?php 
            $berat = $_POST['berat_orang'];
            $tinggi = $_POST['tinggi_orang'];

            $tinggi = $tinggi / 100;

            $bmi = $berat/($tinggi**2);

            echo $bmi;
        
        ?>
    </div>
    <div>
        <?php

            if($bmi >= 25)
            {
                echo 'Anda Overweight';
            }
            else if($bmi >= 18.5 && $bmi <= 24.9)
            {
                echo ' Anda Ideal.';
            }
            else
            {
                echo ' Anda Underweight.';
            }
        
        
        ?>
    </div>
    
</body>
</html>