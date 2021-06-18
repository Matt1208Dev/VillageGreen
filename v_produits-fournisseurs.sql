--  Vue produits-fournisseurs

CREATE OR REPLACE VIEW V_produits_fournisseurs
AS SELECT `pro_id` AS `idProduit`, `pro_ref` AS `RefProduit`, `pro_label` AS `Libelle`, `pro_ppet` AS `PA HT`, `pro_spet` AS `PV HT`, `pro_phy_stk` AS `Stock`, `pro_lock` AS `Verrou`, `pro_add_date` AS `DateAjout`, `sup_id` AS `idFournisseur`, `sup_type` AS `TypeFournisseur`, `sup_name` AS `Nom`, `sup_contact` AS `Contact`, `sup_phone` AS `Telephone`, `sup_mail` AS `Mail` 
FROM `products`
JOIN `suppliers`
ON `pro_sup_id` = `sup_id`;