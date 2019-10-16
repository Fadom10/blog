<?php

function get_all_posts()
{
    global $db;
    $sth = $db->query("SELECT * FROM posts");
    return $sth->fetchAll();
}

//DEBUT GRUD

//CREATION
function create_post($title,$content, $id_cat)
{
    global $db;
    $creation = $db->prepare("Insert into posts(title,content, id_cat) values(?,?, ?)");
    $creation -> execute(array($title,$content,$id_cat));
}

function create_cat($categorie)
{
    global $db;
    $creation = $db->prepare("Insert into cat(categorie) values(?)");
    $creation -> execute(array($categorie));
}

//RETRIEVE
//UPDATE
function update_post($id,$title,$content)
{
    global $db;
    $modif = $db->prepare("UPDATE posts SET title = ? ,content = ? where id=?");
    $modif -> execute(array($title,$content,$id));
}

//DELETE
function delete_post($id)
{
    global $db;
    $supp = $db->prepare("DELETE FROM posts where id = ?");
    $supp -> execute(array($id));
}

function title($num){

    global $db;
    $titre = $db->prepare("SELECT title FROM posts where id = ?");
    $titre -> execute(array($num));
    $res = $titre->fetch(\PDO::FETCH_ASSOC);

    return $res['title'];
}

function content($num){

    global $db;
    $contenu = $db->prepare("SELECT content FROM posts where id = ?");
    $contenu -> execute(array($num));
    $res = $contenu->fetch(\PDO::FETCH_ASSOC);

    return $res['content'];
}

function get_cat_by_id($num){

    global $db;
    $contenu = $db->prepare("SELECT * FROM cat where id = ?");
    $contenu -> execute(array($num));
    $res = $contenu->fetch(\PDO::FETCH_ASSOC);

    return $res['categorie'];
}

