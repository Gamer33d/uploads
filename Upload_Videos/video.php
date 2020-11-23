<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<?php

include ("db.php");

$sql = "SELECT * FROM videos";
$res = mysqli_query($conexao, $sql);



?>
<table  class="table table-hover table-dark">
        <tr>
            <th scope="col">Video</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($res)) {

        $id = $row['id'];
        $name = $row['name'];

        ?>
        <tr>
            
            <td><?php echo"<h4><a href='watch.php?id=$id'>".$name."</a></h4><br/>"; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>


