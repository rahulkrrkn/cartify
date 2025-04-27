<?php if (isset($_SESSION["CFsellerData"]["SNo"]) || isset($_SESSION["CFsupportData"]["SNo"]) || isset($_SESSION["CFadminData"]["SNo"])) { ?>

  <li class="NavElement">
    <p>
      <i class="fas fa-user-circle fa-lg"></i>
      <span>Switch Account</span>
      <i class="fa-solid fa-angle-right fa-lg NavAngleToggle"></i>
    </p>
    <ul>
      <?php
      if ($_SESSION["CFglobal"]["userIs"] == "seller" || $_SESSION["CFglobal"]["userIs"] == "support" || $_SESSION["CFglobal"]["userIs"] == "admin") { ?>

        <li>
          <a href="/cartify/user/">
            <i class="fas fa-user"></i> User Panel</a>
        </li>
      <?php
      }
      ?>
      <?php
      if (isset($_SESSION["CFsellerData"]["SNo"]) && $_SESSION["CFglobal"]["userIs"] != "seller") {
      ?>
        <li>
          <a href="/cartify/seller/">
            <i class="fas fa-store"></i> Seller Dashboard</a>
        </li>
      <?php
      }
      ?>
      <?php
      if (isset($_SESSION["CFsupportData"]["SNo"]) && $_SESSION["CFglobal"]["userIs"] != "support") {
      ?>
        <li>
          <a href="/cartify/support/">
            <i class="fas fa-headset"></i> Support Center</a>
        </li>
      <?php
      }
      ?>
      <?php
      if (isset($_SESSION["CFadminData"]["SNo"]) && $_SESSION["CFglobal"]["userIs"] != "admin") {
      ?>
        <li>
          <a href="/cartify/admin/">
            <i class="fas fa-user-shield"></i> Admin Panel</a>
        </li>
      <?php
      }
      ?>




    </ul>
  </li>
<?php
}
?>





<?php if (!isset($_SESSION["CFuserData"]["SNo"])) { ?>
  <li class="NavElement">
    <a href="/cartify/account/login-using-password/">
      <i class="fa-solid fa-right-to-bracket fa-lg"></i>
      <span>Login</span>
    </a>
  </li>
  <li class="NavElement">
    <a href="/cartify/account/set-new-password/">
      <i class="fa-solid fa-key fa-lg"></i>
      <span>Forgot Password</span>
    </a>
  </li>

<?php } else if (isset($_SESSION["CFuserData"]["SNo"])) { ?>


  <li class="NavElement">
    <p>
      <i class="fa-regular fa-user-circle fa-lg"></i>
      <span>Account</span>
      <i class="fa-solid fa-chevron-right fa-lg NavAngleToggle"></i>
    </p>
    <ul>
      <li>
        <a href="/cartify/account/profile/">
          <i class="fa-regular fa-id-card"></i> View Profile
        </a>
      </li>
      <li>
        <a href="/cartify/account/edit-profile/">
          <i class="fa-solid fa-user-pen"></i> Edit Profile
        </a>
      </li>
      <?php
      if (!isset($_SESSION["CFuserData"]["MobileNo"]) && isset($_SESSION["CFuserData"]["SNo"])) {
        echo '<li>
            <a href="/cartify/account/add-mobile-no/">
                <i class="fa-solid fa-mobile-screen-button"></i> Add Mobile Number
            </a>
        </li>';
      }
      ?>
      <?php
      if (!isset($_SESSION["CFuserData"]["Password"]) && isset($_SESSION["CFuserData"]["SNo"])) {
        echo '<li>
            <a href="/cartify/account/set-new-password/">
                <i class="fa-solid fa-mobile-screen-button"></i> Set Password
            </a>
        </li>';
      }
      ?>

    </ul>
  </li>


<?php
}
?>