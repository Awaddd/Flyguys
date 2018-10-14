<?php

require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/footer.php";
// $basket=unserialize (serialize ($_SESSION['ShoppingBasket'][0]));
$basket=unserialize (serialize ($_SESSION['ShoppingBasket']));

 ?>
 <div class="container">

   <div class="page__title">
     Basket
   </div>
   <table>
     <tr>
       <th>Traveling To</th>
       <th>Traveling From</th>
       <th>Departure Date</th>
       <th>Flight Duration</th>
       <th>Departure Time</th>
       <th>Cancel Flight</th>
     </tr>
   <?php foreach ($basket as $flight):?>
   <tr id="flight<?= $count ?>">
     <td><?= $flight->ToDestination?></td>
     <td><?= $flight->FromDestination?></td>
     <td><?= $flight->DepartureDate?></td>
     <td><?= $flight->Duration?></td>
     <td><?= $flight->LeaveTime?></td>
     <td><button value="<?= $count++ ?>" type="button" onclick="deleteFromCart(this.value)">Remove</button></td>
   </tr>

   <?php endforeach;?>
 </table>
 </div>
