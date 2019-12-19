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

$sql = 'SELECT posts.id,posts.title,categories.name,posts.category_id ,categories.thumbnail
FROM posts,categories 
WHERE category_id=:category_id 
AND posts.category_id = categories.id
ORDER BY posts.id DESC';
$statement = $pdo->prepare($sql);
$statement->bindValue(':category_id',$_POST['category_id'],PDO::PARAM_INT);
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($posts);
