<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new Record</title>
    <!--Links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Style/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&family=Smokum&display=swap" rel="stylesheet">
  </head>
<body class="container-fluid">
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
            </div>
          </div>
        </div>
      </nav>
      <h1>Use the form to create a new record</h1>
      <form class="form-group" method="post" action="app/connection.php">
        <label>SCP Subject</label>
        <br>
        <input type ="text" class="form-control" name="Subject" placeholder="Subject" required>
        <br><br>
        <label>SCP Class</label>
        <br>
        <input type="text" class="form-control" name="Class" placeholder="Class" required>
        <br><br>
        <label>SCP Containment Procedures</label>
        <br>
        <input type="text" class="form-control" name="Procedures" placeholder="Procedures" required>
        <br><br>
        <label>SCP Description</label>
        <br>
        <input type="text" class="form-control" name="Description" placeholder="Description" required>
        <br><br>
        <label>SCP Image</label>
        <br>
        <input type="text" class="form-control" name="Image" placeholder="Image">
        <br><br>
        <hr width="75%">
        <input class="btn btn-light" type="submit" name="submit" value="Submit Page Data">
      </form>