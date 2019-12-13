<?php

$db = new PDO("mysql:host=localhost;dbname=crm_desbg", 'root', 'plop');

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_GET['id'])) {
    $nom =  $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $id = $_POST["id"];
    $req3 = $db->query("UPDATE Client SET nom = '$nom', prenom = '$prenom', adresse = '$adresse' WHERE id = ".$_GET["id"]);   
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
                    <?php

                        $req = $db->query('SELECT * FROM Client WHERE id ='.$_GET["id"]);      
                        $req2 = $req->fetch();
                    ?>
                    <h2 class="text-center py-4">Mise a jour de "<?php  echo $req2['prenom']. " " . $req2['nom']; ?>"</h2>
                    <form action="modifprofil.php?id=<?php echo $req2["id"] ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="prenom" id="inputEmail4"  value="<?php  echo $req2['prenom']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="inputPassword4" name="nom" value="<?php  echo $req2['nom']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" placeholder="adresse du mec" name="adresse" value="<?php  echo $req2['adresse']; ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select id="inputState" class="form-control">
                                    <option selected>choix entreprise</option>
                        <?php
                            $req4 = $db->query('SELECT * FROM Entreprise');
                            foreach ($req4 as $value) {
                        ?>
                                    <option><?php echo $value['denomination'] ?></option>
                            <?php } ?>
                                </select>
                            </div> 
                            <div class="col-md-6">
                                <input type="hidden" name="<?php echo $req2['id'] ?>">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>

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