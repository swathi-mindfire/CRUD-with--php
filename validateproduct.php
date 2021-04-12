<?php 

       $title = $_POST['title'];

        $description = $_POST['description'];

        $price = $_POST['price'];

        $date = date('y-m-d H:i:s');

        $imgpath ="";

   


        if(!$title){
            $errors[] = 'product title required';
        }

        if(!$price){
            $errors[] = 'product price required';
        }

       if(empty($errors)){
           $img = $_FILES['pimage'] ?? null;

           $imgpath = "";

           if($img && $img['tmp_name']){
            

            $imgpath = 'images/'.randomString(8).$img['name'];
            if(!is_dir('images')){
                mkdir('images');

            }

            move_uploaded_file($img['tmp_name'],$imgpath); //or we can give any folder with some name
            
           
           }
       }
?>