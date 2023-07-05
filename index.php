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
    <form action="recherche.php" method="get" id="monform">
        <label for="rechercher">rechercher un patient</label>
        <input type="search" name="terme" id="rechercher">
        <input type="submit" name="s" value="Rechercher">
    </form>
    <nav>
        <ul>
            <li>
        <a href="ajout_patients.php">ajouter un patient</a>
            </li>
            <li>
        <a href="ajout-rendezvous.php">ajouter un rendez-vous</a>
            </li>
            <li>
        <a href="liste-rendezvous.php">liste des rendez-vous</a>
        </li>
</ul>
    </nav>
</header>
<section>
    <?php
        require('connexion.php');

        $req = $db->query('SELECT * FROM patients ORDER by id DESC');
        $patients = $req->fetchALL();
?>
<article class="listepatients">
    <?php  foreach($patients as $patient): ?>
            <p><?php echo $patient['firstname']." ". $patient['lastname']; ?>
            <?php echo ' - <a href="profil-patient.php?profil='. $patient['id'] .'">'; ?> profile complet</a></p>
        <?php endforeach; ?>
        <article>
</section>
</body>
</html>