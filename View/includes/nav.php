
<nav class="nav">

  <div class="nav__logo">
    <!-- <p>Fly Guys</p> -->
    <img src="../img/logo.png" alt="logo">
  </div>

<?php
  if (empty($_SESSION['User_ID']) && empty($_SESSION['Admin'])) { ?>

    <div class="nav__links">
      <a href="Landing.php">Home</a>
      <a href="searchDestination.php">Flights</a>
      <a href="#">Promotions</a>
      <!-- <a href="BasketViewController"><i class="nav__cart fa fa-shopping-cart" id="cart" aria-hidden="true"><?=cartCount()?></i></a> -->
      <a href="BasketViewController"><i class="btn btng bsk nav__cart fa fa-shopping-cart" id="cart" aria-hidden="true"> <?=cartCount()?></i></a>
      <div class="dropdown">
        <button class="bars primary"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <div class="dropdown-items">
          <a class="items__login" href="Login.php">Login</a>
          <a href="Register.php">Register</a>
        </div>
      </div>

    </div>

  <?php
  } else {
  ?>

  <div class="nav__links">
    <!-- <a href="Landing">Home</a>
    <a href="searchDestination">Flights</a> -->
    <!-- <a href="#">Promotions</a> -->
    <!-- <a href="BasketViewController"><i class="btn btng bsk nav__cart fa fa-shopping-cart" id="cart" aria-hidden="true"> <?=cartCount()?></i></a> -->


    <form class="logout" action="../Helpers/Helpers.php" method="post">
      <button class="btn btno xl" type="submit" name="logout">Logout</button>
    </form>
  </div>

  <?php } ?>
</nav>
