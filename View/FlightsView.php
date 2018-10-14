<?php

require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/footer.php";
?>
<div class="container">

  <div class="page__title">
    Flights
  </div>

    <!-- <form class="flights__search" id="searchFlight" action="searchDestination.php" method="get">
      <label for="FromLocation">Leaving From</label>
      <select name="FromLocation" id="FromLocation" >
               <option value="1">Stanstead</option>
       </select>
      <label for="ToLocation">Destination</label>
      <select name="ToLocation" id="ToLocation">
        <option value="Any">Any Destination</option>

       </select>

       <label for="ToDate">Leaving Date</label>
       <input type="date" name="ToDate" id="ToDate">
       <label for="FromDate">Returning Date</label>
       <input type="date" name="FromDate" id="FromDate">
       <label for="DayOfWeek">Day of the week</label>
       <select name="DayOfWeek" id="DayOfWeek" >
                <option value="AnyDay">Any</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
        </select>

      <button type="submit">Submit</button>
    </form> -->

  <form class="" action="" method="Get">

    <div class="search__inputs">

      <label class="search__from" for="FromLocation">From
        <select name="FromLocation" id="FromLocation">
                 <option value="1">Stanstead</option>
         </select>
      </label>

      <label class="search__to" for="ToLocation">Destination
        <select name="ToLocation" id="ToLocation">
          <option value="Any">Any Destination</option>
              <?php foreach ($destinationList as $destination) : ?>
                 <option value="<?= $destination->Destination_ID ?>">  <?= $destination->DestinationName ?>  </option>
              <?php endforeach ?>
         </select>
      </label>


      <label class="search__depart" for="ToDate">Leaving Date
        <input type="date" name="ToDate" id="ToDate">
      </label>

      <label class="search__return" for="FromDate">Returning Date
        <input type="date" name="FromDate" value="17/03/1997" id="FromDate">
      </label>

      <label class="search__passengers" for="DayOfWeek">Day of the week
        <select name="DayOfWeek" id="DayOfWeek">
               <option value="AnyDay">Any</option>
               <option value="Monday">Monday</option>
               <option value="Tuesday">Tuesday</option>
               <option value="Wednesday">Wednesday</option>
               <option value="Thursday">Thursday</option>
               <option value="Friday">Friday</option>
               <option value="Saturday">Saturday</option>
               <option value="Sunday">Sunday</option>
        </select>
      </label>

      <div class="search__submit">
        <input class="submit" type="submit" value="Search Flights">
      </div>

    </div>
  </form>

  <div class="sub__title">
    Outbound
  </div>

  <div class="displayFlights">
    <?php
    $min=300;
    $max=890;

    foreach ($outboundDes as $flight):

      if (strpos($flight->Description, 'Europe') !== false){
          $desType = "Europe";
        } else if(strpos($flight->Description, 'Domestic') !== false) {
          $desType = "Domestic";
      }
      $date = new DateTime($flight->DepartureDate);
      $time = new DateTime($flight->LeaveTime);
      $duration = new DateTime($flight->Duration);


      ?>


    <div class="card">
      <div class="flight__top" id="flight<?= $flight->Flight_ID ?>">
        <h1><?= $flight->ToDestination ?></h1>
        <h2>From <?= $flight->FromDestination ?></h2>
        <p>Departure Date: <?= $date->format('d/m/Y')?></p>
        <p>Departure Time: <?= $time->format('g:i A')?></p>

        <!-- <input type="hidden" name="flightName" value="<?=$flight->DepartureDate ?>"> -->
        <!-- <div class="flight__checkbox"><?= $desType ?></div> -->
        <p>Flight Duration: <?= $duration->format('H')?> hours</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £<?= rand($min,$max); ?></p>
        <button type="button" id="<?= $flight->Flight_ID ?>" name="addToBasket" onclick="addToBasket(this.id,'outbound')" class="btn primary">Add To Cart</button>
      </div>
    </div>
    <?php endforeach;?>

    <!-- <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe">
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div>

    <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe">
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div>

    <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe">
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div>

    <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe">
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div> -->


  </div>

  <div class="sub__title">
    Inbound
  </div>

   <div class="displayFlights">
  <?php foreach ($inboundDes as $flight2):

    if (strpos($flight2->Description, 'Europe') !== false){
      $desType = "Europe";
    } else if(strpos($flight2->Description, 'Domestic') !== false) {
      $desType = "Domestic";
    }

    $date = new DateTime($flight2->DepartureDate);
    $time = new DateTime($flight2->LeaveTime);
    $duration = new DateTime($flight2->Duration);

  ?>

  <div class="card">
    <div class="flight__top">
      <h1><?= $flight2->ToDestination ?></h1>
      <h2>From <?= $flight2->FromDestination ?></h2>
      <p>Departure Date: <?= $date->format('d/m/Y')?></p>
      <p>Departure Time: <?= $time->format('g:i A')?></p>

      <!-- <div class="flight__checkbox"><?= $desType ?></div> -->
      <p>Flight Duration: <?= $duration->format('H')?> hours</p>
    </div>
    <div class="flight__bot">
      <p>Flights from £<?= rand($min,$max); ?></p>
      <button type="button" id="<?= $flight2->Flight_ID ?>" name="addToBasket" onclick="addToBasket(this.id,'inbound')" class="btn primary">Add To Cart</button>
    </div>
  </div>

  <?php endforeach;?>
</div>
  <!-- <div class="displayFlights">

    <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe" checked>
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div>

    <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe">
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div>

    <div class="card">
      <div class="flight__top">
        <h1>To Stanstead</h1>
        <h2>From Paris</h2>
        <p>21st June - 8th July</p>
        <div class="flight__checkbox">
          <label for="Europe">Europe</label>
          <input type="checkbox"  value="Europe">
          <label for="Return">Return</label>
          <input type="checkbox"  value="Return">
        </div>
        <p>Book by 28th February 2018</p>
      </div>
      <div class="flight__bot">
        <p>Flights from £368</p>
        <button type="button" name="button" class="btn primary">Add To Cart</button>
      </div>

    </div>

 -->




</div>
