<!DOCTYPE html>
<html>
<head>
    <title>Cat Walk</title>
</head>
<body>
<form method="post">
    <label for="minutes">Minutes per walk:</label>
    <input type="number" name="minutes" id="minutes" required min="1" max="50"><br>

    <label for="walks">Number of walks per day:</label>
    <input type="number" name="walks" id="walks" required min="1" max="10"><br>

    <label for="calories">Calories per day:</label>
    <input type="number" name="calories" id="calories" required min="100" max="4000"><br>

    <input type="submit" name="submit" value="Check"><br>
</form>

<?php
if (isset($_POST['submit'])) {
    $minutes = $_POST['minutes'];
    $walks = $_POST['walks'];
    $calories = $_POST['calories'];

    $burned_calories = $minutes * $walks * 5;
    $percentage = ($burned_calories / $calories) * 100;

    if ($percentage >= 50) {
        echo "Yes, the walk for your cat is enough. Burned calories per day: $burned_calories.";
    } else {
        echo "No, the walk for your cat is not enough. Burned calories per day: $burned_calories.";
    }
}
?>
</body>
</html>
