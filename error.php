<html>
    <?php
    session_start();
    include ("CONNECTION.PHP");
    
    if(!$_SESSION['login_id'])
{
    header('location: index.php');
}
    ?>
    <head><title>Typing speed Test</title>
    
   
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    
   
<link rel="shortcut icon" href="images/dg.png" />
    <link rel="stylesheet" href="login.css" type="text/css">
    
    
    
    </head>

    
    <body>
        
      
<div class='container-fluid'>
    <img src='images/logo.png' width='270px' class='float-left'>
<img src='images/comtech.png' width='270px' height='95' class='float-right'>
        <div class='heading' ><h1 class='h1' align='center'>Typing Test Result</h1></div>
        
        <form action="index.php" method="post">
    <div style="float: right; height: 50px; width: 50px;  margin-right: -250px;">
        <button class="btn btn-warning" name="logout" style="display: block; margin-top: 100px; float: right; ">Logout</button>
            </div> 
  </form>
     <div style='display: block; position: absolute; height: 50px; width: 100%; margin-top: 30px;'>
        
       
           <div class='alert alert-success' style='display: inline-block; width: 300px;'>
            <strong><?php echo $_SESSION['stdname'] ?></strong> 
            </div>
    <br>
     
    <h1 style="color: yellow; font-family: Lucida Calligraphy">You have already submitted the test</h1> 
         
         <form action="error.php" method="post">
             
         <input type="submit" name="result" value="See Result" class="btn btn-info">
         
         </form>
    <?php
     
    if (isset($_POST['result']))
    {
    $id=$_SESSION['login_id'];
            $login = ("SELECT Student_ID, wpm , Accuracy FROM result WHERE ( Student_ID= '$id') ") or die("Failed to connect to database ".mysqli_error());
            
            
     $result =  mysqli_query($conn,$login);
    while($row=mysqli_fetch_array($result))
        
    {
     if ($row["Student_ID"] == $id)
     {
         
    echo "<div class='row'>
    <div class='col-lg-10 col-lg-offset-1 mt-5' >
      <div class='well' style='background: #0ab3cb;'>
        <h3 style= 'color: black; font-family: times new roman;'>Your Previous Result Summary</h3>
          <div style='border: 2px solid #f49f0b; height: 120px; border-radius: 10px; background-color: #def7f6;'>
           <div style='width: 50%; float: left;'>
               <p style='font-size:20px;font-family:times new roman;'>Typing Speed</p>
                <p style='font-size:35px;color:#f49f0b;'>".$row['wpm']."</p>
                 <p style='font-size: 17px;font-family: times new roman; margin-top: -8px'>WPM</p>
                 
                 <div style='border: 1px solid grey; height: 65px; float: right; margin-top: -100px;'></div>
                  
              </div>
              <div style='width: 50%; height:110px ;float: right;  '>
              <p style='font-size: 20px;font-family: times new roman;'>Typing Accuracy</p>
                <p style='font-size:35px; color: #f49f0b; '>".$row['Accuracy']."</p>
                 <p style='font-size: 17px;font-family: times new roman; margin-top: -10px'><strong>%</strong> Accuracy</p>
              </div>
             
          </div>
      </div>
    </div>
  </div>";
     }
    }
    }
  ?>
      
          
  
  
    </div>
        </div>
    
    </body>
    </html>
          
            
    
    
    
     
     
 
                          

  

        
        
   
    


        
        
        
        
        