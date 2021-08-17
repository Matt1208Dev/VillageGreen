<?php var_dump($_SESSION);?>
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
    
<div class="main-container container justify-content-between p-0"> <!-- Ouverture du container principal -->
<div class="row g-0 d-flex justify-content-between ">
    <nav class="navbar navbar-expand-lg container-fluid p-0">
        <!-- <div class="container-fluid navbar navbar-expand p-0"> -->
            <div class="row container-fluid p-0 m-0 ">
                <div id="navlogo" class="p-0">
                    <!-- <a class="navbar-brand" href="<?php echo site_url('Produits/accueil');?>"> -->
                        <img id="logo" src="<?php echo base_url('assets/images/HEADER/logo village green.png');?>" alt="Logo Village Green" title="Logo Village Green">
                    <!-- </a> -->
                </div>

                <div id="navbar" class="p-0">

                    <div class="row m-0" id="nav-first-row">
                        <div class="container navbar d-flex justify-content-end p-0" id="nav-first-row-div">
                                <a class="nav-link" href="#">Infos</a>
                                <div id="item-client" class="d-inline-block">
                                    <a class="nav-link" href="#">Espace Client</a>

                                    <?php   
                                        if(!isset($_SESSION['logged_in']) || (!$_SESSION['logged_in'])):   
                                    ?>

                                    <div id="item-client-submenu" class="justify-content-center py-3 px-4 bg-white rounded">                                       
                                        <div class="border-end border-1 border-warning d-flex flex-column align-items-stretch">
                                            <?php echo form_open('Customers/login', 'class="d-flex flex-column justify-content-between h-100 px-4"');?>
                                                <header class="px-2 text-center">
                                                    <h6 class=" fw-bold">
                                                        Etes-vous déjà client chez nous ?
                                                    </h6>
                                                </header>
                                                <div class="d-flex flex-column justify-content-center align-content-center px-2">
                                                    <div class="mb-3">
                                                        <input class="form-control border" type="email" name="cus_mail" id="email" placeholder="Adresse E-mail">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input class="form-control" type="password" name="cus_pass" id="password" placeholder="Mot de passe">
                                                    </div>
                                                    <div class="d-flex align-content-center mb-3">
                                                        <input class="form-check-input me-1" type="checkbox" name="stay-connected" id="stay-connected" value="yes">
                                                        <label class="form-check-label" for="stay-connected">Rester connecté</label>
                                                    </div> 
                                                    <div class="d-grid">        
                                                        <input class="nav-link btn mb-1 px-2 text-white fw-bold orange-gradient" type="submit" id="submit" value="Se connecter maintenant">
                                                    </div>
                                                        <a class="nav-link px-2 text-center" href="#">Vous avez oublié votre mot de passe ?</a>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <div class="col-6 px-4">
                                            <header class="text-center">
                                                <h6 class="mb-1 px-2 fw-bold">
                                                    N'êtes-vous pas encore client ?
                                                </h6>
                                            </header>
                                            <p>
                                                En tant que client Village Green, vous pouvez suivre vos envois, lire des tests produits exclusifs, évaluer des produits, déposer des petites annonces, gérer vos chèques-cadeaux, devenir partenaires et plus encore.
                                            </p>
                                            <div>
                                                <a class="nav-link btn  text-white fw-bold mb-1 px-2 orange-gradient" role="link" href="<?php echo site_url('Customer/signUp');?>">S'inscrire</a>
                                            </div>
                                                <a class="nav-link btn" href="#">Plus d'informations</a>
                                        </div>
                                    </div>

                                    <?php
                                        else:
                                    ?>
                                    <div id="item-client-submenu2" class="justify-content-center py-3 px-4 bg-white rounded">
                                        <div class="d-flex flex-column align-items-stretch">                                         
                                            <header class="px-2 text-center">
                                                <h6 class=" fw-bold border-bottom pb-3 border-1 border-warning">
                                                    Mon Compte
                                                </h6>
                                            </header>
                                            <div class="d-flex flex-column justify-content-center align-content-center px-2 mt-2">
                                                <p class="mb-2">Bonjour, <span class="fw-bold"><?php echo ($_SESSION['username']);?></span></p> 
                                                <div class="d-grid">        
                                                    <a class="btn text-white fw-bold mt-1 orange-gradient" role="button" href="">Accéder à mon espace</a>
                                                    <a class="btn" role="button" href="<?php echo site_url('Customers/logOut');?>">Me déconnecter</a> 
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>

                                    <?php 
                                    endif;
                                    ?>

                                </div>
                                <a class="nav-link" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('assets/images/HEADER/picto panier.png');?> " alt="pictogramme panier d'achat" title="Votre panier">
                                </a>
                                <a class="nav-link" href="#">
                                    <img src="<?php echo base_url('assets/images/HEADER/picto pays.png');?> " alt="pictogramme pays" title="Langue de navigation">
                                </a>
                                <a class="nav-link" href="<?php echo site_url('Admin/login');?>">
                                    <img src="<?php echo base_url('assets/images/icons/lock.svg');?> " alt="pictogramme cadenas" title="Espace réservé aux administrateurs" width="26" >
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

                    <div class="row m-0" id="nav-third-row">
                        <div class="container navbar d-flex justify-content-end p-1">
                            <div id="nav-third-row-item-guitar">
                                <a id="item-guitar" class="nav-link pr-1 px-3 me-2" href="#">Guit/Bass</a>   
                                <div id="item-guitar-submenu">
                                    <ul>
                                        <li><a class="nav-link px-1 py-1" href="<?php echo site_url('Produits/list/8');?>">Guitares Electriques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Guitares Classiques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="<?php echo site_url('Produits/list/10');?>">Guitares Acoustiques<br>& Electro-acoustiques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="<?php echo site_url('Produits/list/12');?>">Basses Electriques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Basses Acoustiques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Basses Semi-Acoustiques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Ukulélés</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Autres instruments à cordes pincées</li></a>
                                    </ul>
                                </div>
                            </div>
                            <div id="nav-third-row-item-drums">
                                <a id="item-drums" class="nav-link pr-1 px-3 me-2" href="#">Batteries</a>
                                <div id="item-drums-submenu">
                                    <ul>
                                        <li><a class="nav-link px-1 py-1" href="#">Batteries Electriques</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Batteries Acoustiques</li></a>
                                    </ul>
                                </div>
                            </div>
                            <div id="nav-third-row-item-keyboard">
                                <a id="item-keyboard" class="nav-link pr-1 px-3 me-2" href="#">Claviers</a>
                                <div id="item-keyboard-submenu">
                                    <ul>
                                        <li><a class="nav-link px-1 py-1" href="#">Claviers Arrangeurs</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Claviers Maîtres</li></a>
                                        <li><a class="nav-link px-1 py-1" href="#">Pianos Numériques</li></a>
                                    </ul>
                                </div>
                            </div>
                            <div id="nav-third-row-item-studio">
                                <a id="item-studio" class="nav-link pr-1 px-3 me-2" href="#">Studio</a>
                                <div id="item-studio-submenu">
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
                                <a id="item-sono" class="nav-link pr-1 px-3 me-2" href="#">Sono</a>
                                <div id="item-sono-submenu">
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
                                <a id="item-lights" class="nav-link pr-1 px-3 me-2" href="#">Eclairages</a>
                                <div id="item-lights-submenu">
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
                                <a id="item-dj" class="nav-link pr-1 px-3 me-2" href="#">DJ</a>
                                <div id="item-dj-submenu">
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
                                <a id="item-cases" class="nav-link pr-1 px-3 me-2" href="#">Cases</a>
                                <div id="item-cases-submenu">
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
                                <a id="item-accessories" class="nav-link pr-1 px-3 me-2" href="#">Accessoires</a>
                                <div id="item-accessories-submenu">
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
        <!-- </div> -->
    </nav>
</div>
