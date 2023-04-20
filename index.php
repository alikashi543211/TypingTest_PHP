<?php
session_start();
include("CONNECTION.PHP");
?>
<?php
if(isset($_POST['logout']))
{
    $_SESSION['login_id']="";
    $_SESSION['pass']="";
}


 

    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Typing Test</title>
    
   
    
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
        <div class="heading" ><h1 class="h1" align="center">Typing Test For Students</h1></div>
        
        
        
        <?php
        
        
        if(isset($_POST['login']) && ($_POST['select']=='student'))
        {
     $_SESSION['login_id'] = $_POST['id'];
     $_SESSION['pass'] = $_POST['pswrd'];
     $id = $_SESSION['login_id'];
     $pswrd = $_SESSION['pass'];
           
 
            
            $login_b = ("SELECT Student_ID , Password FROM login WHERE (Student_ID = '$id' AND Password = '$pswrd') ") or die("Failed to connect to database ".mysqli_error());
            $result_b =  mysqli_query($conn,$login_b);
            
    
        
    while($row_b=mysqli_fetch_array($result_b))
        
    {
     if ($row_b["Student_ID"] == $id && $row_b["Password"] == $pswrd)
     {
         

         header('location:test.php'); 
     }
     
    
    
    }
            
            
    echo " <div class='alert alert-danger float-left' style='display: inline-block; margin-top: 20px; margin-left: -220px;'>
    <strong>Login Failed!</strong> Enter Valid Student ID and Password.
  </div>";
        }
         
        if(isset($_POST['login']) && ($_POST['select']=='admin'))
        {
     $_SESSION['login_id'] = $_POST['id'];
     $_SESSION['pass'] = $_POST['pswrd'];
     $id = $_SESSION['login_id'];
     $pswrd = $_SESSION['pass'];
            
            $login = ("SELECT admin_email , admin_pass FROM admin WHERE ( admin_email= '$id' AND admin_pass = '$pswrd') ") or die("Failed to connect to database ".mysqli_error());
            
            
     $result =  mysqli_query($conn,$login);
    while($row=mysqli_fetch_array($result))
        
    {
     if ($row["admin_email"] == $id && $row["admin_pass"] == $pswrd)
     {
         
         
          header('Location:admin/user.php');
     }
     
    
    
    }
            
            
    echo " <div class='alert alert-danger float-left' style='display: inline-block; margin-top: 100px; margin-left: -220px;'>
    <strong>Login Failed!</strong> Enter Valid Admin ID and Password.
  </div>";
     
           
        }
    
        
        
    
        ?>
        

<div class="container" style="position: relative; margin-left: 100px; margin-top: 130px; height: 200px;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default h-100" >
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form action="index.php" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            User ID</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" class="form-control" id="inputEmail3" placeholder="User Id" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="pswrd" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                        <label class="col-sm-3 control-label mt-3">
                          User Type </label>
                         <div class="col-sm-9 " >
                             
                           <select class="form-control h-100 mt-3" name="select">
            
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
                        </div>
                    </div>
                        
                        
                   
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-info btn-md" name="login">
                                Login</button>
                            
                        </div>
                    </div>
                    </form>
                </div>
                
        </div>
    </div>
</div>
</div>
</div>
    

<!-- <div style="display: block; width: 320px; color: lightgrey; position:absolute;
    bottom:0;
    right:0;">
        <h5>Developed By: <strong>Mansarim Tabassum & Kashif Ali</strong></h5>
        <h5>Supervised By: <strong>Mohammad Sajjad</strong></h5>
    
    </div> -->
    
</body>
</html>
<?php
/*if(isset($_POST['login']) && ($_POST['select']=='student'))
{
      $_SESSION['login_id'] = $_POST['id'];
     $_SESSION['pass'] = $_POST['pswrd'];
     $id = $_SESSION['login_id'];
     $pswrd = $_SESSION['pass'];      
     // To prevent mysql injection
     $id = stripcslashes($id);
     $pswrd = stripcslashes($pswrd);
                
     $login = ("SELECT Student_ID , Password FROM login WHERE (Student_ID = '$id' AND Password = '$pswrd') ") or die("Failed to connect to database ".mysqli_error());

     $result =  mysqli_query($conn,$login);
    while($row=mysqli_fetch_array($result))
        
    {
     if ($row["Student_ID"] == $id && $row["Password"] == $pswrd)
     {
         

         header('location:test.php'); 
     }
     
    
    
    }
            
            
    echo " <div class='alert alert-danger float-left' style='display: inline-block; margin-top: 20px; margin-left: -220px;'>
    <strong>Login Failed!</strong> Enter Valid Student ID and Password.
  </div>";
            }
?>*/