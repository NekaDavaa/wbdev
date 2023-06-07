<!DOCTYPE html>
<html>
<head>
    <title>Karta za fitnes</title>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">


    <label for="nalichni">Nalichni pari:</label>
    <input type="text" name="nalichni" id="nalichni" step="0.01" min="10.00" max="1000.00" required> <br/>

<label>Gender:</label>
<input type="radio" name="gender" id="male" value="m" required>
    <label for="male">Male</label>
    <input type="radio" name="gender" id="female" value="f" required>
    <label for="female">Female</label>  <br/>


    <label for="godini">Godini:</label>
    <input type="number" name="godini" id="godini" step="1" min="5" max="105" required> <br/>

   <input type="submit">


</form>
</body>