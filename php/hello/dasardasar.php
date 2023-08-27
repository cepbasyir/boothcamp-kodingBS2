<?php

    $daftarBuah = ['jeruk', 'melon', 'apel', 'semangka'];

    foreach($daftarBuah as $buah)
    {
    ?>
        <div>
            <?php echo $buah; ?>
        </div>

    <?php

    }
    ?>
    <div>
        <?php
            for($i = 0; $i < 10; $i++)
            {
                echo '<div>' . $i . '<?div>';
            }
        ?>
    </div>

<?php 
function perkalian($angka1, $angka2)
{
    $hasil = $angka1 * $angka2;

    echo $hasil;
}

perkalian(5, 10);

?>