<?php
/*ici on passe en get le parametre récupéré dans le lien de la page list-renezvous.php*/
 $modif= $_GET['modif'];
   
 require_once('connexion.php');
    $req = $db->prepare('SELECT * FROM appointments WHERE id=:id');
    $req->bindValue(":id", $modif, PDO::PARAM_INT);

    $req->execute();
    $modif = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
<form method="post" action="modif-rdv.php">
    <input type="datetime-local" name="dateHour" value="<?php echo $modif['dateHour']; ?>">
   <input type="submit" value="envoyer"/>
</body>
</html>