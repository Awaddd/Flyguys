<?php
require_once "includes/header.php";
require_once "includes/nav.php"; ?>

  <div class="container">

    <div class="checkout__wrapper">
      <div class="page__title">Checkout</div>

      <div class="checkout__top">

        <div class="checkout__top__header">
          <h2>Your order: <span class="prime">£690</span></h2><br>
          <p>Total items: 1 Outbound flight + 1 Return flight</p>
        </div>

        <div class="checkout__top__content">

          <div class="checkout__flight">
            <div class="checkout__flight__left">
              <h3>Outbound</h3>
              <p>To Manchester</p>
            </div>
            <div class="checkout__flight__right prime">
              £369
            </div>
          </div>

          <div class="checkout__flight__plus">
            <i class="fa fa-plus-square-o prime" aria-hidden="true"></i>
          </div>

          <div class="checkout__flight">
            <div class="checkout__flight__left">
              <h3>Return</h3>
              <p>From Manchester</p>
            </div>
            <div class="checkout__flight__right prime">
              £369
            </div>
          </div>

        </div>

      </div>
      <div class="checkout__bot">
        <form class="checkout__form" action="" method="post">

          <div class="checkout__col">
            <div class="checkout__title">Personal</div>
            <input type="text" name="" value="" placeholder="First name" required>
            <input type="text" name="" value="" placeholder="Last name" required>
            <input type="text" name="" value="" placeholder="Phone number" required>
            <input type="text" name="" value="" placeholder="x" required>
          </div>

          <div class="checkout__col">
            <div class="checkout__title">Address</div>
            <input type="text" name="" value="" placeholder="Address line 1" required>
            <input type="text" name="" value="" placeholder="Address line 2" required>
            <input type="text" name="" value="" placeholder="City" required>
            <input type="text" name="" value="" placeholder="Post code" required>
          </div>

          <div class="checkout__btn">
            <input class="btn btno" type="submit" name="checkout" value="Proceed">
          </div>

        </form>
      </div>
    </div>
  </div>

<?php require_once "includes/footer.php"; ?>
