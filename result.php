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
        
        <?php



 if(isset($_POST['result']))
      {
                
             $stdname=$_SESSION['stdname'];
             
     
          $id=$_SESSION['login_id'];
         
          $_SESSION['count'] = $_POST['test'] ;
          $w_count = $_SESSION['count'];
           //$test_para = $_SESSION['para'];

          $stdname=$_SESSION['stdname'];

        $words = (str_word_count ($w_count));
     

    
     $result = $words/5;
   
     



     
     $string1 = "Computer is one thing without which we cannot imagine our life. It has become an important part of life for the modern day people. Computer has been introduced as a compulsory subject in schools to help the kids learn about the same from an early age. It is essential to teach students about this machine as this is what they would be required to work on as they grow up.
The current working generation had to attend special training programs to learn about the various aspects and uses of the computers in order to use them. However, the newer generation is being taught about it as a subject in school so that they do not face any such problem in the future. Special computer labs are set up in the schools and trained computer teachers are employed to teach the subject.
Knowledge about the use of computer is indeed essential these days. This is because most of the tasks today are carried out via these machines.";


     
  similar_text($string1, $w_count, $percent);
     
          $query="INSERT INTO result(Student_ID,Student_Name,wpm,Accuracy)
                          VALUES('$id','$stdname','$result','$percent')";
                           $run=mysqli_query($conn,$query);   
     
  
    
 }
        
        
        
        
    

        

   
  ?>
      
<div class='container-fluid'>
    <img src='images/logo.png' width='270px' class='float-left'>
<img src='images/comtech.png' width='270px' height='95' class='float-right'>
        <div class='heading' ><h1 class='h1' align='center'>Typing Test For Students</h1></div>
        
        <form action="index.php" method="post">
    <div style="float: right; height: 50px; width: 50px;  margin-right: -250px;">
        <button class="btn btn-warning" name="logout" style="display: block; margin-top: 100px; float: right; ">Logout</button>
            </div> 
  </form>
     <div style='display: block; position: absolute; height: 50px; width: 100%; margin-top: 30px;'>
        
       
           <div class='alert alert-success' style='display: inline-block; width: 300px;'>
            <strong><?php echo $_SESSION['stdname'] ?></strong> 
            </div>
    
          
  <div class='row' style='margin-top: 50px;'>
    <div class='col-lg-10 col-lg-offset-1 mt-5' >
      <div class='well' style='background: #0ab3cb;'>
        <h3 style= 'color: black; font-family: times new roman;'>Your Typing Proficiency</h3>
          <div style='border: 2px solid #f49f0b; height: 120px; border-radius: 10px; background-color: #def7f6;'>
           <div style='width: 50%; float: left;'>
               <p style='font-size: 20px;font-family: times new roman;'>Typing Speed</p>
                <p style='font-size:35px; color: #f49f0b; '><?php echo $result ?></p>
                 <p style='font-size: 17px;font-family: times new roman; margin-top: -8px'>WPM</p>
                 
                 <div style='border: 1px solid grey; height: 65px; float: right; margin-top: -100px;'></div>
                  
              </div>
              <div style='width: 50%; height:110px ;float: right;  '>
              <p style='font-size: 20px;font-family: times new roman;'>Typing Accuracy</p>
                <p style='font-size:35px; color: #f49f0b; '><?php echo $percent ?></p>
                 <p style='font-size: 17px;font-family: times new roman; margin-top: -10px'><strong>%</strong> Accuracy</p>
              </div>
             
          </div>
      </div>
    </div>
  </div>
  
    </div>
        </div>
    
    </body>
    </html>
          
            
    
    
    
     
     
 
                          

  

        
        
   
    
        <script type="text/javascript">
$(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    });
    
    //Disable part of page
    $("#id").on("contextmenu",function(e){
        return false;
    });
});
</script>


        