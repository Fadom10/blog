<?php

require_once '../includes/config.php';

$posts = get_all_posts();


//APPUI ENVOYER
if (isset($_POST['submit'])) {
    create_post($_POST['titre'], $_POST['article'], $_POST['cat']);
    header('location:index.php');
}

//APPUI ENVOYER
if (isset($_POST['crea_cat'])) {
    create_cat($_POST['new_cat']);
    header('location:index.php');
}

//APPUI SUPPR
if (isset($_POST['delete'])) {
    delete_post($_POST['titre']);
    header('location:index.php');
}

if (isset($_GET['del'])) {
    $getid = intval($_GET['del']);
    delete_post($getid);
    header('location:index.php');
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
        <h1 class="text-center">Blog</h1>
        <HR size=2 width="100%">
        <div class="creation">

            <!--DEBUT FORMULAIRE DE POST -->
            <div class="post">
                <form method="post" action="">
                    <label for="titre">Titre : </label><input required type="text" name="titre" id="titre" placeholder="Entrez le titre..." maxlength="50" /><br />

                    <label for="cat">Catégorie:</label><br />
                    <select name="cat" id="cat">
                        <?php

                        global $db;
                        $reponse = $db->query("SELECT * FROM cat");

                        while ($donnees = $reponse->fetch()) {
                            ?>
                            <option value="<?= $donnees['id']; ?>"><?php echo $donnees['categorie']; ?></option><br>
                        <?php
                        }

                        $reponse->closeCursor();

                        ?>
                    </select> <br>
                    <label for="article">Article : </label><br /><textarea required name="article" id="article" placeholder="Ecrivez votre article ici..." cols="30" rows="4"></textarea><br />
                    <input type="submit" name="submit" id="submit" value="Envoyer" />
                </form>
            </div>
            <HR size=2 width="100%">
            <!-- FIN DU FORMULAIRE-->
        </div>

        <form method="post" action="">
            <label for="titre">Creer une catégorie: </label><input required type="text" name="new_cat" id="new_cat" placeholder="Entrez la catégorie..." maxlength="50" /><br />
            <input type="submit" name="crea_cat" id="crea_cat" value="Creer" />
        </form>
        <HR size=2 width="100%">

        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-4">
                    <h2><?= $post['title'] ?></h2>
                    <i><h3><?= get_cat_by_id($post['id_cat']) ?></h3></i>
                    <p><?= $post['content'] ?></p>

                    <a class="btn btn-primary " href="index.php?del=<?= $post['id'] ?>" role="button" id="supp" name="supp">Supprimer</a>

                    <a class="btn btn-primary " href="../includes/modif.php?num=<?= $post['id'] ?>" role="button" id="modif" name="modif">Modifier</a>


                    <HR size=2 width="100%">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
<style>


</style>