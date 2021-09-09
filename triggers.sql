

-- TRIGGER de mise à jour du stock d'un produit à la baisse après une vente

DELIMITER |
CREATE TRIGGER after_insert_order_details AFTER INSERT
-- A toute nouvelle insertion d'une ligne produit dans la table order_details
ON order_details FOR EACH ROW
BEGIN
    -- On retranche la quantité insérée à celle du stock du produit ciblé dans la table `products`
    UPDATE products
    SET pro_phy_stk = products.pro_phy_stk - NEW.ode_qty
    WHERE pro_id = NEW.ode_pro_id;

END |
DELIMITER ;

-- TRIGGER de mise à jour du stock d'un produit à la hausse après une annulation de commande

DELIMITER |
CREATE TRIGGER after_update_order_details AFTER UPDATE
ON order_details FOR EACH ROW
BEGIN
    -- Si le statut d'une ligne produit passe à "8" ("Annulée")
    IF NEW.ode_ost_id = 8
    -- Alors on ajoute la quantité commandée de cette ligne pour au stock du produit enregistré en bdd
    THEN
    UPDATE products
    SET pro_phy_stk = products.pro_phy_stk + NEW.ode_qty
    WHERE pro_id = NEW.ode_pro_id;
    END IF;

END |
DELIMITER ;