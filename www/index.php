<?php
require 'connect.php';
require 'listFunction.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=  '';
    $description = '';
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['description'])){
        $description = $_POST['description'];

    }
    insertArticle($bdd,$name,$description);
    die(header("Location: ./index.php"));
}
$result = FetchAllData($bdd);
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
            <form action="/" method="post">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="description">Password</label>
                    <input type="text" class="form-control" id="description" placeholder="description" name="description">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div  class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>

                </tr>
                </thead>
                <tbody>
                <?php  foreach($result as $value): ?>
                <tr>
                    <td> <?=$value['id'];?></td>
                    <td> <?=$value['name'];?></td>
                    <td> <?=$value['description'];?></td>
                    <td><a href="modify.php?id=<?=$value['id'];?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                    <td><a href="delete.php?id=<?=$value['id'];?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>