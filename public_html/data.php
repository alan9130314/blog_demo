<?php 
header("Content-Type:text/html; charset=utf-8");
include('../db.php');

try{
    $pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port:$db[port];charset=$db[charset]",
$db['username'],$db['password']);    
} catch(PDOException $e){
    echo "Database connection failed.";
    exit;
}

$sql = 'SELECT posts.id , posts.title, categories.name ,posts.category_id,categories.thumbnail
        FROM posts,categories 
        WHERE posts.category_id = categories.id 
        ORDER BY posts.id DESC';


$statement = $pdo->prepare($sql);
$statement->execute();
$posts =  $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<script>
    var posts = <?= json_encode($posts,JSON_NUMERIC_CHECK) ?>;
</script>