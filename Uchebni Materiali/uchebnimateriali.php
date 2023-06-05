<!DOCTYPE html>
<html>
<head>
    <title>Uchebni Materiali</title>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
    <label for="himikalki">Himikalki</label>
    <input type="number" name="himikalki" id="himikalki" required min="0" max="100"> <br>

    <label for="markeri">Markeri</label>
    <input type="number" name="markeri" id="markeri" required min="0" max="100"> <br>

    <label for="preparation">Preparation</label>
    <input type="number" step="0.01" name="preparation" id="preparation" required min="0" max="50"> <br>

    <label for="namalenie">Namalenie</label>
    <input type="number" name="namalenie" id="namalenie" required min="0" max="100"> <br>

    <input type="submit" name="submit" value="Check"><br>
</form>

<?php

$himikalki_price = 5.80;
$markeri_price = 7.20;
$preparat_price = 1.20;


if (isset($_POST['submit'])) {
    $himikalki = $_POST['himikalki'];
    $markeri = $_POST['markeri'];
    $preparation = $_POST['preparation'];
    $namalenie = $_POST['namalenie'];

    $total_price = ($himikalki * $himikalki_price) + ($markeri * $markeri_price) + ($preparation * $preparat_price);

    $namalenie_amount = ($total_price * $namalenie) / 100;
    $final_price = $total_price - $namalenie_amount;

  echo "Ani needs to collect " . number_format($final_price, 2) . " lv to pay the bill.";

}


?>

</body>