<?php
        require('connexion.php');
    if(isset($_GET['profil'])){
        $profil = (int)$_GET['profil'];
    }
         $req = 'SELECT * FROM patients WHERE id = :profil ';
            $requete = $db->prepare($req);
            $requete->bindValue(":profil", $profil, PDO::PARAM_INT);
            $requete->execute();
       $patients = $requete->fetchALL();
        
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche client</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>FICHE CLIENT</h1>
    </header>
    <section class="fiche_client">
         <?php  foreach($patients as $patient): ?>
            <p>prenom : <?php echo $patient['lastname']." nom : ". $patient['firstname']; ?></p>
            <p>date de naissance : <?php echo $patient['birthdate']; ?></p>
            <p>téléphone : <?php echo $patient['phone']; ?></p>
            <p>email: <?php echo $patient['mail']; ?></p>
         <?php endforeach ?>
    </section>
</body>
</html>