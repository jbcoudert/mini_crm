<?php

$db = new PDO("mysql:host=localhost;dbname=crm_desbg", 'root', 'plop');

if (isset($_POST['denomi']) && isset($_POST['adresse'])) {
    $denomination =  $_POST['denomi'];
    $adresse = $_POST['adresse'];
    
    // $req3 = $db->query("SELECT * FROM Client");
    $req3 = $db->query("INSERT INTO Entreprise (id, denomination, adresse) VALUES (NULL, '$denomination', '$adresse' )");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="static/css/style.css">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-12">
                <?php require('header.php'); ?>
            </div>
            <main>
                <div class="col-12">
                    <h2 class="text-center py-4">Ajouter une nouvelle entreprise</h2>
                    <form action="addentreprise.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Dénomination" name="denomi">
                            </div>
                            <div class="form-group col-12">
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Adresse Complète" name="adresse">
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>

                        </div>

                    </form>

                </div>
            </main>
            <div class="col-12">

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>