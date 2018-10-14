<?php

require_once "includes/header.php";
require_once "includes/footer.php";
require_once "includes/nav.php";

?>
<div class="container">
  <!-- <p class="page__title">Login</p> -->
  <div class="user__wrapper">

    <div class="login__wrapper">
      <div class="login__image">

      </div>

      <form class="login__form" action="Login.php" method="post">

        <div class="login__form__header">
          <p>Sign in</p>
        </div>

        <div class="login__form__inputs">
          <input type="text" name="Username" placeholder="Username" required>
          <input type="password" name="Password" placeholder="Password" required>
        </div>

        <div class="login__form__submit">
          <input type="submit" class="btn primary" name="login" value="Login">
        </div>

        <div class="login__form__text">
          <p>No account? <a href="Register.php"> Sign up</a></p>
        </div>

      </form>
    </div>
  </div>
</div>
