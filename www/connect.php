<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 19/03/19
 * Time: 16:19
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try
{
    $bdd = new PDO('mysql:host=db;dbname=myDb;charset=utf8', 'user', 'test');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}