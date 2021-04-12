<?php

//To ways  to connect with  mysql database 1.mysqli 2.PDO  class (support multiple databases)

// $pdo = require_once "database.php";



/** @var $pdo \ PDO */

require_once "../../database.php";
require_once "../../functions.php";



$title = "";
$price = "";
$description= " ";

$product = [
    'image'=> ""
];

//echo $_SERVER['REQUEST_METHOD']."<br>";


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    require_once "../../validateproduct.php";

       if(empty($errors)){
        $stmt= $pdo->prepare("INSERT INTO products (title, image, description, price,create_date)

        VALUES (:title, :image, :description, :price, :date)");
        $stmt->bindValue(':title',$title);
        $stmt->bindValue(':image',$imgpath);
        $stmt->bindValue(':description',$description);
        $stmt->bindValue(':price',$price);
        $stmt->bindValue(':date',date('y-m-d H:i:s'));
        $stmt->execute();
        header('Location: index.php');
       }

}


?>


<?php include_once "../../views/partials/header.php";?>
<p> <a href="index.php" class="btn btn-secondary mt-3">Go Back To products</a></p>
    <h1>Create New Product</h1>
     <?php include_once "../../products/form.php";?>
    </body>
</html>