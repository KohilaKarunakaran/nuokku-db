<?php

require_once('../db_config.php');

if (isset($_POST['updateRecord'])) {

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $kesto = filter_var($_POST['kesto'], FILTER_SANITIZE_NUMBER_INT);
    $nimi = filter_var($_POST['nimi'], FILTER_UNSAFE_RAW);
    $ohjaaja = filter_var($_POST['ohjaaja'], FILTER_UNSAFE_RAW);
    $nayttelijat = filter_var($_POST['nayttelijat'], FILTER_UNSAFE_RAW);
    $hankintapaivamaara = filter_var($_POST['hankintapaivamaara'], FILTER_UNSAFE_RAW);
    $kuntoluokitus = filter_var($_POST['kuntoluokitus'], FILTER_UNSAFE_RAW);
    $query = "UPDATE elokuva SET nimi=:nimi, ohjaaja=:ohjaaja, nayttelijat=:nayttelijat, kesto=:kesto, hankintapaivamaara=:hankintapaivamaara, kuntoluokitus=:kuntoluokitus
WHERE id=:id";
$result = $db_connection->prepare($query);
$result->execute([
    'nimi' => $nimi,
    'ohjaaja' => $ohjaaja,
    'nayttelijat' => $nayttelijat,
    'kesto' => $kesto,
    'hankintapaivamaara' => $hankintapaivamaara,
    'kuntoluokitus' =>  $kuntoluokitus,
    'id' => $id,
]);

$rows = $result->rowCount();
if ($rows == 1) {
     header('Location: list-movies.php');
}else {
    $error_message ="Updating record failed";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
<?php 
if (isset($error_message)) {
?>
<div class="alert alert-success">
<strong>Error!</strong>
<?php echo $error_message; ?>
</div>
<?php
}
?>
</div>
</body>
</html>