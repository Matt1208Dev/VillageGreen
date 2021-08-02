<?php 
header('Access-Control-Allow-Origin: *');  

try 
{      
   $db = new PDO('mysql:host=localhost;dbname=village_green;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));   
} 
catch (Exception $e) 
{
   echo'Erreur : '.$e->getMessage().'<br>';
   echo'N° : '.$e->getCode(); 
   die('Fin du script');
}

$categorie = $_GET['pro_cat_id'];

$requete = "SELECT * FROM products WHERE pro_cat_id = $categorie";
$result = $db->query($requete);

$product = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($product);

$result->closeCursor();

?>