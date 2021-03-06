<?php
    include('conexao.php');

    $consulta = "SELECT * FROM images";
    $con = $conexao->query($consulta) or die ($conexao->error);
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
    <table  class="table table-hover table-dark">
        <tr>
            <th scope="col">Id da imagem</th>
            <th scope="col">Arquivo</th>
            <th scope="col">Data</th>
        </tr>
        <?php while($dado = $con->fetch_array()){?>
        <tr>
            <td><?php echo $dado["img_id"]?></td>
            <td><img src="image/<?php echo $dado["img_url"]?>" alt=""></td>
            <td><?php echo $dado["img_data"]?></td>
        </tr>
        <?php } ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>