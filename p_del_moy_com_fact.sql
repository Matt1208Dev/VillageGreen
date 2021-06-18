
-- Procédure de calcul du delai moyen de facturation des commandes 

DELIMITER |

CREATE PROCEDURE p_del_moy_com_fact(OUT result INT)

BEGIN

SELECT ROUND(AVG(DATEDIFF(`ord_bil_date`, `ord_date`))) AS `Delai`
FROM `orders`
WHERE `ord_bil_date` NOT LIKE 'null';

END |

DELIMITER ;