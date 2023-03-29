<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results | Job Board </title>
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

<br><br>

<?php
// Retrieve the search query from the form
$search_query = $_GET['search'];

// Validate and sanitize the search query
$search_query = trim($search_query); // Remove any leading or trailing spaces
$search_query = htmlspecialchars($search_query); // Convert special characters to their HTML entities

// Connect to your database and search for matching results
// Replace 'your_db_name', 'your_username', and 'your_password' with your database credentials
$pdo = new PDO('mysql:host=localhost;dbname=asmith404', 'asmith404', 'U6adxN4fT1cMjCSy');
$statement = $pdo->prepare('SELECT * FROM job_listings WHERE title LIKE :search_query');
$statement->bindValue(':search_query', '%'.$search_query.'%');
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

// Display the search results
echo '<h2 class="section-heading text-center">Job Listings</h2>';
if (count($results) > 0) {
    foreach ($results as $result) {
        echo '<div class="job-listing">';
        echo '<h3 class="job-title">' . $row["title"] . '</h3>';
        echo '<p class="job-location">' . $row["location"] . '</p>';
        echo '<p class="job-description">' . $row["description"] . '</p>';
        echo '<a href="apply.php?id=' . $row["id"] . '" class="btn btn-primary">Apply Now</a>';
        echo '</div>';
    }
} else {
    echo '<p>No results found.</p>';
}
?>
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
