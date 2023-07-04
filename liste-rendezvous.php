<?php
        require('connexion.php');
        
        $req = $db->query('SELECT *, DATE_FORMAT(dateHour, "%d/%m/%Y %H:%i:%s") AS datefr FROM appointments ORDER by id DESC');
        $rdvs = $req->fetchALL();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
    <p>
        <a href="ajout-patient.php">ajouter un patient</a>
    </p>
    <p>
        <a href="ajout-rendezvous.php">ajouter un rendez-vous</a>
    </p>
<article class="listepatients">
    <?php  foreach($rdvs as $rdv): ?>
        <p>
            <?php echo $rdv['datefr']; ?><?php echo '<a href="profil-patient.php?profil='. $rdv['idPatients'] .'">'; ?> info rdv</a>
            <?php echo '<a href="suppr-rdv.php?suppr_rdv='. $rdv['id'] .'">'; ?> supprimer</a>
            <?php echo '<a href="modif1.php?modif='. $rdv['id'] .'">'; ?>modifier</a>
        </p>
        <?php endforeach; ?>
        <article>
</section>
</body>
</html>