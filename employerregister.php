<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Registration | Job Board</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css"/>
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
            <a class="nav-link" href="employers.php">Sign In</a>
         </li>
          <li class="nav-item">
            <a class="nav-link" href="employers.php">For Employers</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<section class="hero" style="background-image: url('coworkers.png')">
<div class="container">
<div class="row">
<div class="col-lg-12">

<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $company = $_POST['company'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // TODO: Validate the form data

  // Connect to the database
  $conn = new mysqli('localhost', 'asmith404', 'U6adxN4fT1cMjCSy', 'asmith404');

  // Check for errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the data into the database
  $sql = "INSERT INTO users_employer (company_name, email, password) VALUES ('$company', '$email', '$hashed_password')";
  if ($conn->query($sql) === TRUE) {
    // Registration successful
    echo '<h2 class="section-heading text-center">Thanks for registering!</h2>
          <p class="text-center">Please login below to get started and post your first job:</p>';
  } else {
    // Error inserting into the database
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  // Close the database connection
  $conn->close();
}
?>
</section>
</div>
</div>
</div>

<br><br>

<!-- Login/Register Section -->
<section class="login-register">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <form action="employerlogin.php" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<!-- footer -->     
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