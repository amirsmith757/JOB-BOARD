<?php

include 'db.php';

// Retrieve job listings from database
$sql = "SELECT * FROM job_listings";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Board</title>
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

  <!-- Hero Section -->
  <section class="hero" style="background-image: url('coworkers.png');">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="hero-heading">Find Your Dream Job Today</h1>
          <p class="hero-text">Connect with top employers in your area and take the next step in your career.</p>
          <form class="search-form" action="search.php" method="GET">
      <div class="row">
        <div class="col-md-4">
          <input type="text" class="form-control" name="search" placeholder="Job title or company">
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" name="location" placeholder="Location">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
      </div>
    </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features">
    <div class="container">
      <h2 class="section-heading text-center">Why Choose Job Board?</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="feature">
            <i class="fas fa-users"></i>
            <h3 class="feature-heading">Connect with Top Employers</h3>
            <p class="feature-text">Our platform makes it easy for you to connect with the best employers in your area.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature">
            <i class="fas fa-laptop"></i>
            <h3 class="feature-heading">Simple and Easy to Use</h3>
            <p class="feature-text">Our user-friendly interface makes it easy to find and apply for jobs.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature">
            <i class="fas fa-users"></i>
            <h3 class="feature-heading">Connect with Top Employers</h3>
            <p class="feature-text">Our platform makes it easy for you to connect with the best employers in your area.</p>
          </div>
        </div>

   <!-- Job Listings Section -->
  <section class="job-listings">
    <div class="container">
      <h2 class="section-heading text-center">Job Listings</h2>
      <table class="table table-hover table-striped table-bordered">

<tr>
<th>Position</th>
<th>Company</th>
<th>Salary</th>
<th>Location</th>
<th>Description</th>
<th></th>

</tr>
<?php

include 'db.php';

$sql = "SELECT * FROM job_listings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>
<tr>
    
    <td><?=$row['title']?></td>
    <td><?=$row['company']?></td>
    <td><?=$row['salary']?></td>
    <td><?=$row['location']?></td>
    <td><?=$row['description']?></td>
    
    <td class="text-center"><form action="employerdashboard.php" method="POST"> 
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input type="hidden" name="title" value="<?=$row['title']?>">
    <input type="hidden" name="company" value="<?=$row['company']?>">
    <input type="hidden" name="salary" value="<?=$row['salary']?>">
    <input type="hidden" name="location" value="<?=$row['location']?>">
    <input type="hidden" name="description" value="<?=$row['description']?>">
    <button type="submit" name="applyjob"  class="btn btn-info btn-xs">Apply</button>
  </form>
</td>
</tr> 




<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</table>

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

