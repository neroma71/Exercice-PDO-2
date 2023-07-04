<?php
require_once('connexion.php');
$req = $db->prepare("UPDATE appointments SET dateHour=:dateHour,  WHERE id=:id");
        
$req->execute(array(
            'dateHour'=>$_POST['dateHour'],
            'id'=>$_POST['id'],
        ));
        header("location:liste-rendezvous.php");

?>
