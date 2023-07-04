
<!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Rédiger la page d'accueil</title>
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="css/news.min.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
       <script src="js/menu.min.js"></script>
 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <header>
            <h1>Page d'accueil</h1>
        </header>
<h3><a href="liste_news.php">Modifier l'accueil</a></h3><br />
    
   <?php
if (isset($_GET['modifier_news']))
{
    $modif_news = (int)$_GET['modifier_news'];
   require 'connexion.php'; 
    $req = $db->query('SELECT * FROM patients WHERE id='.$modif_news);
    while ($patients = $req->fetch()){
        $lastname = htmlspecialchars($patients['lastname']);
        $firstname = htmlspecialchars($patients['firstname']);
        $birthdate = htmlspecialchars($patients['birthdate']);
        $phone = htmlspecialchars($patients['phone']);
        $mail = htmlspecialchars($patients['mail']);
         $id_news = $modif_news; 
    }
}
else 
{
    $lastname = '';
    $firstname = '';
    $birthdate = '';
    $phone = '';
    $mail = '';
    $modif_news = 0; 
}       
?>
<form action="liste_news.php" method="post" enctype="multipart/form-data">
    <p>nom : <br /><input type="text" size="70" name="lastname" value="<?php echo $lastname; ?>" /></p>

  <p>Prenom: <br /><input type="text" size="70" name="firstname" value="<?php echo $firstname; ?>" /></p>

  <p>age: <br /><input type="date" size="70" name="birthdate" value="<?php echo $birthdate; ?>" /></p>

  <p>phone: <br /><input type="text" size="70" name="phone" value="<?php echo $phone; ?>" /></p>

  <p>mail: <br /><input type="text" size="70" name="mail" value="<?php echo $mail; ?>" /></p>
  
<input type="hidden" name="modifier_news" value="<?php echo $modif_news; ?>" />
    
    <input type="submit" value="Envoyer" />
</p>
</form>
 
<div id="lienretour">
<a href="index.php" id="lienretour">retour à l'accueil'</a>
        </div>
    </body>
</html>