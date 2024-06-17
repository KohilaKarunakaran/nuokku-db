<?php

require_once('../db_config.php');

if (isset($_POST['createRecord'])) {
    
    $kesto = filter_var($_POST['kesto(minuutti)'], FILTER_SANITIZE_NUMBER_INT);
    $nimi = filter_var($_POST['nimi'], FILTER_UNSAFE_RAW);
    $ohjaaja = filter_var($_POST['ohjaaja'], FILTER_UNSAFE_RAW);
    $nayttelijat = filter_var($_POST['nayttelijat'], FILTER_UNSAFE_RAW);
    $hankintapaivamaara = filter_var($_POST['hankintapaivamaara'], FILTER_UNSAFE_RAW);
    $kuntoluokitus = filter_var($_POST['kuntoluokitus'], FILTER_UNSAFE_RAW);

    $query = "INSERT INTO elokuva (nimi,ohjaaja,nayttelijat,kesto,hankintapaivamaara,kuntoluokitus) 
          VALUES (:nimi,:ohjaaja,:nayttelijat,:kesto,:hankintapaivamaara,:kuntoluokitus)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'nimi' => $nimi,
        'ohjaaja' => $ohjaaja,
        'nayttelijat' => $nayttelijat,
        'kesto' => $kesto,
        'hankintapaivamaara' => $hankintapaivamaara,
        'kuntoluokitus' =>  $kuntoluokitus

    ]);
    $rows = $result->rowCount();
    if ($rows == 1) {
        header('Location: list-movies.php');
    }else {
        $error_message ="Record creation failed";
    }
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<br>
<div class="container">
    <?php if (isset($error_message)) {
        ?>
        <div class="alert alert-success">
            <strong>Error!</strong>
            <?php echo $error_message; ?>
    </div>
    <?php
    }
    ?>
    <form method="post" action="">
    <div class="form-group row">
    <label for="nimi" class="clo-sm-2 col-form-label">Nimi</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="nimi" name="nimi">
</div>
</div>
<div class="form-group row">
    <label for="ohjaaja" class="clo-sm-2 col-form-label">Ohjaaja</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="ohjaaja" name="ohjaaja">
</div>
</div>
<div class="form-group row">
    <label for="nayttelijat" class="clo-sm-2 col-form-label">Nayttelijat</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="nayttelijat" name="nayttelijat">
</div>
</div>
<div class="form-group row">
    <label for="kesto(minuutti)" class="clo-sm-2 col-form-label">Kesto</lable>
<div class="col-sm-10">
    <input type="number" class="form-control" id="kesto(minuutti)" name="kesto(minuutti)">
</div>
</div>
<div class="form-group row">
    <label for="hankintapaivamaara" class="clo-sm-2 col-form-label">Hankintapaivamaara</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="hankintapaivamaara" name="hankintapaivamaara">
</div>
</div>
<div class="form-group row">
    <label for="kuntoluokitus" class="clo-sm-2 col-form-label">Kuntoluokitus</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="kuntoluokitus" name="kuntoluokitus">
</div>
</div>
<button type="submit" name=" createRecord" class="btn btn-success">Add Record</button>
</form>
</div>

</body>
</html>
