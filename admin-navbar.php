<nav class="navbar navbar-expand-xl navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Carehub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Carehub</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group navbar-nav justify-content-end flex-grow-1 text-center">
                <a class="btn btn-dark " href="admin.php">Admin List</a>
                <a class="btn btn-dark " href="blog-list.php">Blog List</a>
                <a class="btn btn-dark " href="department-list.php">Department List</a>
                <a class="btn btn-dark " href="doctor-list.php">Doctor List</a>
                <a class="btn btn-dark " href="website-info.php">Website Info</a>
                <a class="btn btn-dark " href="faq-list.php">FAQ List</a>
                <a class="btn btn-dark " href="message-list.php">Message List</a>
                <a class="btn btn-dark " href="service-list.php">Service List</a>
                <a class="btn btn-dark " href="cover.php">Cover List</a>
                
                <?php if (isset($_SESSION['loggedin'])) { ?>
                <a class="btn btn-dark " href="logout.php">Logout</a>
                <?php } ?>
                <?php if (!isset($_SESSION['loggedin'])) { ?>
                  <a class="btn btn-dark " href="login.php">Login</a>
                <?php } ?>
            </ul>
        </div>
      </div>
    </div>
</nav>