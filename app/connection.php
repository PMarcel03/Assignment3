<?php
//Database Credientials
$user = "a30074024_Marcel123";
$pw ="Toiohomai1234";
$db = "a30074024_SCP";

//Error Management
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Database connection object (address, user, password, db)
$connection = new mysqli('localhost', $user, $pw, $db);

if ($connection->connect_error){
    die("Connection Failed: ". $connection->connect_error);
}

//Create a variable that stores all records from our database
$result = $connection->query("select * from SCP");

//first check if form has been submitted with data
if(isset($_POST['submit']))
{
//Create variables from our posted form values
$Subject = $_POST['Subject'];
$Class = $_POST['Class'];
$Procedures = $_POST['Procedures'];
$Description = $_POST['Description'];
$Image = $_POST['Image'];

//Create an insert command
$sql = "Insert into SCP(Subject, Class, Procedures, Description, Image)
values('$Subject', '$Class', '$Procedures', '$Description', '$Image')";

//Display Success or Error message on screen
if($connection->query($sql) === TRUE)
{
  echo "
  <h1>Record Added Successfully.</h1>
  <p><a href='../index.php'>Back to Index page.</p>
   ";
}
else
{
    echo "
    <h1>Error Submitting Data.</h1>
    <p><a href='../index.php'>Back to Index page.</p>
     ";
}
}

// Update
if(isset($_POST['update']))
{
    //save post values as variables
    $id = $_POST['id'];
    $Subject = $connection -> real_escape_string($_POST['Subject']);
    $Class = $connection -> real_escape_string($_POST['Class']);
    $Procedures = $connection -> real_escape_string($_POST['Procedures']);
    $Description = $connection -> real_escape_string($_POST['Description']);
    $Image = $connection -> real_escape_string($_POST['Image']);
    
    
    // Update SQL command
    $update = "update SCP set Subject='$Subject', Class='$Class', Procedures='$Procedures', Description='$Description', Image='$Image' where id='$id'";
    
    if($connection->query($update) === TRUE)
    {
        echo "
                <h1>Record Updated Successfully.</h1>
                <p><a href='../index.php'>Back to Index page.</p>
            ";
    }
    else
    {
        echo "
                <h1>Record Update Failed.</h1>
                <p><a href='../index.php'>Back to Index page.</p>
            ";
        die("Connection Failed: ". $connection->connect_error);
    }
}

//Delete functionality
if(isset($_GET['delete']))
{
$id = $_GET['delete'];
//Create delete SQL command
$del = "delete from SCP where id=$id";
//Run SQL command
if($connection->query($del) === TRUE)
{
    echo"<h1>Record was deleted.<a href='../index.php'>Return to index page.</a></h1>";

}
else
{
    echo"
    <h1>There was an error deleting this record.</h1>
    <p><a href='../index.php'></a>Back to index page.</p>
    ";

}
}




?>