<?php
if (isset($_POST['dateHour'])) {
    require_once('connexion.php');
    $req = 'INSERT INTO appointments(dateHour, idPatients) VALUES (:dateHour, :idPatients)';
    $rdv = $db->prepare($req);

    $rdv->execute([
        'dateHour' => $_POST['dateHour'],
        'idPatients' => $_POST['idPatients']
    ]);
    header("location: liste-rendezvous.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Ajouter un rendez-vous</h1>
    </header>
    <section>
        <article>
            <form method="post" action="">
                <p>
                    <label>date du rendez-vous :</label>
                </p>
                <input type="datetime-local" name="dateHour">
                <p>
                    <label>Nom du patient :</label>
                </p>
                <p>
                    <select name="idPatients">
                        <?php
                        require_once('connexion.php');
                        $requete = $db->query('SELECT * FROM patients ORDER BY id DESC');
                        $patients = $requete->fetchALL();
                        foreach ($patients as $patient) {
                            echo "<option value=" . $patient['id'] . ">" . $patient['lastname'] . "</option>";
                        }
                        ?>
                    </select>
                </p>
                <input type="submit" value="ajouter">
            </form>
        </article>
    </section>
</body>

</html>