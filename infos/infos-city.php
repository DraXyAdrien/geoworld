
<?php  require_once '../header.php'; ?>

<main role="main" class="flex-shrink-0">

<?php 


if(isset($_GET['city'])){
  $city = $_GET['city'];
  $laville = getCity($city);

} else {
    header("/index.php");
}

?>

  <div class="container">
    <h1>Information(s) sur la ville : <?php echo $city; ?></h1>
    <div>
     <table class="table">
         <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>District</th>
          <th>Population</th>
         </tr>


         <?php foreach($lesvilles as $city){ ?>


          <tr>
            <td> <?php echo $city->id ?></td>
            <td> <a href="/infos/infos-city.php?city=<?php echo $city->Name ?>"><?php echo $city->Name ?></td></a>
            <td> <?php echo $city->Population ?></td>
          </tr>

        <?php } ?>


     </table>
    </div>

  </div>
</main>

<?php
require_once '../javascripts.php';
require_once '../footer.php';
?>
