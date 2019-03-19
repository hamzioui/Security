<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 19/03/19
 * Time: 16:28
 */

function FetchAllData($bdd){
    $sth = $bdd->prepare("SELECT * FROM article");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function FetchOneData($bdd,$id){
    $stmt = $bdd->prepare("SELECT * FROM article WHERE id=?");
    $stmt->execute([$id]);
    $count = $stmt->rowCount();
    if($count > 0){
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
        $article = false;
    }
    return $article;
}
function deleteArticle($bdd,$id){
    $stmt = $bdd->prepare("DELETE FROM article WHERE id = ?");
    $stmt->execute(array($id));
    $count = $stmt->rowCount();
    return $count;
}
function updateArticle($bdd,$id,$name,$description){
    $sql = "UPDATE article SET name=?, description=? WHERE id=?";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$name, $description, $id]);
    $count = $stmt->rowCount();
    return $count;
}
function insertArticle($bdd,$name,$description){
    $sql = "INSERT INTO article (name, description) VALUES (?, ?)";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$name, $description]);
    $count = $stmt->rowCount();
    return $count;
}