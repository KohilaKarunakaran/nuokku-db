<?php

require_once('../db_config.php');
$id = $_GET['id'];
$query = "SELECT * FROM elokuva WHERE id = :id LIMIT 1";
$result = $db_connection->prepare($query);
$result->execute([
    'id' => $id
]);
$result = $result->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<br>
<div class="container">
<form method="post" action="update.php">
<div class="form-group row">
<label for="id" class="clo-sm-2 col-form-label">ID</lable>
<div class="col-sm-10">
<input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $result['id'] ?>">
</div>
</div>
<div class="form-group row">
<label for="nimi" class="clo-sm-2 col-form-label">Nimi</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="nimi" name="nimi" value="<?php echo $result['nimi'] ?>">
</div>
</div>
<div class="form-group row">
<label for="ohjaaja" class="clo-sm-2 col-form-label">Ohjaaja</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="ohjaaja" name="ohjaaja" value="<?php echo $result['ohjaaja'] ?>">
</div>
</div>
<div class="form-group row">
<label for="nayttelijat" class="clo-sm-2 col-form-label">Nayttelijat</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="nayttelijat" name="nayttelijat" value="<?php echo $result['nayttelijat'] ?>">
</div>
</div>
<div class="form-group row">
<label for="kesto" class="clo-sm-2 col-form-label">Kesto</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="kesto" name="kesto" value="<?php echo $result['kesto'] ?>">
</div>
</div>
<div class="form-group row">
<label for="hankintapaivamaara" class="clo-sm-2 col-form-label">Hankintapaivamaara</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="hankintapaivamaara" name="hankintapaivamaara" value="<?php echo $result['hankintapaivamaara'] ?>">
</div>
</div>
<div class="form-group row">
<label for="kuntoluokitus" class="clo-sm-2 col-form-label">Kuntoluokitus</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="kuntoluokitus" name="kuntoluokitus" value="<?php echo $result['kuntoluokitus'] ?>">
</div>
</div>
<button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>
</form>

</div>

</body>

</html>