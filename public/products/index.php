<?php

//To ways  to connect with  mysql database 1.mysqli 2.PDO  class (support multiple databases)


require_once "../../database.php";

$search = $_GET['search']?? '';

if($search){
    $stmt1 = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $stmt1 -> bindValue(':title' , "%$search%");


}

else{
    $stmt1 = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');

}

$stmt1->execute();
$products = $stmt1->fetchAll(PDO :: FETCH_ASSOC);

?>
<?php include_once "../../views/partials/header.php";?>
    <h1>Products CRUD</h1>
    <a href= "create.php" class="btn btn-success">Create Product </a>
   <form action="">
        <div class="input-group mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Search For Prducts"  value= "<?php echo $search ?>"name ="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
    </form>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($products as $i=> $product) {?>
                <tr>
                
                    <th scope="row"><?php echo $i+1?></th>
                    <td>
                    <img src="<?php echo $product['image']?>" alt="not found" class="thumbnail">
                    </td>
                    <td><?php echo $product['title']?></td>
                    <td><?php echo $product['price']?></td>
                    <td><?php echo $product['create_date']?></td>
                    <td>
                    <a href="update.php?id=<?php echo $product['id']?>" class="btn btn-outline-primary">Edit</a>
                        <!-- <a href="delete.php?id=<?php echo $product['id']?>" class="btn btn-outline-primary">Edit</a>
                        <a href="delete.php?id=<?php echo $product['id']?>" class="btn btn-outline-danger">Delete</a>
                     -->

                    <form action="delete.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $product['id']?>">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                        
                    </form>                  
                    </td>                 
                </tr>  

            <?php }?>         
        </tbody>
    </table>
</body>
</html>