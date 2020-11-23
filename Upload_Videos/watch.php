<?php
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];



$sql = "SELECT name FROM videos WHERE id='$id'";
$res = mysqli_query($conexao, $sql);

$row = mysqli_fetch_assoc($res);

$name = $row['name'];





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/watch.css">
</head>
<body>
  <div class="container">
    <video width="60%" height="350" controls>
        <source src="videos/<?php echo $name; ?>" type="video/mp4">

</video>
  </div>
  <h1><?php echo "<h1>Você está assistindo: ".$name."</h1>"; ?></h1>
  <p><a href="video.php">Assitir mais videos</a></p>

</body>
</html>



<?php
}
?>