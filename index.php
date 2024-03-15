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
          <th>Flag</th>
          <th>Nom</th>
          <th>Population</th>
          <th>Continent</th>
          <th>Capital</th>
         </tr>

          <?php foreach($desPays as $pays){ 
          $image = strtolower($pays->Code2);
          $image = "$image.png";
          ?>

          <tr>
            <td> <?php echo $pays->id ?></td>
            <td> <img src="images/flags/<?php if(file_exists("images/flags/$image")) { echo $image; } else { echo "vide.png"; } ?>"> </td>
            <td> <a href="infos/infos-city.php?city=<?php echo $pays->Name ?>"><?php echo $pays->Name ?></a></td>
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
