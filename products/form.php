<?php if(!empty($errors)): ?>

<div class="alert alert-danger">
  
    <?php foreach($errors as $error) : ?>

    <div>  <?php echo $error ?></div>

    <?php endforeach;?>
</div>

<?php endif;?>

<form method="post" action=""  enctype="multipart/form-data">
        <?php if($product['image']):?>
        <img src="<?php echo $product['image'] ?>" alt="Not found" class="update-img">
        <?php endif ?>


        <div class="form-group">
            <label>Product  Image</label>
            <input type="file" name ="pimage" class="form-control">
            </div>
     <div class="form-group">
        <label>Product Title</label>
        <input type="text" name ="title" class="form-control" value="<?php echo $title?>">       
     </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea name="description" class="form-control"><?php echo $description?></textarea>
        
     </div>
     <div class="form-group">
        <label>Product Price</label>
        <input type="number" step=".01" name ="price"  value="<?php echo $price?>" class="form-control">
        </div>
     </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
