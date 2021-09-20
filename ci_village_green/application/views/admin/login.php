
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin-style.css');?>">
    <title>Connexion espace administateur</title>
</head>
<body>

<section id="main-container">
    <div id="adm">
        <div id="logo-vg">
            <img src="<?php echo base_url('assets/images/HEADER/logo_village_green.png');?>" alt="logo Village Green" title="logo Village Green">
        </div>

        <header>
            <h1>Connexion à l'espace Admin</h1>
        </header>

        <!-- Login Form -->
        <div id="adm-form">
            <?php echo form_open('Admin/login');?>
                <!-- Username -->
                <div>
                    <input id="com_username" name="com_username" type="text" placeholder="Identifiant" value="<?php echo set_value('com_username');?>">
                </div>
                <?php echo form_error('com_username'); ?>

                <!-- User pass  -->
                <div>
                    <input id="com_pass" name="com_pass" type="password" placeholder="Mot de passe">
                </div>
                <?php echo form_error('com_pass'); ?>

                <!-- Submit button -->
                <div>
                    <input id="submit" name="submit" type="submit" value="Envoi">
                </div>
                <div id="prev-page">
                    <a href="<?php echo site_url('Products/home');?>">Retour</a>
                </div>
            </form>
        </div>
    </div>
</section>

    
</body>
</html>