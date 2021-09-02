<!-- Création d'une variable de session avec l'URI de la page actuelle -->
<?php   
        if($this->session->userdata('uri')){$this->session->set_userdata('prev_uri', $this->session->userdata('uri'));}
        if(isset($_SERVER['PATH_INFO'])){$this->session->set_userdata('uri', $_SERVER['PATH_INFO']);}
        // J'ajoute un cookie de session persistante afin de conserver le panier pendant 24 heures
        set_cookie(session_name(), session_id(), time()+3600*24);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/ci_village_green/assets/css/style.css">
    <title>Village Green, des musiciens au service des musiciens</title>
</head>

<body>
    <!-- Ouverture du container principal -->
    <div class="main-container container justify-content-between main-background p-0">
        <!-- Navbar pour résolutions <= 993px -->
        <nav id="navbar-collapsed" class="navbar navbar-expand-lg navbar-light pt-0">
            <div class="container-fluid d-flex d-lg-none navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid p-0 bg-logo-vg">
                    <!-- Logo Village green -->
                    <div class="col-12 text-center">
                        <a class="navbar-brand py-0 mx-0 col" href="<?php echo site_url('Products/home'); ?>">
                            <img id="logo-vg" class="col-12" src="<?php echo base_url('assets/images/HEADER/logo village green.png'); ?>" alt="Logo Village Green" title="Logo Village Green">
                        </a>
                    </div>

                    <!-- 1ère ligne de la navbar -->
                    <!-- Logo Infos -->
                    <a class="nav-link text-dark pe-0" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-info-circle blue" viewBox="0 0 16 16" alt="Logo Infos" title="Infos">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </a>

                    <!-- Modal Espace Client -->
                    <div id="item-client-nav-coll" class="d-inline-block">
                        <!-- Logo Espace Client -->
                        <a class="nav-link text-dark px-0 px-sm-3 py-lg-0" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person blue" viewBox="0 0 16 16" alt="Logo Espace client" title="Espace Client">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </a>

                        <!-- Le client n'est pas loggé, affichage du modal de connexion -->
                        <?php
                        if (!isset($_SESSION['logged_in']) || (!$_SESSION['logged_in'])) :
                        ?>

                            <div id="item-client-submenu-nav-coll" class="justify-content-center py-3 px-4 bg-white rounded">
                                <div id="item-client-submenu-login-nav-coll" class="border-end border-1 border-warning d-flex flex-column align-items-stretch">
                                    <?php echo form_open('Customers/login', 'class="d-flex flex-column justify-content-between h-100 px-4"'); ?>
                                    <header class="px-2 pb-2 text-center">
                                        <h6 class=" fw-bold">
                                            Etes-vous déjà client chez nous ?
                                        </h6>
                                    </header>
                                    <div class="d-flex flex-column justify-content-center align-content-center px-2">
                                        <div class="mb-3">
                                            <input class="form-control py-2" type="text" name="cus_mail" id="login-email" placeholder="Adresse E-mail" autocomplete="off" value="<?php echo set_value('cus_mail'); ?>">
                                            <?php if (isset($errorMsg['cus_mail'])) { ?><div class="fw-bold text-danger"><?php echo $errorMsg['cus_mail']; ?></div><?php }; ?>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control py-2" type="password" name="cus_pass" id="login-password" placeholder="Mot de passe" <?php echo set_value('cus_pass'); ?>>
                                            <?php if (isset($errorMsg['cus_pass'])) { ?><div class="fw-bold text-danger"><?php echo $errorMsg['cus_pass']; ?></div><?php }; ?>
                                        </div>
                                        <div class="d-flex align-content-center mb-3">
                                            <input class="form-check-input me-1" type="checkbox" name="stay-connected" id="stay-connected" value="yes" <?php echo set_checkbox('stay-connected', 'yes'); ?>>
                                            <label class="form-check-label" for="stay-connected">Rester connecté</label>
                                        </div>
                                        <div class="d-grid">
                                            <input class="nav-link btn mb-1 px-2 text-white fw-bold orange-gradient" type="submit" value="Se connecter maintenant">
                                        </div>
                                        <a class="nav-link px-2 text-center" href="#">Vous avez oublié votre mot de passe ?</a>
                                    </div>
                                    </form>
                                </div>

                                <div class="col col-sm-6 py-2 py-sm-0 px-4">
                                    <header class="text-center">
                                        <h6 class="mb-1 px-2 fw-bold">
                                            N'êtes-vous pas encore client ?
                                        </h6>
                                    </header>
                                    <p>
                                        En tant que client Village Green, vous pouvez suivre vos envois, lire des tests produits exclusifs, évaluer des produits, déposer des petites annonces, gérer vos chèques-cadeaux, devenir partenaires et plus encore.
                                    </p>
                                    <div>
                                        <a class="nav-link btn  text-white fw-bold mb-1 px-2 orange-gradient" role="link" href="<?php echo site_url('Customers/signUp'); ?>">S'inscrire</a>
                                    </div>
                                    <a class="nav-link btn" href="#">Plus d'informations</a>
                                </div>
                            </div>
                            <!-- Le client est loggé, affichage du modal d'accès à son compte -->
                        <?php
                        else :
                        ?>
                            <div id="item-client-submenu2-nav-coll" class="justify-content-center py-3 px-4 bg-white rounded">
                                <div class="d-flex flex-column align-items-stretch">
                                    <header class="px-2 text-center">
                                        <h6 class=" fw-bold border-bottom pb-3 border-1 border-warning">
                                            Mon Compte
                                        </h6>
                                    </header>
                                    <div class="d-flex flex-column justify-content-center align-content-center px-2 mt-2">
                                        <p class="mb-2">Bonjour, <span class="fw-bold"><?php echo ($_SESSION['username']); ?></span></p>
                                        <div class="d-grid">
                                            <a class="btn text-white fw-bold mt-1 orange-gradient" role="button" href="<?php echo site_url('Customers/myAccount'); ?>">Accéder à mon espace</a>
                                            <a class="btn" role="button" href="<?php echo site_url('Customers/logOut'); ?>">Me déconnecter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        endif;
                        ?>
                    </div>

                    <!-- Picto Panier d'achat -->
                    <!-- <a class="nav-link px-0 px-sm-3" href="<?php echo site_url('Basket/viewBasket'); ?>">
                        <img class="img-fluid" src="<?php echo base_url('assets/images/HEADER/picto panier.png'); ?> " alt="pictogramme panier d'achat" title="Votre panier">
                    </a> -->
                    <a class="nav-link position-relative" href="<?php echo site_url('Basket/viewBasket');?>">
                        <img class="img-fluid" src="<?php echo base_url('assets/images/HEADER/picto panier.png'); ?> " alt="pictogramme panier d'achat" title="Votre panier">
                        <span <?php if(isset($this->session->basket) && count($this->session->basket) > 0) { echo 'class="badge-picto-panier position-absolute bg-danger badge badge-pill rounded-circle"';}?>>
                        <span><?php if (isset($this->session->basket) && count($this->session->basket) > 0) { echo count($this->session->basket);}?></span>
                    </span>
                    </a>

                    <!-- Picto langue -->
                    <a class="nav-link px-0 px-sm-3" href="#">
                        <img src="<?php echo base_url('assets/images/HEADER/picto pays.png'); ?> " alt="pictogramme pays" title="Langue de navigation">
                    </a>

                    <!-- Picto cadenas espace Admin -->
                    <a class="nav-link px-0 px-sm-3" href="<?php echo site_url('Admin/login'); ?>">
                        <img src="<?php echo base_url('assets/images/icons/lock.svg'); ?> " alt="pictogramme cadenas" title="Espace réservé aux administrateurs" width="26">
                    </a>

                    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#nav-collapsed" aria-controls="nav-collapsed" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- 2e ligne de la navbar -->
                    <div class="collapse navbar-collapse" id="nav-collapsed">
                        <div class="navbar-nav">
                            <div class="nav-item d-flex justify-content-between">
                                <a class="nav-link fw-bold py-3 d-inline-block col text-center" href="#">Produits</a>
                                <a class="nav-link fw-bold py-3 d-inline-block col text-center" href="#">Services</a>
                                <a class="nav-link fw-bold py-3 d-inline-block col text-center" href="#">Aide</a>
                                <a class="nav-link fw-bold py-3 d-inline-block col text-center" href="#">A Propos</a>
                            </div>

                            <div class="d-flex flex-column">
                                <!-- Dropdown Guit/bass -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-guitar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Guit/bass
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-guitar">
                                        <li><a class="dropdown-item" href="<?php echo site_url('Products/list/8'); ?>">Guitares Electriques</li></a>
                                        <li><a class="dropdown-item" href="#">Guitares Classiques</li></a>
                                        <li><a class="dropdown-item" href="<?php echo site_url('Products/list/10'); ?>">Guitares Acoustiques<br>& Electro-acoustiques</li></a>
                                        <li><a class="dropdown-item" href="<?php echo site_url('Products/list/12'); ?>">Basses Electriques</li></a>
                                        <li><a class="dropdown-item" href="#">Basses Acoustiques</li></a>
                                        <li><a class="dropdown-item" href="#">Basses Semi-Acoustiques</li></a>
                                        <li><a class="dropdown-item" href="#">Ukulélés</li></a>
                                        <li><a class="dropdown-item" href="#">Autres instruments à cordes pincées</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Batteries -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-drums" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Batteries
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-drums">
                                        <li><a class="nav-link px-1 py-1" href="#">Batteries Electriques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Batteries Acoustiques</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Claviers -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-keybords" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Claviers
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-keybords">
                                        <li><a class="nav-link px-1 py-1" href="#">Claviers Arrangeurs</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Claviers Maîtres</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Pianos Numériques</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Studio -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-studio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Studio
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-studio">
                                        <li><a class="nav-link px-1 py-1" href="#">Enceintes de monitoring</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Microphones</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Interfaces Audio</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Logiciels Studio</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Mobilier de studio</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Sono -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-sono" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Claviers
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-sono">
                                        <li><a class="nav-link px-1 py-1" href="#">Amplis de puissance</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Enceintes Actives</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Microphones</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Préamplificateurs Studio</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Packs enceintes</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Eclairages -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-lights" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Eclairages
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-lights">
                                        <li><a class="nav-link px-1 py-1" href="#">Kits et packs lumières</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Lasers</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Lumière Noire</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Machines et liquides</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Projecteurs</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown DJ -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-dj" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        DJ
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-dj">
                                        <li><a class="nav-link px-1 py-1" href="#">Casques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Effets DJ</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Mixers Numériques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Platines vinyles</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Tables de mixage</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Cases -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-cases" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Cases
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-cases">
                                        <li><a class="nav-link px-1 py-1" href="#">DJ</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Elements rackables</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">flight case pour lumières</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Sono</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Pièces détachées</li></a>
                                    </ul>
                                </div>

                                <!-- Dropdown Accessoires -->
                                <div class="dropdown text-center">
                                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdown-access" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Accessoires
                                    </a>
                                    <ul class="dropdown-menu text-center bg-light" aria-labelledby="dropdown-access">
                                        <li><a class="nav-link px-1 py-1" href="#">Accessoires claviers</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Accessoires guitares</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Accessoires DJ, sono<br>& Home studio</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Accessoires claviers</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Mobilier d'orchestre</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN Navbar collapsed -->


            <!-- Navbar >= 993px -->
            <div class="container-fluid g-0 d-flex justify-content-between d-none d-lg-flex">
                <div class="navbar navbar-expand-lg container-fluid p-0">

                    <div class="row container-fluid p-0 m-0 ">
                        <div id="navlogo" class="p-0">
                            <a class="navbar-brand" href="<?php echo site_url('Products/home'); ?>">
                                <img id="logo" src="<?php echo base_url('assets/images/HEADER/logo village green.png'); ?>" alt="Logo Village Green" title="Logo Village Green">
                            </a>
                        </div>

                        <div id="navbar" class="p-0">

                            <div class="row m-0" id="nav-first-row">
                                <div class="container navbar d-flex justify-content-end p-0" id="nav-first-row-div">
                                    <a class="nav-link" href="#">Infos</a>
                                    <div id="item-client" class="d-inline-block">
                                        <a class="nav-link" href="#">Espace Client</a>

                                        <?php
                                        if (!isset($_SESSION['logged_in']) || (!$_SESSION['logged_in'])) :
                                        ?>

                                            <div id="item-client-submenu" class="justify-content-center py-3 px-4 bg-white rounded">
                                                <div class="border-end border-1 border-warning d-flex flex-column align-items-stretch">
                                                    <?php echo form_open('Customers/login', 'class="d-flex flex-column justify-content-between h-100 px-4"'); ?>
                                                    <header class="px-2 text-center">
                                                        <h6 class=" fw-bold">
                                                            Etes-vous déjà client chez nous ?
                                                        </h6>
                                                    </header>
                                                    <div class="d-flex flex-column justify-content-center align-content-center px-2">
                                                        <div class="mb-3">
                                                            <input class="form-control py-2" type="text" name="cus_mail" placeholder="Adresse E-mail" autocomplete="off" value="<?php echo set_value('cus_mail'); ?>">
                                                            <?php if (isset($errorMsg['cus_mail'])) { ?><div class="fw-bold text-danger"><?php echo $errorMsg['cus_mail']; ?></div><?php }; ?>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input class="form-control py-2" type="password" name="cus_pass" placeholder="Mot de passe" <?php echo set_value('cus_pass'); ?>>
                                                            <?php if (isset($errorMsg['cus_pass'])) { ?><div class="fw-bold text-danger"><?php echo $errorMsg['cus_pass']; ?></div><?php }; ?>
                                                        </div>
                                                        <div class="d-flex align-content-center mb-3">
                                                            <input class="form-check-input me-1" type="checkbox" name="stay-connected" value="yes" <?php echo set_checkbox('stay-connected', 'yes'); ?>>
                                                            <label class="form-check-label" for="stay-connected">Rester connecté</label>
                                                        </div>
                                                        <div class="d-grid py-2">
                                                            <input class="nav-link btn mb-1 px-2 text-white fw-bold orange-gradient" type="submit" value="Se connecter maintenant">
                                                        </div>
                                                        <a class="nav-link px-2 text-center" href="#">Vous avez oublié votre mot de passe ?</a>
                                                    </div>
                                                    </form>
                                                </div>

                                                <div class="col-6 px-4">
                                                    <header class="text-center">
                                                        <h6 class="mb-2 px-2 fw-bold">
                                                            N'êtes-vous pas encore client ?
                                                        </h6>
                                                    </header>
                                                    <p>
                                                        En tant que client Village Green, vous pouvez suivre vos envois, lire des tests produits exclusifs, évaluer des produits, déposer des petites annonces, gérer vos chèques-cadeaux, devenir partenaires et plus encore.
                                                    </p>
                                                    <div>
                                                        <a class="nav-link btn  text-white fw-bold mb-1 px-2 orange-gradient" role="link" href="<?php echo site_url('Customers/signUp'); ?>">S'inscrire</a>
                                                    </div>
                                                    <a class="nav-link btn" href="#">Plus d'informations</a>
                                                </div>
                                            </div>

                                        <?php
                                        else :
                                        ?>
                                            <div id="item-client-submenu2" class="justify-content-center py-3 px-4 bg-white rounded">
                                                <div class="d-flex flex-column align-items-stretch">
                                                    <header class="px-2 text-center">
                                                        <h6 class=" fw-bold border-bottom pb-3 border-1 border-warning">
                                                            Mon Compte
                                                        </h6>
                                                    </header>
                                                    <div class="d-flex flex-column justify-content-center align-content-center px-2 mt-2">
                                                        <p class="mb-2">Bonjour, <span class="fw-bold"><?php echo ($_SESSION['username']); ?></span></p>
                                                        <div class="d-grid">
                                                            <a class="btn text-white fw-bold mt-1 orange-gradient" role="button" href="<?php echo site_url('Customers/myAccount'); ?>">Accéder à mon espace</a>
                                                            <a class="btn" role="button" href="<?php echo site_url('Customers/logOut'); ?>">Me déconnecter</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        endif;
                                        ?>

                                    </div>
                                    <a class="nav-link position-relative" href="<?php echo site_url('Basket/viewBasket');?>">
                                        <img class="img-fluid" src="<?php echo base_url('assets/images/HEADER/picto panier.png'); ?> " alt="pictogramme panier d'achat" title="Votre panier">
                                        <span <?php if(isset($this->session->basket) && count($this->session->basket) > 0) { echo 'class="badge-picto-panier position-absolute bg-danger badge badge-pill rounded-circle"';}?>>
                                            <span><?php if (isset($this->session->basket) && count($this->session->basket) > 0) { echo count($this->session->basket);}?></span>
                                        </span>
                                    </a>
                                    <a class="nav-link" href="#">
                                        <img src="<?php echo base_url('assets/images/HEADER/picto pays.png'); ?> " alt="pictogramme pays" title="Langue de navigation">
                                    </a>
                                    <a class="nav-link" href="<?php echo site_url('Admin/login'); ?>">
                                        <img src="<?php echo base_url('assets/images/icons/lock.svg'); ?> " alt="pictogramme cadenas" title="Espace réservé aux administrateurs" width="26">
                                    </a>
                                </div>
                            </div>
                            
                            <div class="row m-0" id="nav-second-row">
                                <div class="container navbar p-1">
                                    <a class="nav-link fw-bold py-1" href="#">Produits</a>
                                    <a class="nav-link fw-bold py-1" href="#">Services</a>
                                    <a class="nav-link fw-bold py-1" href="#">Aide</a>
                                    <a class="nav-link fw-bold py-1" href="#">A Propos</a>
                                </div>
                            </div>

                            <div class="row justify-content-end m-0 bg-logo-vg" id="nav-third-row">
                                <div class="col-10 d-flex flew-row flex-nowrap px-0">
                                    <div class="container navbar d-flex flex-nowrap justify-content-end p-1">
                                        <div id="nav-third-row-item-guitar">
                                            <a id="item-guitar" class="nav-link ps-4" href="#">Guit/Bass</a>
                                            <div id="item-guitar-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="<?php echo site_url('Products/list/8'); ?>">Guitares Electriques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Guitares Classiques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="<?php echo site_url('Products/list/10'); ?>">Guitares Acoustiques<br>& Electro-acoustiques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="<?php echo site_url('Products/list/12'); ?>">Basses Electriques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Basses Acoustiques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Basses Semi-Acoustiques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Ukulélés</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Autres instruments à cordes pincées</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-drums">
                                            <a id="item-drums" class="nav-link ps-4" href="#">Batteries</a>
                                            <div id="item-drums-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Batteries Electriques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Batteries Acoustiques</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-keyboard">
                                            <a id="item-keyboard" class="nav-link ps-4" href="#">Claviers</a>
                                            <div id="item-keyboard-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Claviers Arrangeurs</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Claviers Maîtres</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Pianos Numériques</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-studio">
                                            <a id="item-studio" class="nav-link ps-4" href="#">Studio</a>
                                            <div id="item-studio-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Enceintes de monitoring</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Microphones</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Interfaces Audio</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Logiciels Studio</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Mobilier de studio</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-sono">
                                            <a id="item-sono" class="nav-link ps-4" href="#">Sono</a>
                                            <div id="item-sono-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Amplis de puissance</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Enceintes Actives</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Microphones</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Préamplificateurs Studio</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Packs enceintes</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-lights">
                                            <a id="item-lights" class="nav-link ps-4" href="#">Eclairages</a>
                                            <div id="item-lights-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Kits et packs lumières</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Lasers</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Lumière Noire</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Machines et liquides</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Projecteurs</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-dj">
                                            <a id="item-dj" class="nav-link ps-4" href="#">DJ</a>
                                            <div id="item-dj-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Casques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Effets DJ</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Mixers Numériques</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Platines vinyles</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Tables de mixage</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-cases">
                                            <a id="item-cases" class="nav-link ps-4" href="#">Cases</a>
                                            <div id="item-cases-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">DJ</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Elements rackables</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">flight case pour lumières</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Sono</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Pièces détachées</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="nav-third-row-item-accessories">
                                            <a id="item-accessories" class="nav-link ps-4" href="#">Accessoires</a>
                                            <div id="item-accessories-submenu" class="pb-1">
                                                <ul>
                                                    <li><a class="nav-link px-1 py-1" href="#">Accessoires claviers</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Accessoires guitares</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Accessoires DJ, sono<br>& Home studio</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Accessoires claviers</li></a>
                                                    <li><a class="nav-link px-1 py-1" href="#">Mobilier d'orchestre</li></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>