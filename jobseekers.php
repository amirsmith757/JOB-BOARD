<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Seekers | Job Board</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Job Board</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="employers.php">Employers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jobseekers.php">Job Seekers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>

  <!-- Login/Register Section -->
  <section class="login-register">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="section-heading">Login</h2>
          <form action="login.php" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
        <div class="col-lg-6">'
          <h2 class="section-heading">Create an Account</h2>
          <form action="register.php" method="post">
            <div class="mb-3">
              <label for="company" class="form-label">Company Name</label>
              <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
           </form>
        </div>
    </div>
<br><br>

<!-- Footer -->        
<footer class="bg-light py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p>&copy; 2023 Job Board. All rights reserved.</p>
      </div>
      <div class="col-lg-6">
        <ul class="list-inline mb-0 float-lg-end">
          <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
          <li class="list-inline-item"><a href="#">Terms of Service</a></li>
          <li class="list-inline-item"><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>
</html>