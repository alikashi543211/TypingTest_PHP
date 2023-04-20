<?php
include("CONNECTION.PHP");
session_start();

 if(!$_SESSION['login_id'])
{
    header('location: ../index.php');
}

?>

<html>

<head>
    
    <title>Results</title>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    
   
<link rel="shortcut icon" href="images/dg.png" />
<link rel="stylesheet" href="login.css" type="text/css">
</head>
    
<body>
    
 <div class="container-fluid">
        
<img src="images/logo.png" width="270px" class="float-left">
<img src="images/comtech.png" width="270px" height="95" class="float-right">
<div class="heading" ><h1 class="h1">Student's Result</h1></div>
     
    <form action="../index.php" method="post">
    <div style="float: right; height: 50px; width: 50px;  margin-right: -250px;">
        <button class="btn btn-warning" name="logout" style="display: block; margin-top: 15px; float: right; ">Logout</button>
            </div> 
  </form>
   
    <?php
     
    $query ="SELECT Student_Name,wpm,Accuracy FROM result ORDER BY Accuracy DESC";
     $result=mysqli_query($conn,$query);
     
     ?>
     
     <center>
           
         <form>
     <table border="2" style="color:white; text-align: center;" class="table table-responsive-sm table-dark">
     <tr class="bg-warning">
         <td colspan="4" style="font-weight: bold; color: black;">Student's Result Record</td>
         </tr>
         <tr>
         <th style="text-align: center;">STUDENT_NAME</th><th style="text-align: center;">WPM</th><th style="text-align: center;">ACCURACY</th>
         </tr>
     <?php
         while($row=mysqli_fetch_array($result))
         {
             ?>
         <tr>
             <td><?php echo $row["Student_Name"]; ?></td>
             <td><?php echo $row["wpm"]; ?></td>
             <td><?php echo $row["Accuracy"]; ?></td>
            
         </tr>
         <?php
         }
             ?>
         
         
    </table>
    </form>
     </center>
    
     
     
     
     <form action="result.php" method="post">
         
         
         
     </form>
    </div> 
    </body>
    
    

</html>
