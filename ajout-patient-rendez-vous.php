<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="insertrdvpatient.php" method="post">
<p>
<label>date rdv :</label>
<input type="datetime-local" name="dateHour">
</p>
<label>prenom :</label>
        <input type="text" name="firstname">
    </select>
    <p>
    <label>nom :</label>
        <input type="text" name="lastname">
    </p>
    <label>age :</label>
        <input type="date" name="birthdate">
    </p>
    <p>
    <label>téléphone :</label>
        <input type="text" name="phone">
    </p>
    <p>
    <label>mail :</label>
        <input type="mail" name="mail">
    </p>
    <input type="submit" value="envoyer">
</form>
</body>
</html>