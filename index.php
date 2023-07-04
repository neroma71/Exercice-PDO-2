<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôpital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Bienvenu dans mon hôpital</h1>
</header>
<section>
    <a href="ajout-patient.php">ajouter un patient</a>
    <?php
        require('connexion.php');

        $req = $db->query('SELECT * FROM patients ORDER by id DESC');
        $patients = $req->fetchALL();
?>
    <?php  foreach($patients as $patient): ?>
        <p><?php echo $patient['firstname']." ". $patient['lastname']; ?><?php echo '<a href="profil-patient.php?profil='. $patient['id'] .'">'; ?> profile complet</a></p>
    <?php endforeach; ?>
</section>
</body>
</html>