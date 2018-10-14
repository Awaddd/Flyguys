<?php

require_once "includes/header.php";
require_once "includes/nav.php";

require_once "../Helpers/Helpers.php";

?>

<div class="container">

  <div class="page__title">
    Admin Destinations
  </div>
  <!-- <div class="create__destination">

    <form class="create__destination__form" action="AdminDestinations" method="post">


      <input type="text" name="Destination" placeholder="Enter Destination" id="destination">


      <select class="dropdown__shadow" name="Type" id="type">
        <option value="Domestic">Domestic</option>
        <option value="Europe">Europe</option>
      </select>


      <input class="timepicker" type="time" name="Duration" placeholder="Enter Flight duration" id="duration">
      <input class="submit" type="submit" name="addDestination" value="Add Destination">
    </form>

  </div> -->



    <form class="create__destination__form" action="AdminDestinations.php" method="post">

      <div id="ed">
        Enter Destinations
      </div>
      <div id="sdt">
        Select Destination Type
      </div>
      <div class="">
        Enter Duration
      </div>
      <div id="go">
        Go
      </div>

        <input type="text" name="Destination" placeholder="...">


        <select class="dropdown__shadow" name="Type" id="type">
          <option value="Domestic">Domestic</option>
          <option value="Europe">Europe</option>
        </select>


        <input type="time" name="Duration" placeholder="Enter Flight duration">

        <input class="" type="submit" name="addDestination" value="Add Destination">


    </form>



  <div class="display__destinations">
    <div class="display__destinations__content">
      <!-- COLUMN HEADINGS -->
      <div class="display__destinations__th">
        <div class="">
          From Destination
        </div>
        <div class="">
          To Destination
        </div>
        <div class="">
          Type
        </div>
        <div class="">
          Duration
        </div>
        <div>
          <button type="button" name="" class="btn green edm" id="editDestination">Edit</button>
        </div>
      </div>
      <div class="destination__data">
      <!-- DATA -->
    <?php
     foreach ($schedule as $schedules) : ?>
      <div class="display__destinations__row">
        <div class="">
          <?= $schedules->FromDestination; ?>
        </div>
        <div class="">
          <?= $schedules->ToDestination; ?>
        </div>
        <div class="">
          <?= $schedules->Description; ?>
        </div>
        <div class="">
          <?= $schedules->Duration; ?>
        </div>
        <div class="display__destinations__btns">

          <form action="AdminDestinations.php" method="post">
            <?php
            if ($schedules->FromID == 1 && $schedules->ToID !== 1):
              $destinationID = $schedules->ToID;
            elseif ($schedules->ToID == 1 && $schedules->FromID !== 1):
              $destinationID = $schedules->FromID;
            endif;
            ?>
            <input class="editDes" type="hidden" name="editDes" value="<?= $destinationID ?>">
            <!-- <input id="editDestinationBtn" type="submit" name="editDestination" class="btn green" value="Edit"> -->
            <!-- <button type="button" name="editDestination" class="btn green edm" id="editDestinationBtn">Edit</button> -->

              <!-- Edit pop up -->


          </form>

          <form action="AdminDestinations.php" method="post">
            <?php
            if ($schedules->FromID == 1 && $schedules->ToID !== 1):
              $deleteDes = $schedules->ToID;
            elseif ($schedules->ToID == 1 && $schedules->FromID !== 1):
              $deleteDes = $schedules->FromID;
            endif;
            ?>
            <input type="hidden" name="deleteDes" value="<?= $deleteDes ?>">
            <input type="submit" name="deleteDestination" class="btn red" value="Delete">
          </form>
        </div>
      </div>
    <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div id="destinationModal" class="modal">
    <div class="modal__content destination__modal">
      <div class="modal__header">
        <span id="editDestinationsExit" class="modal__exit">&times;</span>
        <h2>Edit Destinations</h2>
      </div>
      <div class="modal__body destination__modal__body">
        <form class="editDestination" action="" method="post">
          <label for="destinationNames">Select the destination</label>
          <select id="destinationNames" name="oldDestination">
            <?php foreach ($destinations as $destination): ?>
              <option value="<?= $destination->Destination_ID ?>"><?= $destination->DestinationName ?></option>
            <?php endforeach; ?>
          </select>
          <label for="destinationName">Enter the new name</label>
          <input id="destinationName" type="text" name="newDestinationName">
          <label for="duration">Change the duration</label>
          <input id="duration" type="time" name="newDuration">
          <input class="btn primary" type="submit" name="editDestination" value="Update">
        </form>
      </div>
    </div>
  </div>

</div>
<?php
require_once "includes/footer.php";
?>
