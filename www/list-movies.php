<?php

require_once('../db_config.php');

    $query = "SELECT * FROM elokuva";

    $results = $db_connection->query($query);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Movies</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
    </head>
    <body>
        <div class="container">
            <h1 class="display-1 text-center">Nuokku Elokuva</h1>
            <a href="create2.php" class="btn btn-info">Add new book</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ElokuvanNimi</th>
                        <th>Ohjaaja</th>
                        <th>Näyttelijät</th>
                        <th>Kesto(mins)</th>
                        <th>Hankintapäivämäärä</th>
                        <th>Kuntoluokitus</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
</tr>
</thead>
<tbody>
<?php
foreach ($results as $result) {
    ?>
    <tr>
    <td>
    <?php echo $result['nimi'] ?>
    </td>
    <td>
    <?php echo $result['ohjaaja'] ?>
    </td>
    <td>
    <?php echo $result['nayttelijat'] ?>
    </td>
    <td>
    <?php echo $result['kesto'] ?>
    </td>
    <td>
    <?php echo $result['hankintapaivamaara'] ?>
    </td>
    <td>
    <?php echo $result['kuntoluokitus'] ?>
    </td>
    <td>
    <a href="edit.php?id=<?php echo $result['id'] ?>"><i class = "fas fa-edit"></i></a>
    </td>
    <td>
    <a href="delete.php?id=<?php echo $result['id'] ?>"><i class = "fas fa-trash-alt"></i></a>
    </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
    </div>
        </body>
        </html>