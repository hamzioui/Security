<?php
ob_start();
require 'connect.php';
require 'listFunction.php';

if(isset($_GET['id'])){
if(is_numeric($_GET['id']) === true){
$id = $_GET['id'];
    $result = FetchOneData($bdd,$id);
    if($result === false){
        die(header("Location: ./index.php"));
    }
}}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=  '';
    $description = '';
    if(isset($_POST['name']) && isset($_POST['description'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        updateArticle($bdd,$id,$name,$description);
        die(header("Location: ./index.php"));
    }else{
        echo "error";
        sleep(3);
        die(header("Location: ./index.php"));
    }

}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Nom" value="<?=$result['name'];?>">
                </div>
                <div class="form-group">
                    <label for="description">Password</label>
                    <input type="text" class="form-control" id="description" placeholder="description" name="description" value="<?=$result['description'];?>">
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>

        </div>
    </div>

</div>

</body>
</html>