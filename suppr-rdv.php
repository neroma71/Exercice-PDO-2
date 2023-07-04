<?php
    require('connexion.php');
    if (isset($_GET['suppr_rdv'])) // Si l'on demande de supprimer une news.
{
    // Alors on supprime la news correspondante.
    // On protège la variable « id » avec une requete préparée pour éviter une faille SQL.
   $req = $db->prepare("DELETE FROM appointments WHERE id=:id");
    if($req->execute(array(
        'id'=> $_GET['suppr_rdv']
    )));
    header("location: liste-rendezvous.php");
}
?>