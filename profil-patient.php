<?php
        require_once('connexion.php');
    if(isset($_GET['profil'])){
        $profil = (int)$_GET['profil'];
    }
         $req = 'SELECT * FROM patients WHERE id = :profil ';
            $requete = $db->prepare($req);
            $requete->bindValue(":profil", $profil, PDO::PARAM_INT);
            $requete->execute();
       $patientTemp = $requete->fetchALL();
       $patient = $patientTemp[0];
        
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
        
            <?php 
                 $req = $db->prepare('SELECT * FROM appointments WHERE idPatients = :idPatients');
                 $req->bindValue(":idPatients", $patient['id'], PDO::PARAM_INT);
                 $req->execute();
                    $rdvTemp = $req->fetchAll();
                    //ici on récupéère un tableau à l'index 0 qui contient un autre tableau
                    if(isset($rdvTemp) && !empty($rdvTemp)){
                        $rdv = $rdvTemp[0];
                    }else{
                        echo "il n'y a pas de renez-vous";
                    }
            ?>
            <p>prenom : <?php echo $patient['lastname'];?></p>
            <p> nom : <?php echo $patient['firstname']; ?></p>
            <p>date de naissance : <?php echo $patient['birthdate']; ?></p>
            <p>téléphone : <?php echo $patient['phone']; ?></p>
            <p>email: <?php echo $patient['mail']; ?></p>
            <?php if(isset($rdv['dateHour']) && !empty($rdv['dateHour'])){
                echo "<h3>vos rendez-vous :</h3>".$rdv['dateHour'];
            }else{
                echo "il n'y a pas de rendez-vous";
            }
            
            ?>

           
    </section>
</body>
</html>