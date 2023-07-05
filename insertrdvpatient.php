<?php
    if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthdate']) && isset($_POST['phone']) && isset($_POST['mail'])){
     require_once ('connexion.php'); 
    $req = ('INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUE (:lastname, :firstname, :birthdate, :phone, :mail )');
        $rdvp = $db->prepare($req);
        $rdvp->execute([
            'lastname'=>$_POST['lastname'],
            'firstname'=>$_POST['firstname'],
            'birthdate'=>$_POST['birthdate'],
            'phone'=>$_POST['phone'],
            'mail'=>$_POST['mail'],
        ]);

    }

    $req = $db->query('SELECT id FROM patients ORDER BY id DESC LIMIT 1');
    $patients = $req->fetch();
    $myId = $patients['id'];

if(isset($_POST['dateHour'])){
    $_POST['idPatients'] = $myId;
    require_once ('connexion.php'); 
        $req = ('INSERT INTO appointments (dateHour, idPatients)  VALUE (:dateHour, :idPatients)');
        $rdv = $db->prepare($req);
        $rdv->execute([
            'dateHour'=>$_POST['dateHour'],
            'idPatients'=>$_POST['idPatients']
        ]);
        header("location: index.php");
    }

   
?>