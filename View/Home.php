<?php

// foreach(glob('./includes/*.php') as $filename){
//   require_once $filename;
// }
//
// spl_autoload_register(function($className){
//   require_once 'libraries/' . $className . '.php';
// });

require_once "includes/header.php";
require_once "includes/nav.php";
require_once "includes/footer.php";

?>

<div class="container">

  <div class="home__block">
    <div class="home__block__text">
      <h1>Love the view?</h1>
      <p>Don't listen to what we say - Go see.</p>
    </div>
  </div>


    <!-- <div class="search__inputs">
      <label class="search__from" for="from">From
      <input type="text" id="fromDes" name="from" placeholder="Country, city">
      <div id="searchResults"></div>
      </label>
      <label class="search__to" for="to">To
      <input type="text" name="to" placeholder="Country, city">
      </label>
      <label class="search__depart" for="depart">Depart
      <input type="date" name="depart" value="17/07/1997">
      </label>
      <label class="search__return" for="return">Return
      <input type="date" name="return" value="17/03/1997">
      </label>
      <label class="search__passengers" for="travellers">No. Passengers
      <input type="text" name="travellers" placeholder="1 adult">
      </label>
      <div class="search__submit">
      <input class="submit" type="submit" value="Search Flights">
      </div>
    </div> -->


    <form class="" action="searchDestination.php" method="post">

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



  <div class="home__bottom">

    <div class="home__card">
      <i class="fa fa-plane  home__icon" aria-hidden="true"></i>
      <p class="card__title ">Fly With Us</p>
    </div>

    <div class="home__card">
      <i class="fa fa-globe  home__icon" aria-hidden="true"></i>
      <p class="card__title ">We Are Global</p>
    </div>

    <div class="home__card">
      <i class="fa fa-suitcase  home__icon" aria-hidden="true"></i>
      <p class="card__title">Flying Business?</p>
    </div>

    <div class="home__card">
      <i class="fa fa-wifi home__icon" aria-hidden="true"></i>
      <p class="card__title">Free Wifi</p>

    </div>

  </div>

</div>
