<!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="utf-8" /> 
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Liste des patients</title>
       <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>Listes des news</h1>
        </header>
<section>
<h2><a href="ajout_patients.php">ajouter un patients</a></h2>
<a href="index.php">retour à l'accueil</a>
<?php
require_once ('connexion.php'); 
//-----------------------------------------------------
// Vérification 1 : est-ce qu'on veut poster une news ?
//-----------------------------------------------------

if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthdate']) && isset($_POST['phone']) && isset($_POST['mail']))
{
    $lastname = ($_POST['lastname']);
    $firstname = ($_POST['firstname']);
    $birthdate = ($_POST['birthdate']);
    $birthdate = ($_POST['phone']);
    $mail = ($_POST['mail']);
    if ($_POST['modifier_news'] == 0){
        // Ce n'est pas une modification, on crée une nouvelle entrée dans la table.
        $req = $db->prepare('INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES(:lastname, :firstname, :birthdate, :phone, :mail)');
        if($req->execute(array(
            'lastname'=>$_POST['lastname'],
            'firstname'=>$_POST['firstname'],
            'birthdate'=>$_POST['birthdate'],
            'phone'=>$_POST['phone'],
            'mail'=>$_POST['mail'],
        )));
    }else
    {
        $_POST['modifier_news'] = (int)$_POST['modifier_news'];
       
    
        $req = $db->prepare("UPDATE patients SET lastname=:lastname, firstname=:firstname, birthdate=:birthdate, phone=:phone, mail=:mail WHERE id=:id");
        if($req->execute(array(
            'lastname'=>$_POST['lastname'],
            'firstname'=>$_POST['firstname'],
            'birthdate'=>$_POST['birthdate'],
            'phone'=>$_POST['phone'],
            'mail'=>$_POST['mail'],
            'id'=>$_POST['modifier_news']
        )));
    }
}
if (isset($_GET['supprimer_news'])) 
{
   $req = $db->prepare("DELETE FROM patients WHERE id=:id");
    if($req->execute(array(
        'id'=> $_GET['supprimer_news']
    )));
}
?>
<table>
    <tr>
<th>Modifier</th>
<th>Supprimer</th>
<th>Titre</th>
</tr>
<?php
$req = $db->query('SELECT * FROM patients ORDER BY id DESC');
 while ($patients = $req->fetch()){
?>
<tr>
<td><?php echo '<a href="ajout_patients.php?modifier_news=' . $patients['id'] . '">'; ?>Modifier</td>
<td><?php echo '<a href="liste_patients.php?supprimer_news=' . $patients['id'] . '">'; ?>Supprimer</td>
<td><?php echo htmlspecialchars($patients['lastname']."-".$patients['firstname']); ?></td>
</tr>
<?php
} // Fin de la boucle qui liste les news.
?>
</table>
</section>
</body>
</html>