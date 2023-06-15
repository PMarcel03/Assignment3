<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Foundation</title>
    <!--Links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Style/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&family=Smokum&display=swap" rel="stylesheet">
  </head>
<body class="container-fluid">
    <?php include "app/connection.php";
      //Error handling
       error_reporting(E_ALL);
       ini_set('display_errors', 1);  

    ?>
       <!--Navigation Bar-->
       <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary fw-bold" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"></a>
          <img src="images/SCP-Logo.png" alt="SCP-Logo" width="100"> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="form.php">Enter a new page record</a>
               <!--Run PHP loop through db and display page names -->
              <?php foreach($result as $page): ?>
                 <a href="index.php?page='<?php echo $page['Subject']; ?>'" class="nav-link"><?php echo $page['Subject']; ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </nav>
  
    <!--Database Content-->
    <div class="row">

     <div class="col">
      <?php
      
      if(isset($_GET['page']))
      {
        //remove single quotes from page get value
        $Subject = trim($_GET['page'],"'");

        //Run SQL command to select record based on get value
        $record =$connection->query("select * from SCP where Subject='$Subject'");
        //Convert $record into an array for us to echo the indivdual fields
        $row = $record->fetch_assoc();

        //Create variables that hold data from all table fields
        $Subject = $row['Subject'];
        $Class = $row['Class'];
        $Procedures = $row['Procedures'];
        $Description = $row['Description'];
        $Image = $row['Image'];

        //Variables to hold update/delete url strings
        $id = $row['id'];
        $update = "update.php?update=". $id;
        $delete = "app/connection.php?delete=". $id;

        //Display infomation on screen
        echo"
        
        <h1>{$Subject}</h1>
        <h2>{$Class}</h2>
        <h3>Containment Procedures</h3>
        <p>{$Procedures}</p>
        <h3>SCP Description</h3>
        <p>{$Description}</p>
        <p><img src='{$Image}' class='img-fluid'</p>
      
        ";

        //Display Update/Delete buttons
        echo"
        <p><a href='{$update}' class='btn btn-warning'>Update</a></p>
        <p><a href='{$delete}' class='btn btn-danger'>Delete</a></p>
        <style>
        .btn
        {
          margin: auto;
          color: white;
          text-align: center;
          text-decoration: none;
          display: grid;
          font-size: 16px;
          width: 250px;
        }
        </style>
        ";


      }
      else
      {
        //If this is the first time this page has been accessed display content below
        echo"
        
       <h1>Welcome to the SCP Foundation</h1>
       <h2>What is the SCP Foundation?</h2>
       <p class='text-wrap'> The SCP Foundation is a group of scientists that dedicate their time to researching anomalies, the SCP foundation also protects the rest of society from the potential harm that these anomalies can do to society, hence why SCP stands for Secure. Contain. Protect. As it is our duty to keep these anomalies we call SCPs under containment for everyone's safety and to create a good testing enviroment for research.</p>
       <p> <img src='images/SCP-Logo.png' class='img-fluid' alt='SCP Logo' width='200'>
      
        ";

      }

      ?>

     </div>

    </div>