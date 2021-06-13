-- 3.1.3 - chiffre d'affaires hors taxes généré pour l'ensemble et par fournisseur --

    -- TOTAL CA HT sans critère (fournisseur, produit, période)

SELECT SUM(`ode_tot_exc_tax`) 
FROM `order_details`;


    -- TOTAL VENTES CA HT par fournisseur sans critère de temps trié par ordre décroissant

SELECT  `sup_id` AS `idFournisseur`,
        `sup_name` AS `Fournisseur`,
        SUM(`ode_tot_exc_tax`) AS `Total CA HT`
FROM `order_details` 
JOIN `products` 
    ON `ode_pro_id` = `pro_id` 
JOIN `suppliers` 
    ON `pro_sup_id` = `sup_id` 
GROUP BY `idFournisseur` 
ORDER BY `Total CA HT` DESC;


-- 3.1.4 - liste des produits commandés pour une année sélectionnée (référence et nom du produit, quantité commandée, fournisseur)

    -- liste des produits commandés pour une année sélectionnée (ici 2021)

SELECT `pro_ref` AS `Reference produit`,
`pro_label` AS `Libelle produit`,
`ode_qty` AS `Quantite`,
`sup_id` `id Fournisseur`,
`sup_name` AS `Fournisseur`
FROM `order_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
JOIN `products`
    ON `ode_pro_id` = `pro_id`
JOIN `suppliers`
    ON `pro_sup_id` = `sup_id`
WHERE `ord_date` LIKE "2021%"; 

    -- liste des produits commandés pour une année sélectionnée groupage des quantités par libellé produit

SELECT  `pro_ref` AS `Reference produit`,
        `pro_label` AS `Libelle produit`,
        SUM(`ode_qty`) AS `Quantite`,
        `sup_id` `id Fournisseur`,
        `sup_name` AS `Fournisseur`
FROM `order_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
JOIN `products`
    ON `ode_pro_id` = `pro_id`
JOIN `suppliers`
    ON `pro_sup_id` = `sup_id`
WHERE `ord_date` LIKE "2021%"
GROUP BY `Libelle produit`; 

-- 3.1.5 - liste des commandes pour un client (date de commande, référence client, montant, état de la commande)

SELECT  `ord_date` AS `Date de commande`, 
        `ord_id` AS `Numero de commande`, 
        `ord_cus_id` AS `Reference client`, 
        `cus_firstname` AS `Prenom client`, 
        `cus_lastname` AS `Nom client`, 
        ROUND(((1-`ord_discount`/100) * (SELECT SUM(`ode_tot_exc_tax`)
                                        FROM `order_details`
                                        JOIN `orders`
                                            ON `ode_ord_id` = `ord_id`
                                        JOIN `customers`
                                            ON `ord_cus_id` = `cus_id`
                                        WHERE `cus_firstname` = "Diego" AND `cus_lastname` = "Pons"
                                        GROUP BY `Numero de commande`)), 2) AS `Total`, 
        `ost_label` AS `Statut commande`
            FROM `orders`
            JOIN `customers`
                ON `ord_cus_id` = `cus_id`
            JOIN `order_status`
                ON `ord_ost_id` = `ost_id`
            WHERE `cus_firstname` = "Diego" AND `cus_lastname` = "Pons"
            GROUP BY `Numero de commande`;

-- 3.1.6 - répartition du chiffre d'affaires hors taxes par type de client

    -- TOTAL VENTES CA HT par type client sans critère de temps


SELECT  `cus_type` AS `Type Client`, 
        SUM(`ode_tot_exc_tax`) AS `Total CA HT`
FROM `order_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
JOIN `customers` 
    ON `ord_cus_id` = `cus_id`  
GROUP BY `Type Client`; 

    -- TOTAL VENTES CA HT par type client sur une année donnée


SELECT  `cus_type` AS `Type Client`, 
        SUM(`ode_tot_exc_tax`) AS `Total CA HT`
FROM `order_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
JOIN `customers` 
    ON `ord_cus_id` = `cus_id`  
WHERE `ord_date` LIKE "2021%"
GROUP BY `Type Client`; 


-- 3.1.7 - lister les commandes en cours de livraison.

    -- Commandes expédiées. Affichage par ligne produit en statut "expédiée"

SELECT  `ord_id` AS `Numero de commande`,
        `cus_lastname` AS `Nom`,
        `cus_firstname` AS `Prenom`,
        `ord_date` AS `Date commande`,
        `pro_ref` AS `Ref produit`,
        `pro_label` AS `Libellé produit`,
        `ord_del_time` AS `Date de livraison prevue`,
        `dde_del_date` AS `Date d'expedition`,
        `ost_label` AS `Statut`
FROM `orders`
JOIN `customers` 
    ON `ord_cus_id` = `cus_id`
JOIN `order_status`
    ON `ord_ost_id` = `ost_id`
JOIN `order_details`
    ON `ord_id` = `ode_ord_id`
JOIN `delivery_details`
    ON `ode_id` = `dde_ode_id`
JOIN `products`
	ON `ode_pro_id` = `pro_id`
WHERE `ost_label` = "Expédiée";

