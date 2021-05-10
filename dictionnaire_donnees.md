
Dictionnaire des données VillageGreen

## Categories
cat_id INT               // Id catégorie
cat_name VARCHAR(50)     // nom catégorie
cat_parent INT           // Catégorie parente

## Products
pro_id                   // Id produit
pro_ref VARCHAR (15)     // réf fournisseur
pro_label VARCHAR(30)    // libellé
pro_desc VARCHAR(255)    // description
pro_ppet DECIMAL(7,2)    // Prix achat HT
pro_spet DECIMAL(7,2)    // Prix vente HT
pro_photo VARCHAR(255)   // URL photo
pro_phy_stk INT          // stock physique
pro_lock BOOLEAN         // blocage produit
pro_add_date             // date de création
pro_mod_date             // date de modification

## Suppliers
sup_id  INT                 // Id fournisseur
sup_type  VARCHAR(15)       // Type fournisseur (Constructeur/importateur)
sup_name  VARCHAR(50)       // nom
sup_address VARCHAR(255)    // adresse
sup_postalcode INT(5)       // code postal
sup_city  VARCHAR(30)       // Ville
sup_contact VARCHAR(30)     // nom du contact
sup_phone INT(10)           // téléphone du contact
sup_mail  VARCHAR(255)      // email du contact

## Clients
cli_id  INT                        // Id client
cli_lastname   VARCHAR(50)         // Nom
cli_firstname   VARCHAR(30)        // Prénom
cli_sex   BOOLEAN                  // sexe
cli_bil_address VARCHAR(255)       // Adresse de facturation
cli_bil_postalcode INT(6)          // code postal de facturation
cli_bil_city  VARCHAR(30)          // ville de facturation
cli_del_address VARCHAR(255)       // Adresse de livraison
cli_del_postalcode INT(6)          // code postal de livraison
cli_del_city  VARCHAR(30)          // ville de livraison
cli_phone   INT(10)                // téléphone
cli_mail   VARCHAR(255)            // email
cli_type   VARCHAR(15)             // typologie (particulier/professionnel)
cli_coef   DECIMAL (3,2)           // coefficient tarifaire

## Commerciaux
com_id    INT                  // Id commercial
com_lastname   VARCHAR(50)     // nom
com_firstname  VARCHAR(30)     // prénom

## Orders
ord_id    INT                   // Id commande
ord_date  DATE                  // date commande
ord_discount   DECIMAL(4,2)     // remise exceptionnelle
ord_pay_method    VARCHAR(10)   // modalité de paiement (comptant/différé)

## Order_status
sta_id    INT            // Id statut
sta_label VARCHAR(20)    // libelle

## Order_details
ode_id    INT                       // Id ligne de commande
ode_qty   INT                       // quantité
ode_tot_exc_tax     DECIMAL(7,2)    // total ligne HT
ode_tax_rate   DECIMAL(4,2)
ode_tot_all_tax_inc   DECIMAL(7,2)  // total ligne TTC

## Deliveries
del_id  INT              // Id livraison
del_date  DATE           // date livraison

## Bills
bil_id    INT            // Id facture
bil_date  DATE           // date de facturation

### Equipe gestion produits/fournisseurs
GRANT CRU sur categories, produits

### Service Commercial
GRANT RU sur clients et la colonne ord_discount de orders

### Conservation des données de commandes et documents associés pendant 3 ans