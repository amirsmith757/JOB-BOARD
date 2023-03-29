<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Dashboard | Job Board</title>
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

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">Welcome to your Dashboard</h1>

            <?php
            if(isset($_GET['message'])) {
                if($_GET['message'] == 'addjob') {
                    echo '<div class="alert alert-success">
                        <strong>Success!</strong> Job Added.
                    </div>';
                } // if added


                if($_GET['message'] == 'deletejob') {
                    echo '<div class="alert alert-danger">
                        <strong>Success!</strong> Job Deleted.
                    </div>';
                } // if deleted


                if($_GET['message'] == 'updatejob') {
                    echo '<div class="alert alert-info">
                        <strong>Success!</strong> Job Updated.
                    </div>';
                } // if updated
            }
            ?>

            <form action="employerfunctions.php" method="POST">
                <div class="form-group row">
                    <div class="col">
                        <label for="title">Position:</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?=$_POST['title']?>">
                    </div>
                    <div class="col">
                        <label for="company">Company:</label>
                        <input type="text" name="company" class="form-control" id="company" value="<?=$_POST['company']?>">
                    </div>
                    <div class="col">
                        <label for="salary">Salary:</label>
                        <input type="text" name="salary" class="form-control" id="salary" value="<?=$_POST['salary']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="location">Location:</label>
                        <input type="text" name="location" class="form-control" id="location" value="<?=$_POST['location']?>">
                    </div>
                    <div class="col">
                        <label for="description">Description:</label>
                        <input type="text" name="description" class="form-control" id="description" value="<?=$_POST['description']?>">
                    </div>
                </div>

                <?php
                if(isset($_POST['updatejob'])) {
                    echo '<input type="hidden" name="id" value="'.$_POST['id'].'">';
                    echo '<button type="submit" name="updatejob" style="width:100%;" class="btn btn-info">Update Job</button>';
                } else {
                    echo '<button type="submit" name="addjob" style="width:100%;" class="btn btn-success">Add Job</button>';
                }
                ?>
            </form>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

<br><br>

<div class="container" style="border-top: 1px gray solid;">
    <div class="row">
        <div class="col-md-12">

<br><br>
<table class="table table-hover table-striped table-bordered">

<tr>
<th>Applications</th> 
<th>Position</th>
<th>Company</th>
<th>Salary</th>
<th>Location</th>
<th>Description</th>
<th>Edit</th>
<th>Delete</th>

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
    <td><?=$row['id']?></td>
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
    <button type="submit" name="updatejob"  class="btn btn-info btn-xs">Edit</button>
  </form>
</td>
    <td class="text-center"><form action="employerfunctions.php" method="POST"> 
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <button type="submit" name="deletejob" class="btn btn-danger btn-xs">X</button>
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

