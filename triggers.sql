
DELIMITER |
CREATE TRIGGER after_insert_order_details AFTER INSERT
ON order_details FOR EACH ROW
BEGIN
    UPDATE products
    SET pro_phy_stk = products.pro_phy_stk - NEW.ode_qty
    WHERE pro_id = NEW.ode_pro_id;

END |
DELIMITER ;