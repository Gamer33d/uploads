<?php
include('db.php');

$mensagem = false;

$vi_name = mysqli_real_escape_string($conexao, $_POST['vi_name']);


if(isset($_POST['upload'])):
  $formatosPermitidos = array("mp4", "avi", "gif");
  $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

  if(in_array($extensao, $formatosPermitidos)):
    $pasta = "videos/";
    $temporario = $_FILES['file']['tmp_name'];
    $novonome = $vi_name.".$extensao";

    if(move_uploaded_file($temporario, $pasta.$novonome)):
      $sql_code = "INSERT INTO videos (id, name) VALUES (null, '$novonome')";
        if($conexao->query($sql_code))
            $mensagem = "Arquivo enviado";
        else
            $mensagem = "Falha ao enviar a foto para o banco de dados";
    else:
      $mensagem = "Erro, nao foi possivel fazer upload para a pasta";
    endif;
  else:
    $mensagem = "formato inválido";
  endif;

endif;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><a href="video.php">VIDEOS</a></h1>

    <form action="index.php" method="post" enctype="multipart/form-data">
    <input type="text" name="vi_name" placeholder="Nome do video" required maxlength="40">
    <input type="file" name="file" >
    <input type="submit" name="upload" value="UPLOAD">

    </form>

    
</body>
</html>



