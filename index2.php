<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>


<?php  require_once 'header.php'; ?>

<main role="main" class="flex-shrink-0">

<?php 


if(isset($_GET['continent'])){
  $continent = $_GET['continent'];
  $desPays = getCountriesByContinent($continent);

} else {
  $continent = "Tous";
  $desPays = getAllCountries($continent);

}

?>

  <div class="container">
    <h1>Les pays en <?php echo $continent; ?></h1>
    <div>
     <table class="table">
         <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Population</th>
          <th>Continent</th>
          <th>Capital</th>
         </tr>
       <?php
       // $desPays est un tableau dont les éléments sont des objets représentant
       // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
       
       foreach($desPays as $pays){ ?>
          <tr>
            <td> <?php echo $pays->id ?></td>
            <td> <?php echo $pays->Name ?></td>
            <td> <?php echo $pays->Population ?></td>
            <td> <?php echo $pays->Continent ?></td>
            <td> <?php if (!empty($pays->Capital)) { echo getByCapital($pays->Capital); } else { echo "Vide"; } ?></td>
          </tr>
        <?php } ?>


     </table>
    </div>

  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
