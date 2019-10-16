<?php 


require_once '../includes/config.php';

if (isset($_POST['update'])) {
    update_post($_GET['num'],$_POST['titre'],$_POST['article']);
    header('location: ../public/index.php');
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Blog</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <h1 class="text-center">EDITION</h1>
        <HR size=2 width="100%">
        <div class="creation">

            <!--DEBUT FORMULAIRE DE POST -->
            <div class="post">
                <form method="post" action="">
                    <?php $_GET['num'];
                     ?>
                    <label for="titre">Titre : </label><input required type="text" name="titre" id="titre" value="<?= title($_GET['num']) ?>" placeholder="Entrez le titre..." maxlength="50" > <br />

                    <label for="article">Contenu : </label><br /><input required  type="text"  name="article" id="article" value="<?= content($_GET['num']) ?>" placeholder="Ecrivez votre article ici..." cols="30" rows="4"></textarea><br />
                    <input type="submit" name="update" id="update" value="Modifier" />
                </form>
            </div>
            <HR size=2 width="100%">
            <!-- FIN DU FORMULAIRE-->
        </div>
</body>
</html>