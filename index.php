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
    <p>
        <a href="ajout-patient.php">ajouter un patient</a>
    </p>
    <p>
        <a href="ajout-rendezvous.php">ajouter un rendez-vous</a>
    </p>
    <p>
        <a href="liste-rendezvous.php">liste des rendez-vous</a>
    </p>
    <?php
        require('connexion.php');

        $req = $db->query('SELECT * FROM patients ORDER by id DESC');
        $patients = $req->fetchALL();
?>
<article class="listepatients">
    <?php  foreach($patients as $patient): ?>
            <p><?php echo $patient['firstname']." ". $patient['lastname']; ?><?php echo '<a href="profil-patient.php?profil='. $patient['id'] .'">'; ?> profile complet</a></p>
        <?php endforeach; ?>
        <article>
</section>
</body>
</html>