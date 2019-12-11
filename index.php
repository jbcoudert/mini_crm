<?php

$db = new PDO("mysql:host=localhost;dbname=crm_desbg", 'root', 'plop');

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
                        <a class="navbar-brand" href="#">My mini CRM</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse topNav" id="navbarNavAltMarkup">
                            <div class="navbar-nav subNav">
                                <a class="nav-item nav-link active" href="#">Listings</a>
                                <a class="nav-item nav-link" href="addclient.php">Ajouter Client</a>
                                <a class="nav-item nav-link" href="addentreprise.php">Ajouter Entreprise</a>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
            <main>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Listing clients / Entreprises</h2>
                        </div>
                        <div class="col-12 p-0">
                            <ul class="nav nav-pills mb-3  text-center" id="pills-tab" role="tablist">
                                <li class="nav-item col-6 p-0">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Clients</a>
                                </li>
                                <li class="nav-item col-6 p-0">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                        role="tab" aria-controls="pills-profile" aria-selected="false">Entreprises</a>
                                </li>
                            </ul>
                            <div class="col-12 search p-0">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded" placeholder="Recherche..."
                                        aria-label="Recipient's username with two button addons"
                                        aria-describedby="button-addon4">
                                    <div class="" id="button-addon4">
                                        <button class="btn btn-primary btnSearch" type="button"><i
                                                class="fas fa-search"></i></button>
                                        <button class="btn btn-primary btnSearch" type="button"><i
                                                class="fas fa-ban"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                
                                    <div class="col-12 p-0">
                                        <div class="accordion" id="accordionExample1">
                                            <?php

                                                $req = $db->query('SELECT * FROM Client');                                      
                                                foreach ($req as $row){
                                                                        
                                            ?>
                                            <div class="card" id="card-<?php echo $row['id']; ?>">
                                                <div class="card-header" id="heading<?php echo $row['id']; ?>C">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button"
                                                            data-toggle="collapse" data-target="#collapse<?php echo $row['id']; ?>C"
                                                            aria-expanded="false" aria-controls="collapse<?php echo $row['id']; ?>C">
                                                            <?php echo $row['prenom'] . " " . $row['nom']; ?>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapse<?php echo $row['id']; ?>C" class="collapse" aria-labelledby="heading<?php echo $row['id']; ?>C"
                                                    data-parent="#accordionExample1">
                                                    <div class="card-body">
                                                        <div class="card mb-3">
                                                            <div class="row no-gutters">
                                                                <div class="col-md-4">
                                                                    <img src="https://picsum.photos/200/300?random=<?php echo $row['id']; ?>"
                                                                        class="card-img" alt="...">
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><?php echo $row['prenom'] . " " . $row['nom']; ?></h5>
                                                                        <p class="card-text"><?php echo $row['adresse']; ?>
                                                                        </p>
                                                                        
                                                                        <p class="card-text"><small
                                                                                class="text-muted">Irish
                                                                                Pub</small></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 text-center mt-3 text-primary">
                                                                    <a href="modifprofil.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                                                    <a href="#" id="btn-<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="col-12 p-0">
                                        <div class="accordion" id="accordionExample2">
                                            <?php   

                                            // SELECT * FROM Entreprise_Client, Entreprise WHERE id=1 and Entreprise_Client.id_Client = Entreprise_Client.id_Entreprise
                                                $req2 = $db->query('SELECT * FROM Entreprise'); 
                                                if(isset($_POST["Delete_Product_id"])){
                                                    $delete = $db->query('DELETE FROM basket_line WHERE id_Product ='.$_POST["Delete_Product_id"]);
                                                  }
                                                  
                                                        foreach ($req2 as $value) {
                                            ?>
                                            <div class="card" id="cardE-<?php echo $value['id']; ?>">
                                                <div class="card-header" id="heading<?php echo $value['id']; ?>E">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button"
                                                            data-toggle="collapse" data-target="#collapse<?php echo $value['id']; ?>E"
                                                            aria-expanded="false" aria-controls="collapse<?php echo $value['id']; ?>E">
                                                            <?php echo $value['denomination']; ?>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapse<?php echo $value['id']; ?>E" class="collapse" aria-labelledby="heading<?php echo $value['id']; ?>E"
                                                    data-parent="#accordionExample2">
                                                    <div class="card-body">
                                                        <div class="card mb-3">
                                                            <div class="row no-gutters">
                                                                <div class="col-md-4">
                                                                    <img src="https://picsum.photos/200/300?random=1"
                                                                        class="card-img" alt="...">
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><?php echo $value['denomination'] ?></h5>
                                                                        <p class="card-text"><?php echo $value['adresse'] ?>
                                                                        </p>
                                                                        <p class="card-text"><small
                                                                                class="text-muted">Irish
                                                                                Pub</small></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 text-center mt-3 text-primary">
                                                                     <a href="#"><i class="fas fa-edit"></i></a>
                                                                     <a href="#" id="btnE-<?php echo $value['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php  }  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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

    <script>

        $(document).ready(function() {

            $("a[id*='btn-']").click(function () {
                
                var aTrash = $(this).attr("id")
                var id = aTrash.replace("btn-", "");
                var cardId = '#card-' + id;
                var card = $(cardId);
                var postData = {
                    "id" : id,
                };
                
                $.post( "deleteclient.php", postData, function(resp) {
                    console.log(resp);
                    card.remove()
                });
                return false;
            })

            $("a[id*='btnE-']").click(function () {

                var aTrash = $(this).attr("id")
                var id = aTrash.replace("btnE-", "");
                var cardId = '#cardE-' + id;
                var card = $(cardId);
                var postData = {
                    "id" : id,
                };

                $.post( "deleteentreprise.php", postData, function(resp) {
                    console.log(resp);
                    card.remove()
                });
                return false;
            })
            
        });
    </script>
</body>

</html>