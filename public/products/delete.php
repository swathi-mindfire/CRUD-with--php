<?php

$id = $_POST['id'] ?? null;

require_once "../../database.php";
if(!$id){
    header('Location: index.php');
    exit;
}

else{
    $stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    header('Location: index.php');
}



?>