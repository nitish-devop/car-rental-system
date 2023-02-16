<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Car Rental System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php
      if (!isset($_SESSION['isAgencyLoggedIn']) && !isset($_SESSION['isCustLoggedIn'])) {
        echo '
            <div class="d-flex  ">
              <a type="button" class="btn btn-primary m-2" href="./customer/login.php">Customer</a>
              <a type="button" class="btn btn-primary m-2" href="./agency/login.php">Agency</a>
            </div>';
      } else
        echo '
          <div class="d-flex ">
            <a  class="btn btn-primary" href="logout.php">Logout</a>
          </div>';
      ?>
    </div>
  </div>
</nav>