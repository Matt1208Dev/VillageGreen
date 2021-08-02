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

$categorie = $_GET['cat_parent_id'];

$requete = "SELECT * FROM categories WHERE cat_parent_id = $categorie";
$result = $db->query($requete);

$SubCategories = $result->fetchAll(PDO::FETCH_OBJ);
echo json_encode($SubCategories);

$result->closeCursor();

?>