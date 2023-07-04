<?php
    if(!empty($_POST['daterdv'])){
        require_once('connexion.php');
        $req = 'INSERT INTO appointments(dateHour, idPatients) VALUES (:dateHour, :idPatients)';
        $rdv = $db->prepare($req);

        $rdv->execute([
            'dateHour'=>$_POST['titre'],
            'idPatients'=>$_POST['idPatients']
        ]);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <input type="date" name="dateHour">
    <select name="idPatients">
        <?php
        require_once('connexion.php');
    $requete = $db->query('SELECT * FROM patients ORDER BY id DESC');
    $patients = $requete->fetchALL();
        foreach($patients as $patient){
            echo"<option value=".$patient['id'].">".$patient['lastname']."</option>";
        }
        ?>
    </select>
    <input type="submit" value="ajouter">
</form>
</body>
</html>
