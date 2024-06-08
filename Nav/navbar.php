<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<a class="navbar-brand" href="Dashboard.php"><img src="ASSETS/Logo.png" height="32px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Enrollment
        </a>
        <div class="dropdown-menu" aria-labelledby="contactDropdown">
          <a class="dropdown-item" href="enrollment_student.php">Student</a>
          <a class="dropdown-item" href="enrollment_staff.php">Staff</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="servicesDropdown">
          <a class="dropdown-item" href="service1.php">Service 1</a>
          <a class="dropdown-item" href="service2.php">Service 2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="service3.php">Service 3</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
