<!DOCTYPE html>
<head>
    <title>Calculator</title>
</head>
<body>
    <h2>Calculator</h2>
    <form method="post" action="calculator_tujuan.php">
        Angka pertama: <input type="number" name="angkake1" placeholder="angka pertama"></input><br><br>
        Angka kedua: <input type="number" name="angkake2" placeholder="angka kedua"></input><br><br>
        Operasi Matematika:
        <select name="operasi">
        <option value="tambah">+</option>
        <option value="kurang">-</option>
        <option value="kali">*</option>
        <option value="bagi">/</option>
        </select>
        <input type="submit" value="KIRIM"></input>
    </form>
    
</body>
</html>