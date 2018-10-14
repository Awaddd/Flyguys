<?php

require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/footer.php";
// $basket=unserialize (serialize ($_SESSION['ShoppingBasket'][0]));
$basket=unserialize (serialize ($_SESSION['ShoppingBasket']));
$min=300;
$max=890;
 ?>
 <div class="container">

   <div class="page__title">
     Basket
   </div>

 <div class="display__basket">
   <div class="display__basket__content">

     <div class="display__basket__th">
       <div class="">
         Travelling To
       </div>
       <div class="">
         Travelling From
       </div>
       <div class="">
          Departure Date
       </div>
       <div class="">
         Flight Duration
       </div>
       <div class="">
         Departure Time
       </div>
       <div class="">
         Price
       </div>
       <div class="">
         Cancel Flight
       </div>
     </div>
     <?php foreach ($basket as $flight):?>

     <div class="display__basket__row">
       <div class="">
         <?= $flight->ToDestination?>
       </div>
       <div class="">
        <?= $flight->FromDestination?>
       </div>
       <div class="">
        <?= $flight->DepartureDate?>
       </div>
       <div class="">
        <?= $flight->Duration?>
       </div>
       <div class="">
        <?= $flight->LeaveTime?>
       </div>
       <div class="">
        £<?= rand($min,$max); ?>
       </div>
       <div class="">
        <button class="btn primary" value="<?= $count++ ?>" type="button" onclick="deleteFromCart(this.value)">Remove</button>
       </div>
     </div>
    <?php endforeach;?>
   </div>
 </div>
 <div class="basket__button">
   <a class="btn primary" href="Booking">Proceed to booking</a>
 </div>
</div>
