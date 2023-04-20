<?php
include("CONNECTION.PHP");
session_start();



 if(isset($_REQUEST['del_id']))
 {
     $delete = $_REQUEST['del_id'];
     $query = ( "delete from login where id='$delete' ");
	$result = mysqli_query($conn,$query);
     if($result)
     {
       $color  = "Deleted";
     }
 }



if(!$_SESSION['login_id'])
{
    header('location: ../index.php');
}

$id=$_SESSION['login_id'];
     
$message = ("SELECT admin_name , admin_ID FROM admin WHERE (admin_email = '$id') ") or die("Failed to connect to database ".mysqli_error());
     
 $res =  mysqli_query($conn,$message);
if(!$res) 
{echo "error"; 
}
    while($row=mysqli_fetch_array($res))
    {

        $_SESSION['admin_name']=$row["admin_name"];
         
            
     }  



$btn="Register";

if(isset($_REQUEST["id"]) && !isset($_POST['Update']))
{
    $btn="Update";
	$_SESSION['update_id']=$_REQUEST["id"];
	$update_id=$_SESSION['update_id'];
	$query_b=( "select * from login where id='$update_id' ");
	$result_b=mysqli_query($conn,$query_b);
	while($row_b=mysqli_fetch_array($result_b))
	{
	   $std_name=$row_b["Student_Name"];
	   $std_id=$row_b["Student_ID"];
	   $std_password=$row_b["Password"];
	  
       
	}
}

if(isset($_POST['Update']))
{
    $up_id=$_SESSION['update_id'];
    $update_id=$_POST['id'];
    $update_name=$_POST['name'];
    $update_pswrd=$_POST['pswrd'];
    $update_query="UPDATE login
    SET 
    Student_ID='$update_id',
    Student_Name='$update_name',
    Password='$update_pswrd'
    where id='$up_id' ";
    
    $update_run=mysqli_query($conn,$update_query);
   
    
}
   
   
?>
<html>

<head>
    
    <title>Admin Panel</title>
    
    
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
<center><div class="heading" ><h1 class="h1" align="center">Typing Test Admin Panel</h1></div></center>
      
     <form action="../index.php" method="post">
    <div style="float: right; height: 50px; width: 50px;  margin-right: -250px;">
        <button class="btn btn-warning" name="logout" style="display: block; margin-top: 100px; float: right; ">Logout</button>
            </div> 
  </form>


       <div style="display: block; position: absolute; height: 50px; width: 100%; margin-top: 50px;">
        <?php
       echo "
           <div class='alert alert-success' style='display: inline-block; width: 300px;'>
            <strong>Welcome </strong>".$_SESSION['admin_name']."
            </div>";  
        ?>
        
        </div>  

<div class="container h-100" style=" margin-left: 100px; margin-top: 100px;">
    <div class="row justify-content-center align-items-center" >
        <div class="col-md-8">
            <div class="panel panel-default" style="height: 320px;">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Register Student</div>
                <div class="panel-body">
                    <form action="user.php" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Student ID</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" class="form-control" value="<?php if(isset($std_id)) echo $std_id; ?>" id="inputEmail3" placeholder="Student Id" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Student Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="<?php if(isset($std_name)) echo $std_name; ?>" class="form-control" id="inputPassword3" placeholder="Student Name" required>
                        </div>
                    </div>
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="pswrd" value="<?php if(isset($std_password)) echo $std_password; ?>" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                    </div>
                   
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-info btn-md" name="<?php echo $btn; ?>">
                                <?php echo $btn; ?></button>    
                        </div>
                        
                        
                           
    
                
                
                        </div>
                    </form>
                    <form action="result.php" method="post">
                    <button type="submit" class="btn btn-success btn-md float-right" name="result">
                        
                                See Results</button>
                        </form>
                    
                    
                </div>
                
        </div>
    </div>
</div>
    
    <?php
    if(isset($_POST['Register']))
    { 
            
             $id=$_POST['id'];
             $stdname=$_POST['name'];
             $password = $_POST['pswrd'];
            
     
         
        
         $query="INSERT INTO login(Student_ID,Student_Name, Password)
                          VALUES('$id','$stdname', '$password')";
                           $run=mysqli_query($conn,$query);
        if($run)
        {
           echo "<script>alert('Student Registered Successfully')</script>";
        }
    }
    
   
    
    ?>

      
   <?php
     
    $query ="SELECT * FROM login";
     $result=mysqli_query($conn,$query);
     
     ?>
     
            
       <h3 style="color: pink;"><?php if(isset($color)) echo $color ?></h3>
    
     <table border="2" style="color:white; text-align: center;" class="table table-responsive-sm table-dark">
     <tr class="bg-warning">
         <td colspan="6" style="font-weight: bold; color: black;">Registered Students</td>
         </tr>
         <tr>
         <th style="text-align: center;">ID</th><th style="text-align: center;">STUDENT_NAME</th><th style="text-align: center;">STUDENT_ID
             <th style="text-align: center;">PASSWORD</th>
             <th style="text-align: center;">Edit</th>
             <th style="text-align: center;">Delete</th>
         </tr>
     <?php
         while($row=mysqli_fetch_array($result))
         {
             ?>
         <tr>
             <td><?php echo $row["id"]; ?></td>
             <td><?php echo $row["Student_ID"]; ?></td>
             <td><?php echo $row["Student_Name"]; ?></td>
             <td><?php echo $row["Password"]; ?></td>
             <td><a href="user.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: coral;">Edit</a></td>
             <td><a href="user.php?del_id=<?php echo $row['id']; ?>" style="text-decoration: none; color: cyan;">Delete</a></td>
            
            
         </tr>
         <?php
         }
             ?>
     </table>
      
      
    
    
    
    
    
      
 

</div>



 






    </div>
    </body>
    
    </html>