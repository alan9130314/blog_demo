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

$sql = 'SELECT * FROM posts WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
$statement->execute();

$post = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($post);
