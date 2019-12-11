<?php

$db = new PDO("mysql:host=localhost;dbname=crm_desbg", 'root', 'plop');

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse'])) {
    $nom =  $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    var_dump($nom);
    // echo "INSERT INTO Client (id, nom, prenom, adresse) VALUES (NULL, $nom, $prenom, $adresse)";
    
    // $req3 = $db->query("SELECT * FROM Client");
    $req3 = $db->query("INSERT INTO Client (id, nom, prenom, adresse) VALUES (NULL, '$nom', '$prenom', '$adresse' )");
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
                <header>
                    <nav class="navbar navbar-expand-lg ">
                        <a class="navbar-brand" href="index.php">My mini CRM</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse topNav" id="navbarNavAltMarkup">
                            <div class="navbar-nav subNav">
                                <a class="nav-item nav-link active" href="index.php">Listings</a>
                                <a class="nav-item nav-link" href="#">Ajouter Client</a>
                                <a class="nav-item nav-link" href="addentreprise.php">Ajouter Entreprise</a>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
            <main>
                <?php

                    // $nom =  $_POST['nom'];
                    // $prenom = $_POST['prenom'];
                    // $adresse = $_POST['adresse'];

                    // var_dump($_POST['nom']);

                    // $req = $db->query("SELECT * FROM Client");
                    // $req = $db->query("INSERT INTO Client (id, nom, prenom, adresse) VALUES (".$_POST['id'].", $nom, $prenom, $adresse )");
                    // if ( $req->rowCount() != 0) {
                    //     $db->query("UPDATE Client SET nom = $nom, prenom = $prenom, adresse = $adresse WHERE Client.id = ;") ;
                    // } else {
                    //     $db->query("INSERT INTO Ligne_Panier (id_Produit, id_Panier, quantite_ajouter) VALUES (".$_POST["produitId"].", '1', '1')");
                    // }
                    $req2 = $db->query('SELECT * FROM Entreprise');
                        
                ?>
                <div class="col-12">
                    <h2 class="text-center py-4">"Ajouter un nouveau client"</h2>
                    <form action="addclient.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Prénom" name="prenom">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Nom" name="nom" >
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" placeholder="adresse complète" name="adresse">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select id="inputState" class="form-control">
                                    <option selected>------------------------</option>
                                    <?php
                                        foreach ($req2 as $value) {
                                    ?>
                                    <option><?php echo $value['denomination'] ?></option>
                                        <?php } ?>
                                </select>
                            </div> 
                            <div class="col-md-6">
                                <input type="hidden" name="id" >
                                <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
                            </div>
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