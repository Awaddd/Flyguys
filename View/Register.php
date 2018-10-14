<?php

require_once "includes/header.php";
require_once "includes/footer.php";
require_once "includes/nav.php";

?>
<div class="container">
  <!-- <p class="page__title">Register</p> -->
  <div class="user__wrapper">
    <div class="login__wrapper">


      <form class="login__form" action="Register" method="post">

        <div class="login__form__header">
          <p>Sign up</p>
        </div>

        <div class="login__form__inputs">
          <input type="text" name="Username" placeholder="Username" required>
          <input type="password" name="Password" placeholder="Password" required>
        </div>

        <div class="login__form__submit">
          <input type="submit" class="btn primary" name="register" value="Register">
        </div>

        <div class="login__form__text">
          <p>Got an account? <a href="Login"> Sign in here</a></p>
        </div>

      </form>

      <div class="register__image">

      </div>

    </div>
  </div>
</div>
