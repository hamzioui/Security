<?php
ob_start();

/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 19/03/19
 * Time: 16:19
 */
require 'connect.php';
require 'listFunction.php';
if(isset($_GET['id'])){
    if(is_numeric($_GET['id']) === true){
        $id = $_GET['id'];
        $count = deleteArticle($bdd,$id);
        if($count == 1){
            echo "success";
            sleep(3);
            die(header("Location: ./index.php"));
        }else{
            echo "error";
            sleep(3);
            die(header("Location: ./index.php"));
        }
    }
}