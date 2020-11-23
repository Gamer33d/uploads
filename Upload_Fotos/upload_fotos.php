<?php
include('conexao.php');

$foto_name = mysqli_real_escape_string($conexao, $_POST['foto_name']);


$mensagem = false;

if(isset($_POST['enviar_formulario'])):
  $formatosPermitidos = array("png", "jpeg", "jpg");
  $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

  if(in_array($extensao, $formatosPermitidos)):
    $pasta = "image/";
    $temporario = $_FILES['arquivo']['tmp_name'];
    $novonome = $foto_name.".$extensao";

    if(move_uploaded_file($temporario, $pasta.$novonome)):
      $sql_code = "INSERT INTO images (img_id, img_url) VALUES (null, '$novonome')";
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
    <h1>Upload de Fotos</h1>
    <?php if($mensagem != false) echo "<h2> $mensagem </h2>"; ?>

    <form action="upload_fotos.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="foto_name" placeholder="Nome da foto" required maxlength="40">

        <input type="file" require name="arquivo">
        <input type="submit" value="Salvar" name="enviar_formulario">
    </form>
    <a href="fotos.php">Fotos</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

