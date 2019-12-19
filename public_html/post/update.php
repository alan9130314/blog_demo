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

$sql = 'UPDATE posts SET category_id=:category_id, title=:title, content=:content
        WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
$statement->bindValue(':category_id',$_POST['category_id'],PDO::PARAM_INT);
$statement->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
$statement->bindValue(':content',$_POST['content'],PDO::PARAM_STR);
if($statement->execute()){
    $sql = 'SELECT posts.id,posts.title,categories.name FROM posts,categories WHERE posts.id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($post);
}