<?php 
header('Content-Type: application/json; charset=utf-8');

include('../../db.php');

try{
    $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
$db['username'],$db['password']);    
} catch(PDOException $e){
    echo "Database connection failed.";
    exit;
}

$sql = 'INSERT INTO posts(category_id, title, content)
        VALUES(:category_id, :title, :content)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':category_id',$_POST['category_id'],PDO::PARAM_INT);
$statement->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$statement->bindValue(':content',$_POST['content'],PDO::PARAM_STR);
if($statement->execute()){
    $id = $pdo->lastInsertId();

    $sql = 'SELECT posts.id,posts.title,categories.name,categories.thumbnail,posts.category_id FROM posts,categories WHERE posts.id=:id AND posts.category_id = categories.id';

 
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($post);
}