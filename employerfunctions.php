<?php

// Add a Movie

if(isset($_POST['addjob'])) {

  include 'db.php';
    
  $sql = "INSERT INTO job_listings (id, title, company, salary, location, description) 
  VALUES ('{$_POST['id']}','{$_POST['title']}', '{$_POST['company']}','{$_POST['salary']}', '{$_POST['location']}', '{$_POST['description']}')";
    
    if (mysqli_query($conn, $sql)) {
    header("Location: employerdashboard.php?message=addjob");

    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 


}

// Update a Movie

if(isset($_POST['updatejob'])) {
    
  include 'db.php';

  $sql = "UPDATE job_listings SET title='{$_POST['title']}',company='{$_POST['company']}',salary='{$_POST['salary']}',
  WHERE id='{$_POST['id']}'";

    if (mysqli_query($conn, $sql)) {
    header("Location: employerdashboard.php?message=updatejob");

   } else {
     echo "Error updating record: " . mysqli_error($conn);
   }

}


// Delete a Movie

if(isset($_POST['deletejob'])) {
    
  include 'db.php';

  $sql = "DELETE FROM job_listings WHERE id='{$_POST['id']}'";


    if (mysqli_query($conn, $sql)) {
    header("Location: employerdashboard.php?message=deletejob");

   } else {
     echo "Error deleting record: " . mysqli_error($conn);
   }


}

?>