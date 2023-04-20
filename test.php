<?php
session_start();
if(!$_SESSION['login_id'])
{
    header('location: index.php');
}
    
    // connect to the server
include ("CONNECTION.PHP");


    // Query to the database for user

$id=$_SESSION['login_id'];
  
$message = ("SELECT Student_Name , Student_ID FROM login WHERE (Student_ID = '$id') ") or die("Failed to connect to database ".mysqli_error());
     
 $res =  mysqli_query($conn,$message);
if(!$res)
{echo "error"; 
}
    while($row=mysqli_fetch_array($res))
    {

        $_SESSION['stdname']=$row['Student_Name'];
        $stdname = $_SESSION['stdname'];    
       //$_SESSION['count'] = $_POST["test_text"];    
        
        
     }  

if(isset($_POST['start']))
        {
           
   
     $id = $_SESSION['login_id'];
     
            
            $login = ("SELECT Student_ID FROM result WHERE ( Student_ID= '$id') ") or die("Failed to connect to database ".mysqli_error());
            
            
     $result =  mysqli_query($conn,$login);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
    while($row=mysqli_fetch_array($result))
        
    {
     if ($row['Student_ID'] == $id)
     {
         
         
          header('location: error.php');
     }
     
    
        
    }
}

?>

<html>
<head>
    <title>Typing Test</title>
    
     <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery Circle Bars Plugin Demos</title>
    <link href="//www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="timer/assets/circle.css">
    <link rel="stylesheet" type="text/css" href="timer/assets/demo.css">
    <link rel="stylesheet" type="text/css" href="timer/assets/skins/yellowcircle.css">
    <link rel="stylesheet" type="text/css" href="timer/assets/skins/purplecircle.css">
    <link rel="stylesheet" type="text/css" href="timer/assets/skins/firecircle.css">
    <link rel="stylesheet" type="text/css" href="timer/assets/skins/whitecircle.css">
    <link rel="stylesheet" type="text/css" href="timer/assets/skins/simplecircle.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <script type="text/javascript" src="timer/assets/circle.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
   
        
    
    <link rel="shortcut icon" href="images/dg.png" />
    <link rel="stylesheet" href="login.css" type="text/css">
    
    <script>
        
$(document).ready(function() {
    $("#word_count").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;
        if (words > 200) {
            // Split the string on first 200 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 200).join(" ");
            // Add a space at the end to keep new typing making new words
            $(this).val(trimmed + " ");
        }
        else {
            $('#display_count').text(words);
            $('#word_left').text(200-words);
        }
    });
 }); 
        
        
        
        function start_alert()
       {
           
           alert("Are You Ready?????");
           document.getElementById('word_count').disabled='disabled';
          
       }
        
        
       
     
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
    
    




    
    </head>


<body  oncopy="return false" oncut="return false" onpaste="return false">

    <div class="container-fluid">
         <img src="images/logo.png" width="270px" class="float-left">
         <img src="images/comtech.png" width="270px" height="95" class="float-right">
         <div class="heading" ><h1 class="h1" align="center">Typing Test For Students</h1></div>
        
    <div style="display: block; position: absolute; height: 50px; width: 100%; margin-top: 50px;">
        <?php
       echo "
           <div class='alert alert-success' style='display: inline-block; width: 300px;'>
            <strong>Welcome </strong>".$_SESSION['stdname']."
            </div>";  
        ?>
        
        </div>    

        <form action="index.php" method="post">
    <div style="float: right; height: 50px; width: 50px;  margin-right: -250px;">
        <button class="btn btn-warning" name="logout" style="display: block; margin-top: 70px; float: right; ">Logout</button>
            </div> 
  </form>
        
        <div class="container" style="margin-top:100px; margin-left: 50px; ">
          
            <div class="row justify-content-center">
                
     
                <div class="col-md-8">
             <form action="result.php" method="post">
            <label class="float-right" style="color:white;">166 Words</label>
            <textarea  readonly rows="10" cols="100" bgcolor="yellow" class="form-control" name="test_para" style="height: 320px; overflow: hidden;">
Computer is one thing without which we cannot imagine our life. It has become an important part of life for the modern day people. Computer has been introduced as a compulsory subject in schools to help the kids learn about the same from an early age. It is essential to teach students about this machine as this is what they would be required to work on as they grow up.
The current working generation had to attend special training programs to learn about the various aspects and uses of the computers in order to use them. However, the newer generation is being taught about it as a subject in school so that they do not face any such problem in the future. Special computer labs are set up in the schools and trained computer teachers are employed to teach the subject.
Knowledge about the use of computer is indeed essential these days. This is because most of the tasks today are carried out via these machines. 
            </textarea>
             
            
            <label style="color: white;">Type the above text here</label>
            
<textarea  rows="10" cols="80" class="form-control" name="test" id="word_count">
</textarea>
            <div style="text-align: center; display: inline-block;">  
           <label style="color: white;">Words counter: </label> <span id="display_count" style="color: white; font-size: 20px;"> 0 </span>
       
              </div>
            <script>
            
  

  document.getElementById('word_count').disabled=true;
                


            </script>
            
            <button class="btn btn-info float-right" name="result" type="submit" >Save</button>
            
       
   
       
    </form>
            
             <form action="test.php" method="post">
              <input class="btn btn-success float-right" style="margin-right: 70px; margin-top: -53px;" name="start" id="start" type="submit" value="start" onclick="start_alert()"   >
                  </form>
                </div>
            </div>
       
</div>
       
        
        <div style='width: 170px; height: 170px; position: fixed; margin-top: -650px; margin-left: 50px;'>        
        <div class='page'>
       
            
            
        
        <?php
        
        if(isset($_POST['start']))
        {   
            echo " 

      <div class='circlebar' data-circle-startTime=0 data-circle-dialWidth=10 data-circle-size='130px' style='margin-top: -150px;'>
                <div class='loader-bg'>
                    <div class='text'>00:00:00</div>
                </div>
            </div>
        <script>
                new Circlebar({
                element: '#circle-3',
                maxValue: 230,
                size: '200px',
                fontSize: '30px',
                type: 'progress'
            });
        });
        </script>
        <script type='text/javascript'>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
    

        </script>
    </div>
        
        </div> ";
            
            if (isset($_POST['start']))
            {
                 
                
                echo "<script>
                document.getElementById('word_count').disabled=false;
                 function explode(){
  alert('Time Up!');
       document.getElementById('word_count').setAttribute('readonly', true);
      
}
 setTimeout(explode, 300000);
                
                
                
                
                
                </script>";
            }
        }
            ?>
        </div>

        </div>
    </div>
    </body>
</html>