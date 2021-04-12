<?php

//To ways  to connect with  mysql database 1.mysqli 2.PDO  class (support multiple databases)


require_once "../../database.php";
require_once "../../functions.php";

$id = $_GET['id'] ?? null;
if(!$id){
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$stmt-> bindValue(':id',$id);
$stmt->execute();

$product = $stmt->fetch(PDO :: FETCH_ASSOC);
$errors = [];

// echo '<pre>';
// var_dump($product);
 
// echo '<br>';
// echo '</pre>';

$title = $product['title'];
$price = $product['price'];
$description= $product['description'];

//echo $_SERVER['REQUEST_METHOD']."<br>";




if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    require_once "../../validateproduct.php";
    
       if(empty($errors)){

        $stmt= $pdo->prepare(" UPDATE  products  SET title =  :title,
         image = :image, description= :description, price =:price
         
        WHERE id = :id");

      
        $stmt->bindValue(':title',$title);
        $stmt->bindValue(':image',$imgpath);
        $stmt->bindValue(':description',$description);
        $stmt->bindValue(':price',$price);
        $stmt->bindValue(':id',$id);


        $stmt->execute();

        header('Location: index.php');
       }

}


?>
   <?php include_once "../../views/partials/header.php";?>

   
    <h1>Update Product <b><?php echo $product['title']?></b> </h1> 
    <?php include_once "../../products/form.php";?>
</body>
</html>