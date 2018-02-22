<?php


    $error = ""; $successMessage = "";

    if ($_POST) {
        
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        
  
        
        if (!$_POST["subject"]) {
            
            $error .= "The subject is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        }
        
       
        
        
        
        
        else {$content = $_POST['dtime'];
            
           /* $emailTo = "ahmhekal@gmail.com";
            
            $subject = $_POST['yourname'];
            
            
            
            $headers = "From: ".$_POST['email'];
            
            if (mail($emailTo, $subject, $content, $headers)) {
             */   
              
              
              if($content=='---------') 
  $error = '<div class="alert alert-danger" role="alert">Sorry, you entered an invalid interview date or there are no more slots .... please try again </div>';

               else $successMessage = '<div class="alert alert-success" role="alert">Thank you! </div>';
               /* 
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Error</div>';
                
                
            }*/
            
        }
        
        
        
    }


$em=$_POST["email"]; $nam=$_POST["yourname"]; $sub=$_POST["subject"]; $dt=$_POST["dtime"]; $cn=$_POST["content"];$mo=$_POST["mobile"];
$sub2=$_POST["subject2"]; $sel=$_POST["itsection"]; $ye=$_POST["eyear"];



$link=mysqli_connect("shareddb1d.hosting.stackcp.net","applicants-3231a592","/vW4EAU7BwRq","applicants-3231a592");



$query="INSERT INTO informations (email,name,firstPref,Interview,previousExp,mobile,secondPref,section,eduyear)
VALUES('".$em."','".$nam."','".$sub."','".$dt."','".$cn."','".$mo."','".$sub2."','".$sel."','".$ye."')";
if($em!='')mysqli_query($link,$query);



?>
    
    
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Catalysis'18 Recruitment</title>

 <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    
    <style type="text/css">
      
      
      @font-face {
    font-family: AMBROSIA_DEMO;
    src: url(AMBROSIA_DEMO.ttf);
}
      

  body {

      background-image: url('mkj.png');
background-size: 1500px 2000px;

    background-attachment: fixed;
    background-position: center; 
}
    #title{
margin: 10px;
padding: 10px;
color:  black;
font-weight: bolder;
font-family:  AMBROSIA_DEMO, serif;
font-size: 50px;

}
.questions
{float: left;
margin-top: 20px;
font-weight: bold;
font-size: 20px;
  
}
      
      

    
    </style>
  
  </head>
<body>
  
  



<div class="container">
  
  <p align="middle"><img src="Capture.PNG"  width='200px'></p>
  <br>
     <h1 id="title" align='middle'>Catalysis'18 Recruitment</h1>
       
      
      <div id="error"><? echo $error.$successMessage; ?></div>
      
      <form method="post">
          
        
          
          
          
  <fieldset class="form-group">
    <label for="yourname" class="questions">Full Name (In English)</label>
    <input type="text" class="form-control" id="yourname" name="yourname" >
  </fieldset>
          
          
  <fieldset class="form-group">
    <label class="questions" for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" >
   
  </fieldset>
          
        
      <fieldset class="form-group">
    <label class="questions" for="mobile">Mobile Number</label>
    <input type="text" class="form-control" id="mobile" name="mobile" >
   
  </fieldset>
          
          
          
             <fieldset class="form-group">
    <label class="questions" for="eyear">Department & Educational Year</label>
    <input type="text" class="form-control" id="eyear" name="eyear" >
   
  </fieldset>
        
        
          
  <fieldset class="form-group">
    <label for="subject" class="questions">First Preference</label>
    
        <select  class="form-control" id="subject" name="subject" onchange="updateChar();" >

       <option value="">Choose your First Preference…</option>

        <option value="PR">PR</option>
        <option value="HR">HR</option>
        <option value="AC">AC</option>
            <option value="ITMP">ITMP</option>
        <option value="RL">R&L</option>

        
    </select>

    
  </fieldset>
          

        
          <fieldset class="form-group" id="itselection">
    <label for='itsection' class='questions' id ='itmpselection'>Section (if exists)</label> 
        <select  class='form-control' id='itsection' name='itsection' >      
                    <option value='' >Choose your section ..</option>

        <option value='IT or MS' id='it'></option>
        <option value='MP or DM' id = 'mp'></option>
    </select>
   
  </fieldset>
        
        
        

        
        
          <fieldset class="form-group">
    <label for="subject2" class="questions">Second Preference</label>
    
        <select  class="form-control" id="subject2" name="subject2" >

       <option value="">Choose your Second Preference…</option>
        <option value="PR">PR</option>
        <option value="HR">HR</option>
        <option value="AC">AC</option>
            <option value="ITMP">ITMP</option>
        <option value="RL">R&L</option>

        
    </select>

    
  </fieldset>
        
                
        
          
<fieldset class="form-group">
    <label for="dtime" class="questions">Interview date & Time</label>
    <select  class="form-control" id="dtime" name="dtime"  >

             <option value="---------">Choose your Interview Time…</option>



      
                     <?php
$query="SELECT id FROM informations WHERE Interview ='Sat12it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat12it' id='sat12it'>Saturday 12:00 - 1:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat12it'>---------</option>";}
?>
      
                           <?php
$query="SELECT id FROM informations WHERE Interview ='Sat1it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat1it' id='sat1it'>Saturday 1:00 - 2:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat1it'>---------</option>";}
?>
      
      
        <?php
$query="SELECT id FROM informations WHERE Interview ='sat11hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='sat11hr' id='sat11hr'>Saturday 11:00 - 12:00</option>";}
          else
      {echo "<option value='---------'id='sat11hr'>---------</option>";}
?>
      
      
        <?php
$query="SELECT id FROM informations WHERE Interview ='sat12hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='sat12hr' id='sat12hr'>Saturday 12:00 - 1:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat12hr'>---------</option>";}
?>
      
      
 
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat1hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat1hr' id='sat1hr'>Saturday 1:00 - 2:00 PM</option>";}
            else
      {echo "<option value='---------'id='sat1hr'>---------</option>";}
?>

      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat3hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Sat3hr' id='sat3hr'>Saturday 3:00 - 4:00 PM</option>";}
            else
      {echo "<option value='---------'id='sat3hr'>---------</option>";}
      
      
      
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat4hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Sat4hr' id='sat4hr'>Saturday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat4hr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat5hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Sat5hr' id='sat5hr'>Saturday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat5hr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat6hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Sat6hr' id='sat6hr'>Saturday 6:00 - 7:00 PM</option>";}
  else
      {echo "<option value='---------'id='sat6hr'>---------</option>";}
        ?>
      
      
      
              <?php
$query="SELECT id FROM informations WHERE Interview ='sat12pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='sat12pr' id='sat12pr'>Saturday 12:00 - 1:00 PM</option>";}
      
            else
      {echo "<option value='---------'id='sat12pr'>---------</option>";}
?>
      
      
 
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat1pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat1pr' id='sat1pr'>Saturday 1:00 - 2:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat1pr'>---------</option>";}
?>
             
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat3pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat3pr' id='sat3pr'>Saturday 3:00 - 4:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat3pr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat4pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat4pr' id='sat4pr'>Saturday 4:00 - 5:00 PM</option>";}
      
            else
      {echo "<option value='---------'id='sat4pr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat5pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat5pr' id='sat5pr'>Saturday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat5pr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat6pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat6pr' id='sat6pr'>Saturday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='sat6pr'>---------</option>";}
?>
      
           <?php
$query="SELECT id FROM informations WHERE Interview ='Sat2rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat2rl' id='sat2rl'>Saturday 2:00 - 3:00 PM</option>";}
        
      
            else
      {echo "<option value='---------'id='sat2rl'>---------</option>";}
?>
      
       <?php
$query="SELECT id FROM informations WHERE Interview ='Sat3rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat3rl' id='sat3rl'>Saturday 3:00 - 4:00 PM</option>";}
             
            else
      {echo "<option value='---------'id='sat3rl'>---------</option>";}
        
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat4rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sat4rl' id='sat4rl'>Saturday 4:00 - 5:00 PM</option>";}
             
            else
      {echo "<option value='---------'id='sat4rl'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat5rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sat5rl' id='sat5rl'>Saturday 5:00 - 6:00 PM</option>";}
             
            else
      {echo "<option value='---------'id='sat5rl'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sat6rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sat6rl' id='sat6rl'>Saturday 6:00 - 7:00 PM</option>";}
             
            else
      {echo "<option value='---------'id='sat6rl'>---------</option>";}
?>
      
      
      
          <?php
 $query="SELECT id FROM informations WHERE Interview ='sun9it' ";
  $result=mysqli_query($link,$query); 
  if(mysqli_num_rows($result)<1){echo "<option value='Sun9it' id='sun9it'>Sunday 9:00 - 10:00 AM</option>";}
          else
      {echo "<option value='---------'id='sun9it'>---------</option>";}
?>
      
                     <?php
$query="SELECT id FROM informations WHERE Interview ='Sun10it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun10it' id='sun10it'>Sunday 10:00 - 11:00 AM</option>";}
          else
      {echo "<option value='---------'id='sun10it'>---------</option>";}
?>
      
      
                           <?php
$query="SELECT id FROM informations WHERE Interview ='Sun5it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun5it' id='sun5it'>Sunday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun5it'>---------</option>";}
?>
      
                  <?php
$query="SELECT id FROM informations WHERE Interview ='Sun6it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun6it' id='sun6it'>Sunday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun6it'>---------</option>";}
?>
      
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun12ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun12ac' id='sun12ac'>Sunday 12:00 - 1:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun12ac'>---------</option>";}
?>
      
      
 
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun1ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun1ac' id='sun1ac'>Sunday 1:00 - 2:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun1ac'>---------</option>";}
?>
             <?php
$query="SELECT id FROM informations WHERE Interview ='Sun2ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun2ac' id='sun2ac'>Sunday 2:00 - 3:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun2ac'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun3ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun3ac' id='sun3ac'>Sunday 3:00 - 4:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun3ac'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun4ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun4ac' id='sun4ac'>Sunday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun4ac'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun5ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun5ac' id='sun5ac'>Sunday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun5ac'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun6ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun6ac' id='sun6ac'>Sunday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun6ac'>---------</option>";}
?>

      
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun2rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun2rl' id='sun2rl'>Sunday 2:00 - 3:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun2rl'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun3rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun3rl' id='sun3rl'>Sunday 3:00 - 4:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun3rl'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun4rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun4rl' id='sun4rl'>Sunday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun4rl'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun5rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun5rl' id='sun5rl'>Sunday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun5rl'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun6rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun6rl' id='sun6rl'>Sunday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun6rl'>---------</option>";}
?>
      
      
      
     
      
      
                  <?php
$query="SELECT id FROM informations WHERE Interview ='Sun9hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun9hr' id='sun9hr'>Sunday 9:00 - 10:00 AM</option>";}
          else
      {echo "<option value='---------'id='sun9hr'>---------</option>";}
?>
                <?php
$query="SELECT id FROM informations WHERE Interview ='Sun10hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun10hr' id='sun10hr'>Sunday 10:00 - 11:00 AM</option>";}
          else
      {echo "<option value='---------'id='sun10hr'>---------</option>";}
?>
                 <?php
$query="SELECT id FROM informations WHERE Interview ='Sun11hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun11hr' id='sun11hr'>Sunday 11:00 - 12:00</option>";}
          else
      {echo "<option value='---------'id='sun11hr'>---------</option>";}
?>
          <?php
$query="SELECT id FROM informations WHERE Interview ='Sun1hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun1hr' id='sun1hr'>Sunday 1:00 - 2:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun1hr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='Sun4hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun4hr' id='sun4hr'>Sunday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun4hr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun5hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun5hr' id='sun5hr'>Sunday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun5hr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun6hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Sun6hr' id='sun6hr'>Sunday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun6hr'>---------</option>";}
?>
      
      
      
      
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='Sun12pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun12pr' id='sun12pr'>Sunday 12:00 - 1:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun12pr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun1pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun1pr' id='sun1pr'>Sunday 1:00 - 2:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun1pr'>---------</option>";}
?>
       <?php
$query="SELECT id FROM informations WHERE Interview ='Sun2pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun2pr' id='sun2pr'>Sunday 2:00 - 3:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun2pr'>---------</option>";}
?>
       <?php
$query="SELECT id FROM informations WHERE Interview ='Sun3pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun3pr' id='sun3pr'>Sunday 3:00 - 4:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun3pr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='Sun4pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun4pr' id='sun4pr'>Sunday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun4pr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun5pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Sun5pr' id='sun5pr'>Sunday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun5pr'>---------</option>";}
?>
      <?php
$query="SELECT id FROM informations WHERE Interview ='Sun6pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Sun6pr' id='sun6pr'>Sunday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='sun6pr'>---------</option>";}
?>

      
      
      
      
      
      
      
      
      
      
      
      
               
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon9it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon9it' id='mon9it'>Monday 9:00 - 10:00 AM</option>";}
          else
      {echo "<option value='---------'id='mon9it'>---------</option>";}
?>
      
                      <?php
$query="SELECT id FROM informations WHERE Interview ='mon10it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon10it' id='mon10it'>Monday 10:00 - 11:00 AM</option>";}
          else
      {echo "<option value='---------'id='mon10it'>---------</option>";}
?>
      
                       <?php
$query="SELECT id FROM informations WHERE Interview ='mon1it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon1it' id='mon1it'>Monday 1:00 - 2:00 PM</option>";}
          else
      {echo "<option value='---------'id='mon1it'>---------</option>";}
?>
      
                       <?php
$query="SELECT id FROM informations WHERE Interview ='mon2it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon2it' id='mon2it'>Monday 2:00 - 3:00 PM</option>";}
      
            else
      {echo "<option value='---------'id='mon2it'>---------</option>";}
?>
      
                          <?php
$query="SELECT id FROM informations WHERE Interview ='mon3it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon3it' id='mon3it'>Monday 3:00 - 4:00 PM</option>";}
          else
      {echo "<option value='---------'id='mon3it'>---------</option>";}
?>
      
                             <?php
$query="SELECT id FROM informations WHERE Interview ='mon4it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon4it' id='mon4it'>Monday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------'id='mon4it'>---------</option>";}
?>
      
                             <?php
$query="SELECT id FROM informations WHERE Interview ='mon5it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon5it' id='mon5it'>Monday 5:00 - 6:00 PM</option>";}
          else
      {echo "<option value='---------'id='mon5it'>---------</option>";}
?>
      
        
        
                               <?php
$query="SELECT id FROM informations WHERE Interview ='mon6it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon6it' id='mon6it'>Monday 6:00 - 7:00 PM</option>";}
          else
      {echo "<option value='---------'id='mon6it'>---------</option>";}
?>    
      
                                     <?php
$query="SELECT id FROM informations WHERE Interview ='mon9pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon9pr' id='mon9pr'>Monday 9:00 - 10:00 AM</option>";}
         else
      {echo "<option value='---------'id='mon9pr'>---------</option>";}
?>    
      
                                           <?php
$query="SELECT id FROM informations WHERE Interview ='mon12pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon12pr' id='mon12pr'>Monday 12:00 - 1:00</option>";}
         else
      {echo "<option value='---------'id='mon12pr'>---------</option>";}
?>    
                                           <?php
$query="SELECT id FROM informations WHERE Interview ='mon1pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon1pr' id='mon1pr'>Monday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon1pr'>---------</option>";}
?>    
      
                                           <?php
$query="SELECT id FROM informations WHERE Interview ='mon2pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon2pr' id='mon2pr'>Monday 2:00 - 3:00 PM</option>";}
          else
      {echo "<option value='---------'id='mon2pr'>---------</option>";}
?>    
                                           <?php
$query="SELECT id FROM informations WHERE Interview ='mon3pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon3pr' id='mon3pr'>Monday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon3pr'>---------</option>";}
?>    
                                           <?php
$query="SELECT id FROM informations WHERE Interview ='mon4pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon4pr' id='mon4pr'>Monday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon4pr'>---------</option>";}
?>    
                                           <?php
$query="SELECT id FROM informations WHERE Interview ='mon6pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon6pr' id='mon6pr'>Monday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon6pr'>---------</option>";}
?>    
                     
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='mon9hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon9hr' id='mon9hr'>Monday 9:00 - 10:00 AM</option>";}
        else
      {echo "<option value='---------'id='mon9hr'>---------</option>";}
?>    
          
      <?php
$query="SELECT id FROM informations WHERE Interview ='mon10hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon10hr' id='mon10hr'>Monday 10:00 - 11:00 AM</option>";}
        else
      {echo "<option value='---------'id='mon10hr'>---------</option>";}
?>    
      <?php
$query="SELECT id FROM informations WHERE Interview ='mon11hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='mon11hr' id='mon11hr'>Monday 11:00 - 12:00</option>";}
        else
      {echo "<option value='---------'id='mon11hr'>---------</option>";}
?>    
      
       <?php
$query="SELECT id FROM informations WHERE Interview ='mon12hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='mon12hr' id='mon12hr'>Monday 12:00 - 1:00 PM</option>";}
      
            else
      {echo "<option value='---------'id='mon12hr'>---------</option>";}
?>    
         <?php
$query="SELECT id FROM informations WHERE Interview ='mon1hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon1hr' id='mon1hr'>Monday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon1hr'>---------</option>";}
?>    
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='mon2hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon2hr' id='mon2hr'>Monday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon2hr'>---------</option>";}
?>    
      
             <?php
$query="SELECT id FROM informations WHERE Interview ='mon3hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='mon3hr' id='mon3hr'>Monday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon3hr'>---------</option>";}
?>    
             <?php
$query="SELECT id FROM informations WHERE Interview ='mon4hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='mon4hr' id='mon4hr'>Monday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon4hr'>---------</option>";}
?>    
             <?php
$query="SELECT id FROM informations WHERE Interview ='mon5hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='mon5hr' id='mon5hr'>Monday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon5hr'>---------</option>";}
?>    
        
        
        
             <?php
$query="SELECT id FROM informations WHERE Interview ='mon6hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='mon6hr' id='mon6hr'>Monday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon6hr'>---------</option>";}
?>    
        
      
        
        
        
        
                  <?php
$query="SELECT id FROM informations WHERE Interview ='mon1rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon1rl' id='mon1rl'>Monday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon1rl'>---------</option>";}
?>    
      
                  <?php
$query="SELECT id FROM informations WHERE Interview ='mon2rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon2rl' id='mon2rl'>Monday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon2rl'>---------</option>";}
?>    
            
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon3rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon3rl' id='mon3rl'>Monday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon3rl'>---------</option>";}
?>    
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon4rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon4rl' id='mon4rl'>Monday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon4rl'>---------</option>";}
?>    
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon5rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon5rl' id='mon5rl'>Monday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon5rl'>---------</option>";}
?>    
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon6rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon6rl' id='mon6rl'>Monday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon6rl'>---------</option>";}
?>    
        
        
        
      
       <?php
$query="SELECT id FROM informations WHERE Interview ='mon10ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon10ac' id='mon10ac'>Monday 10:00 - 11:00 AM</option>";}
        else
      {echo "<option value='---------'id='mon10ac'>---------</option>";}
?>    
       <?php
$query="SELECT id FROM informations WHERE Interview ='mon11ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='mon11ac' id='mon11ac'>Monday 11:00 - 12:00</option>";}
        else
      {echo "<option value='---------'id='mon11ac'>---------</option>";}
?>    
      
       <?php
$query="SELECT id FROM informations WHERE Interview ='mon4ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon4ac' id='mon4ac'>Monday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon4ac'>---------</option>";}
?>    
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon5ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon5ac' id='mon5ac'>Monday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon5ac'>---------</option>";}
?>    
                        <?php
$query="SELECT id FROM informations WHERE Interview ='mon6ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='mon6ac' id='mon6ac'>Monday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='mon6ac'>---------</option>";}
?>    
      
      
      
      
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='Tue10hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue10hr' id='Tue10hr'>Tuesday 10:00 - 11:00 AM</option>";}
        else
      {echo "<option value='---------'id='Tue10hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue11hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue11hr' id='Tue11hr'>Tuesday 11:00 - 12:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue11hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue12hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue12hr' id='Tue12hr'>Tuesday 12:00 - 1:00 pM</option>";}
            else
      {echo "<option value='---------'id='Tue12hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue1hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue1hr' id='Tue1hr'>Tuesday 1:00 - 2:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue1hr'>---------</option>";}
?>


<?php
$query="SELECT id FROM informations WHERE Interview ='Tue2hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue2hr' id='Tue2hr'>Tuesday 2:00 - 3:00 pM</option>";}
            else
      {echo "<option value='---------'id='Tue2hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue3hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue3hr' id='Tue3hr'>Tuesday 3:00 - 4:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue3hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue4hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue4hr' id='Tue4hr'>Tuesday 4:00 - 5:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue4hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue5hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue5hr' id='Tue5hr'>Tuesday 5:00 - 6:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue5hr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue6hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue6hr' id='Tue6hr'>Tuesday 6:00 - 7:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue6hr'>---------</option>";}
?>
        
        
        
        
        

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue12pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue12pr' id='Tue12pr'>Tuesday 12:00 - 1:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue12pr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue1pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue1pr' id='Tue1pr'>Tuesday 1:00 - 2:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue1pr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue2pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue2pr' id='Tue2pr'>Tuesday 2:00 - 3:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue2pr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue3pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue3pr' id='Tue3pr'>Tuesday 3:00 - 4:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue3pr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue4pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue4pr' id='Tue4pr'>Tuesday 4:00 - 5:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue4pr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue5pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue5pr' id='Tue5pr'>Tuesday 5:00 - 6:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue5pr'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue6pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue6pr' id='Tue6pr'>Tuesday 6:00 - 7:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue6pr'>---------</option>";}
?>

        
        
        
<?php
$query="SELECT id FROM informations WHERE Interview ='Tue2it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue2it' id='Tue2it'>Tuesday 2:00 - 3:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue2it'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue3it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue3it' id='Tue3it'>Tuesday 3:00 - 4:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue3it'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue4it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue4it' id='Tue4it'>Tuesday 4:00 - 5:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue4it'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue5it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue5it' id='Tue5it'>Tuesday 5:00 - 6:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue5it'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue6it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue6it' id='Tue6it'>Tuesday 6:00 - 7:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue6it'>---------</option>";}
?>

        
        
        
        
        
        
        
<?php
$query="SELECT id FROM informations WHERE Interview ='Tue1ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue1ac' id='Tue1ac'>Tuesday 1:00 - 2:00 pM</option>";}
          else
      {echo "<option value='---------'id='Tue1ac'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue2ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue2ac' id='Tue2ac'>Tuesday 2:00 - 3:00 pM</option>";}
  else
      {echo "<option value='---------'id='Tue2ac'>---------</option>";}
        ?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue3ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue3ac' id='Tue3ac'>Tuesday 3:00 - 4:00 pM</option>";}
  else
      {echo "<option value='---------'id='Tue3ac'>---------</option>";}
        ?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue4ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='Tue4ac' id='Tue4ac'>Tuesday 4:00 - 5:00 pM</option>";}
  else
      {echo "<option value='---------'id='Tue4ac'>---------</option>";}
        ?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue5ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue5ac' id='Tue5ac'>Tuesday 5:00 - 6:00 pM</option>";}
  else
      {echo "<option value='---------'id='Tue5ac'>---------</option>";}
        ?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue6ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue6ac' id='Tue6ac'>Tuesday 6:00 - 7:00 pM</option>";}
  else
      {echo "<option value='---------'id='Tue6ac'>---------</option>";}
        ?>

        
        
        
<?php
$query="SELECT id FROM informations WHERE Interview ='Tue2rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue2rl' id='Tue2rl'>Tuesday 2:00 - 3:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue2rl'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue3rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue3rl' id='Tue3rl'>Tuesday 3:00 - 4:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue3rl'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue4rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue4rl' id='Tue4rl'>Tuesday 4:00 - 5:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue4rl'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue5rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='Tue5rl' id='Tue5rl'>Tuesday 5:00 - 6:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue5rl'>---------</option>";}
?>

<?php
$query="SELECT id FROM informations WHERE Interview ='Tue6rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='Tue6rl' id='Tue6rl'>Tuesday 6:00 - 7:00 pM</option>";}
        else
      {echo "<option value='---------'id='Tue6rl'>---------</option>";}
?>
      
      
      
      
      
      
      
      
                             <?php
$query="SELECT id FROM informations WHERE Interview ='wed9pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed9pr' id='wed9pr'>Wednesday 9:00 - 10:00 AM</option>";}
        else
      {echo "<option value='---------'id='wed9pr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='we11pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed11pr' id='wed11pr'>Wednesday 11:00 - 12:00</option>";}
        else
      {echo "<option value='---------'id='we11pr'>---------</option>";}
?>    
      
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed12pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='wed12pr' id='wed12pr'>Wednesday 12:00 - 1:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed12pr'>---------</option>";}
?>    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed1pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed1pr' id='wed1pr'>Wednesday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed1pr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed4pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed4pr' id='wed4pr'>Wednesday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed4pr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed5pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed5pr' id='wed5pr'>Wednesday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed5pr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed6pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed6pr' id='wed6pr'>Wednesday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed6pr'>---------</option>";}
?>    
      
        
        
        
        
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='wed11hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed11hr' id='wed11hr'>Wednesday 11:00 - 12:00</option>";}
        else
      {echo "<option value='---------'id='wed11hr'>---------</option>";}
?>    
      
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed12hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed12hr' id='wed12hr'>Wednesday 12:00 - 1:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed12hr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed1hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed1hr' id='wed1hr'>Wednesday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed1hr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed2hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed2hr' id='wed2hr'>Wednesday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed2hr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed3hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed3hr' id='wed3hr'>Wednesday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed3hr'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed4hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed4hr' id='wed4hr'>Wednesday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed4hr'>---------</option>";}
?>    
                               <?php
$query="SELECT id FROM informations WHERE Interview ='wed5hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed5hr' id='wed5hr'>Wednesday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed5hr'>---------</option>";}
?>    
                               <?php
$query="SELECT id FROM informations WHERE Interview ='wed6hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed6hr' id='wed6hr'>Wednesday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed6hr'>---------</option>";}
?>    
      
        
      
        
        
      <?php
$query="SELECT id FROM informations WHERE Interview ='wed12ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed12ac' id='wed12ac'>Wednesday 12:00 - 1:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed12ac'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed1ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed1ac' id='wed1ac'>Wednesday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed1ac'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed2ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed2ac' id='wed2ac'>Wednesday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed2ac'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed3ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed3ac' id='wed3ac'>Wednesday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed3ac'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed4ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed4ac' id='wed4ac'>Wednesday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed4ac'>---------</option>";}
?>    
                               <?php
$query="SELECT id FROM informations WHERE Interview ='wed5ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed5ac' id='wed5ac'>Wednesday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed5ac'>---------</option>";}
      
?>    
      
        
      
                                     <?php
$query="SELECT id FROM informations WHERE Interview ='wed12rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed12rl' id='wed12rl'>Wednesday 12:00 - 1:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed12rl'>---------</option>";}
?>    
      
                               <?php
$query="SELECT id FROM informations WHERE Interview ='wed2rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed2rl' id='wed2rl'>Wednesday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed2rl'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed3rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed3rl' id='wed3rl'>Wednesday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed3rl'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed4rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed4rl' id='wed4rl'>Wednesday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed4rl'>---------</option>";}
?>    
                               <?php
$query="SELECT id FROM informations WHERE Interview ='wed5rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed5rl' id='wed5rl'>Wednesday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed5rl'>---------</option>";}
?>    
                               <?php
$query="SELECT id FROM informations WHERE Interview ='wed6rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed6rl' id='wed6rl'>Wednesday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed6rl'>---------</option>";}
?>    
      
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='wed1it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed1it' id='wed1it'>Wednesday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed1it'>---------</option>";}
?>    
          
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed3it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='wed3it' id='wed3it'>Wednesday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed3it'>---------</option>";}
?>    
                         <?php
$query="SELECT id FROM informations WHERE Interview ='wed4it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='wed4it' id='wed4it'>Wednesday 4:00 - 5:00 PM</option>";}
        else
      {echo "<option value='---------'id='wed4it'>---------</option>";}
?>    

      
      
      
      
  
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='thu9it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu9it' id='thu9it'>Thursday 9:00 - 10:00 AM</option>";}
          else
      {echo "<option value='---------'id='thu9it'>---------</option>";}
?>    
      
       <?php
$query="SELECT id FROM informations WHERE Interview ='thu10it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu10it' id='thu10it'>Thursday 10:00 - 11:00 AM</option>";}
               else
      {echo "<option value='---------'id='thu10it'>---------</option>";}
?>
      
   
      
      
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu12it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu12it' id='thu12it'>Thursday 12:00 - 1:00</option>";}
           else
      {echo "<option value='---------'id='thu12it'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu1it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu1it' id='thu1it'>Thursday 1:00 - 2:00 PM</option>";}
             else
      {echo "<option value='---------'id='thu1it'>---------</option>";}
?>
        
        
        
        
        
        
        
        
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu2it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu2it' id='thu2it'>Thursday 2:00 - 3:00 PM</option>";}
          else
      {echo "<option value='---------'id='thu2it'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu3it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu3it' id='thu3it'>Thursday 3:00 - 4:00 PM</option>";}
           else
      {echo "<option value='---------'id='thu3it'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu4it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu4it' id='thu4it'>Thursday 4:00 - 5:00 PM</option>";}
          else
      {echo "<option value='---------' id='thu4it'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu5it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu5it' id='thu5it'>Thursday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu5it'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu6it' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu6it' id='thu6it'>Thursday 6:00 - 7:00 PM</option>";}
            else
      {echo "<option value='---------'id='thu6it'>---------</option>";}
?>
      
      
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='thu10hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu10hr' id='thu10hr'>Thursday 10:00 - 11:00 AM</option>";}
             else
      {echo "<option value='---------'id='thu10hr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu11hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu11hr' id='thu11hr'>Thursday 11:00 - 12:00</option>";}
            else
      {echo "<option value='---------'id='thu11hr'>---------</option>";}
?>
      
      
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu12hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu12hr' id='thu12hr'>Thursday 12:00 - 1:00</option>";}
        else
     {echo "<option value='---------'id='thu12hr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu1hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu1hr' id='thu1hr'>Thursday 1:00 - 2:00 PM</option>";}
           else
      {echo "<option value='---------'id='thu1hr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu2hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu2hr' id='thu2hr'>Thursday 2:00 - 3:00 PM</option>";}
         else
      {echo "<option value='---------'id='thu2hr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu3hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu3hr' id='thu3hr'>Thursday 3:00 - 4:00 PM</option>";}
                 else
      {echo "<option value='---------'id='thu3hr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu4hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu4hr' id='thu4hr'>Thursday 4:00 - 5:00 PM</option>";}
                        else
      {echo "<option value='---------'id='thu4hr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu5hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu5hr' id='thu5hr'>Thursday 5:00 - 6:00 PM</option>";}
                       else
      {echo "<option value='---------'id='thu5hr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu6hr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<3){echo "<option value='thu6hr' id='thu6hr'>Thursday 6:00 - 7:00 PM</option>";}
               else
      {echo "<option value='---------'id='thu6hr'>---------</option>";}
        ?>
        
      
      
      
        
         
 <?php
$query="SELECT id FROM informations WHERE Interview ='thu10pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu10pr' id='thu10pr'>Thursday 10:00 - 11:00 AM</option>";}
        else
      {echo "<option value='---------'id='thu10pr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu11pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu11pr' id='thu11pr'>Thursday 11:00 - 12:00</option>";}
        else
      {echo "<option value='---------'id='thu11pr'>---------</option>";}
?>
      
      
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu12pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu12pr' id='thu12pr'>Thursday 12:00 - 1:00</option>";}
        else
      {echo "<option value='---------'id='thu12pr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu1pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu1pr' id='thu1pr'>Thursday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu1pr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu2pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu2pr' id='thu2pr'>Thursday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu2pr'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu3pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu3pr' id='thu3pr'>Thursday 3:00 - 4:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu3pr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu4pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu4pr' id='thu4pr'>Thursday 4:00 - 5:00 PM</option>";}
        else
     {echo "<option value='---------'id='thu4pr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu5pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu5pr' id='thu5pr'>Thursday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu5pr'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu6pr' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu6pr' id='thu6pr'>Thursday 6:00 - 7:00 PM</option>";}
        else
     {echo "<option value='---------'id='thu6pr'>---------</option>";}
?>
      
      
      
      
      <?php
$query="SELECT id FROM informations WHERE Interview ='thu11rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu11rl' id='thu11rl'>Thursday 11:00 - 12:00</option>";}
        else
      {echo "<option value='---------'id='thu11rl'>---------</option>";}
?>
      
      
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu12rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu12rl' id='thu12rl'>Thursday 12:00 - 1:00</option>";}
        else
      {echo "<option value='---------'id='thu12rl'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu1rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu1rl' id='thu1rl'>Thursday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu1rl'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu2rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu2rl' id='thu2rl'>Thursday 2:00 - 3:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu2rl'>---------</option>";}
?>
      

            <?php
$query="SELECT id FROM informations WHERE Interview ='thu5rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu5rl' id='thu5rl'>Thursday 5:00 - 6:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu5rl'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu6rl' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu6rl' id='thu6rl'>Thursday 6:00 - 7:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu6rl'>---------</option>";}
?>
      
      
      
      
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu10ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu10ac' id='thu10ac'>Thursday 10:00 - 11:00 AM</option>";}
        else
      {echo "<option value='---------'id='thu10ac'>---------</option>";}
?>
      
        <?php
$query="SELECT id FROM informations WHERE Interview ='thu12ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu12ac' id='thu12ac'>Thursday 12:00 - 1:00</option>";}
        else
     {echo "<option value='---------'id='thu12ac'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu1ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu1ac' id='thu1ac'>Thursday 1:00 - 2:00 PM</option>";}
        else
      {echo "<option value='---------'id='thu1ac'>---------</option>";}
?>
      
<?php
$query="SELECT id FROM informations WHERE Interview ='thu3ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu3ac' id='thu3ac'>Thursday 3:00 - 4:00 PM</option>";}
         else
      {echo "<option value='---------'id='thu3ac'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu4ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu4ac' id='thu4ac'>Thursday 4:00 - 5:00 PM</option>";}
         else
      {echo "<option value='---------'id='thu4ac'>---------</option>";}
?>
      
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu5ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<1){echo "<option value='thu5ac' id='thu5ac'>Thursday 5:00 - 6:00 PM</option>";}
         else
      {echo "<option value='---------'id='thu5ac'>---------</option>";}
?>
            <?php
$query="SELECT id FROM informations WHERE Interview ='thu6ac' ";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)<2){echo "<option value='thu6ac' id='thu6ac'>Thursday 6:00 - 7:00 PM</option>";}
            else
      {echo "<option value='---------'id='thu6ac'>---------</option>";}
?>
      
     
      
      

     
      
      
      
    </select>
  </fieldset>
          
          
  <fieldset class="form-group">
    <label for="exampleTextarea" class="questions">Do you have any previous experiences?</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </fieldset>
          
          
          
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
          
        </div>



      
      

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
          
          
    <script type="text/javascript">
      
      
      
                          document.getElementById("dtime").style.display="none";

      function updateChar() {

    var zone = document.getElementById("subject");

var temp="---------"; 
    $("#dtime").val(temp);
          
    if (zone.value == "ITMP"){
          document.getElementById("dtime").style.display="block";


  document.getElementById("itselection").style.display="block";
            document.getElementById("itmpselection").innerHTML="ITMP Section ";
      document.getElementById("it").innerHTML=" IT Section ";
       document.getElementById("mp").innerHTML=" media and publication section";
     

     document.getElementById("mon9pr").style.display="none";
       document.getElementById("mon12pr").style.display="none";
   document.getElementById("mon1pr").style.display="none";
       document.getElementById("mon2pr").style.display="none";
       document.getElementById("mon3pr").style.display="none";
       document.getElementById("mon4pr").style.display="none";
       document.getElementById("mon6pr").style.display="none";
      
             document.getElementById("mon9hr").style.display="none";
             document.getElementById("mon10hr").style.display="none";
             document.getElementById("mon11hr").style.display="none";
             document.getElementById("mon12hr").style.display="none";
             document.getElementById("mon1hr").style.display="none";
             document.getElementById("mon2hr").style.display="none";
             document.getElementById("mon3hr").style.display="none";
             document.getElementById("mon4hr").style.display="none";
             document.getElementById("mon5hr").style.display="none";
             document.getElementById("mon6hr").style.display="none";

                   document.getElementById("mon1rl").style.display="none";
             document.getElementById("mon2rl").style.display="none";
             document.getElementById("mon3rl").style.display="none";
             document.getElementById("mon4rl").style.display="none";
             document.getElementById("mon5rl").style.display="none";
             document.getElementById("mon6rl").style.display="none";
      
      document.getElementById("mon10ac").style.display="none";
             document.getElementById("mon11ac").style.display="none";
       document.getElementById("mon4ac").style.display="none";
             document.getElementById("mon5ac").style.display="none";
             document.getElementById("mon6ac").style.display="none";
      
   document.getElementById("sat11hr").style.display="none";
           document.getElementById("sat12hr").style.display="none";
   document.getElementById("sat1hr").style.display="none";
   document.getElementById("sat3hr").style.display="none";
   document.getElementById("sat4hr").style.display="none";
   document.getElementById("sat5hr").style.display="none";
   document.getElementById("sat6hr").style.display="none";
      
      document.getElementById("sat12pr").style.display="none";
   document.getElementById("sat1pr").style.display="none";
   document.getElementById("sat3pr").style.display="none";
   document.getElementById("sat4pr").style.display="none";
   document.getElementById("sat5pr").style.display="none";
   document.getElementById("sat6pr").style.display="none";
      
         document.getElementById("sat2rl").style.display="none";
   document.getElementById("sat3rl").style.display="none";
   document.getElementById("sat4rl").style.display="none";
   document.getElementById("sat5rl").style.display="none";
   document.getElementById("sat6rl").style.display="none";
      
      
      
      
      
      
                  document.getElementById("sun12ac").style.display="none";
                     document.getElementById("sun1ac").style.display="none";
                     document.getElementById("sun2ac").style.display="none";
                     document.getElementById("sun3ac").style.display="none";
                     document.getElementById("sun4ac").style.display="none";
                     document.getElementById("sun5ac").style.display="none";
                     document.getElementById("sun6ac").style.display="none";

               document.getElementById("sun2rl").style.display="none";
                     document.getElementById("sun3rl").style.display="none";
                     document.getElementById("sun4rl").style.display="none";
                     document.getElementById("sun5rl").style.display="none";
                     document.getElementById("sun6rl").style.display="none";

      
             document.getElementById("sun9hr").style.display="none";
                     document.getElementById("sun10hr").style.display="none";
                     document.getElementById("sun11hr").style.display="none";
                     document.getElementById("sun1hr").style.display="none";
                     document.getElementById("sun4hr").style.display="none";
                     document.getElementById("sun5hr").style.display="none";
            document.getElementById("sun6hr").style.display="none";

       document.getElementById("sun12pr").style.display="none";
                     document.getElementById("sun1pr").style.display="none";
                     document.getElementById("sun2pr").style.display="none";
                     document.getElementById("sun3pr").style.display="none";
                     document.getElementById("sun4pr").style.display="none";
                     document.getElementById("sun5pr").style.display="none";
                           document.getElementById("sun6pr").style.display="none";


                                 document.getElementById("wed9pr").style.display="none";
      document.getElementById("wed11pr").style.display="none";
      document.getElementById("wed12pr").style.display="none";
      document.getElementById("wed1pr").style.display="none";
      document.getElementById("wed4pr").style.display="none";
      document.getElementById("wed5pr").style.display="none";
      document.getElementById("wed6pr").style.display="none";

      
        document.getElementById("wed11hr").style.display="none";
              document.getElementById("wed12hr").style.display="none";
        document.getElementById("wed1hr").style.display="none";
        document.getElementById("wed2hr").style.display="none";
        document.getElementById("wed3hr").style.display="none";
        document.getElementById("wed4hr").style.display="none";
        document.getElementById("wed5hr").style.display="none";
        document.getElementById("wed6hr").style.display="none";
      
                    document.getElementById("wed12ac").style.display="none";
                      document.getElementById("wed1ac").style.display="none";
                            document.getElementById("wed2ac").style.display="none";
                      document.getElementById("wed3ac").style.display="none";
                      document.getElementById("wed4ac").style.display="none";
                      document.getElementById("wed5ac").style.display="none";


                    document.getElementById("wed12rl").style.display="none";
                          document.getElementById("wed2rl").style.display="none";
                    document.getElementById("wed3rl").style.display="none";
                    document.getElementById("wed4rl").style.display="none";
                    document.getElementById("wed5rl").style.display="none";
                    document.getElementById("wed6rl").style.display="none";
      
                          document.getElementById("wed1it").style.display="block";
                                document.getElementById("wed3it").style.display="block";
                          document.getElementById("wed4it").style.display="block";


document.getElementById("Tue10hr").style.display="none";
      document.getElementById("Tue11hr").style.display="none";
document.getElementById("Tue12hr").style.display="none";
document.getElementById("Tue1hr").style.display="none";
document.getElementById("Tue2hr").style.display="none";
document.getElementById("Tue3hr").style.display="none";
document.getElementById("Tue4hr").style.display="none";
document.getElementById("Tue5hr").style.display="none";
document.getElementById("Tue6hr").style.display="none";

      document.getElementById("Tue12pr").style.display="none";
      document.getElementById("Tue1pr").style.display="none";
      document.getElementById("Tue2pr").style.display="none";
      document.getElementById("Tue3pr").style.display="none";
      document.getElementById("Tue4pr").style.display="none";
      document.getElementById("Tue5pr").style.display="none";
      document.getElementById("Tue6pr").style.display="none";
      
      document.getElementById("Tue2it").style.display="block";
            document.getElementById("Tue3it").style.display="block";
      document.getElementById("Tue4it").style.display="block";
      document.getElementById("Tue5it").style.display="block";
      document.getElementById("Tue6it").style.display="block";
      
            document.getElementById("Tue2rl").style.display="none";
            document.getElementById("Tue3rl").style.display="none";
      document.getElementById("Tue4rl").style.display="none";
      document.getElementById("Tue5rl").style.display="none";
      document.getElementById("Tue6rl").style.display="none";

      document.getElementById("Tue1ac").style.display="none";
      document.getElementById("Tue2ac").style.display="none";
      document.getElementById("Tue3ac").style.display="none";
      document.getElementById("Tue4ac").style.display="none";
      document.getElementById("Tue5ac").style.display="none";
      document.getElementById("Tue6ac").style.display="none";


      document.getElementById("thu9it").style.display="block";
      document.getElementById("thu10it").style.display="block";
      document.getElementById("thu12it").style.display="block";
      document.getElementById("thu1it").style.display="block";
      document.getElementById("thu2it").style.display="block";
      document.getElementById("thu3it").style.display="block";
      document.getElementById("thu4it").style.display="block";
      document.getElementById("thu5it").style.display="block";
      document.getElementById("thu6it").style.display="block";


            document.getElementById("thu10hr").style.display="none";
            document.getElementById("thu11hr").style.display="none";
            document.getElementById("thu12hr").style.display="none";
            document.getElementById("thu1hr").style.display="none";
            document.getElementById("thu2hr").style.display="none";
            document.getElementById("thu3hr").style.display="none";
            document.getElementById("thu4hr").style.display="none";
            document.getElementById("thu5hr").style.display="none";
            document.getElementById("thu6hr").style.display="none";

   document.getElementById("thu10pr").style.display="none";
                  document.getElementById("thu11pr").style.display="none";
            document.getElementById("thu12pr").style.display="none";
            document.getElementById("thu1pr").style.display="none";
            document.getElementById("thu2pr").style.display="none";
            document.getElementById("thu3pr").style.display="none";
            document.getElementById("thu4pr").style.display="none";
            document.getElementById("thu5pr").style.display="none";
            document.getElementById("thu6pr").style.display="none";

document.getElementById("thu11rl").style.display="none";
            document.getElementById("thu12rl").style.display="none";
            document.getElementById("thu1rl").style.display="none";
            document.getElementById("thu2rl").style.display="none";
 document.getElementById("thu5rl").style.display="none";
            document.getElementById("thu6rl").style.display="none";
      
      
      
         document.getElementById("thu10ac").style.display="none";
            document.getElementById("thu12ac").style.display="none";         
      document.getElementById("thu1ac").style.display="none";

      document.getElementById("thu3ac").style.display="none";
            document.getElementById("thu4ac").style.display="none";
            document.getElementById("thu5ac").style.display="none";
            document.getElementById("thu6ac").style.display="none";
      
      
          document.getElementById("sat12it").style.display="block";
document.getElementById("sat1it").style.display="block";
    document.getElementById("sun9it").style.display="block";
        document.getElementById("sun10it").style.display="block";
       document.getElementById("sun5it").style.display="block";
       document.getElementById("sun6it").style.display="block";
       document.getElementById("mon9it").style.display="block";
            
             document.getElementById("mon1it").style.display="block";
            document.getElementById("mon2it").style.display="block";
             document.getElementById("mon3it").style.display="block";
             document.getElementById("mon4it").style.display="block";
             document.getElementById("mon5it").style.display="block";
             document.getElementById("mon6it").style.display="block";
       document.getElementById("mon10it").style.display="block";


    }
        
        
        
            if (zone.value == "PR"){
 

                
                document.getElementById("dtime").style.display="block";


   document.getElementById("itselection").style.display="block";
              
            document.getElementById("itmpselection").innerHTML=" PR Section ";
      document.getElementById("it").innerHTML=" Media sponsores section ";
       document.getElementById("mp").innerHTML=" digital marketing section";
             

          document.getElementById("sat12it").style.display="none";
document.getElementById("sat1it").style.display="none";
      document.getElementById("sun9it").style.display="none";
        document.getElementById("sun10it").style.display="none";
       document.getElementById("sun5it").style.display="none";
       document.getElementById("sun6it").style.display="none";
            document.getElementById("mon9it").style.display="none";
              document.getElementById("mon1it").style.display="none";
               document.getElementById("mon2it").style.display="none";
            document.getElementById("mon3it").style.display="none";
            document.getElementById("mon4it").style.display="none";
            document.getElementById("mon5it").style.display="none";
            document.getElementById("mon6it").style.display="none";
            document.getElementById("mon10it").style.display="none";
             document.getElementById("mon9pr").style.display="block";
       document.getElementById("mon12pr").style.display="block";
 document.getElementById("mon1pr").style.display="block";
       document.getElementById("mon2pr").style.display="block";
       document.getElementById("mon3pr").style.display="block";
       document.getElementById("mon4pr").style.display="block";
       document.getElementById("mon6pr").style.display="block";
             document.getElementById("mon9hr").style.display="none";
             document.getElementById("mon10hr").style.display="none";
             document.getElementById("mon11hr").style.display="none";
             document.getElementById("mon12hr").style.display="none";
             document.getElementById("mon1hr").style.display="none";
             document.getElementById("mon2hr").style.display="none";
             document.getElementById("mon3hr").style.display="none";
             document.getElementById("mon4hr").style.display="none";
             document.getElementById("mon5hr").style.display="none";
             document.getElementById("mon6hr").style.display="none";
            document.getElementById("mon1rl").style.display="none";
             document.getElementById("mon2rl").style.display="none";
             document.getElementById("mon3rl").style.display="none";
             document.getElementById("mon4rl").style.display="none";
             document.getElementById("mon5rl").style.display="none";
             document.getElementById("mon6rl").style.display="none";
           document.getElementById("mon10ac").style.display="none";
             document.getElementById("mon11ac").style.display="none";
       document.getElementById("mon4ac").style.display="none";
             document.getElementById("mon5ac").style.display="none";
             document.getElementById("mon6ac").style.display="none";
   document.getElementById("sat11hr").style.display="none";
           document.getElementById("sat12hr").style.display="none";
   document.getElementById("sat1hr").style.display="none";

   document.getElementById("sat3hr").style.display="none";
   document.getElementById("sat4hr").style.display="none";
   document.getElementById("sat5hr").style.display="none";
   document.getElementById("sat6hr").style.display="none";
      
      document.getElementById("sat12pr").style.display="block";
   document.getElementById("sat1pr").style.display="block";
   document.getElementById("sat3pr").style.display="block";
   document.getElementById("sat4pr").style.display="block";
   document.getElementById("sat5pr").style.display="block";
   document.getElementById("sat6pr").style.display="block";
      
         document.getElementById("sat2rl").style.display="none";
   document.getElementById("sat3rl").style.display="none";
   document.getElementById("sat4rl").style.display="none";
   document.getElementById("sat5rl").style.display="none";
   document.getElementById("sat6rl").style.display="none";
      

              
                  document.getElementById("sun12ac").style.display="none";
                     document.getElementById("sun1ac").style.display="none";
                     document.getElementById("sun2ac").style.display="none";
                     document.getElementById("sun3ac").style.display="none";
                     document.getElementById("sun4ac").style.display="none";
                     document.getElementById("sun5ac").style.display="none";
                                   document.getElementById("sun6ac").style.display="none";


               document.getElementById("sun2rl").style.display="none";
                     document.getElementById("sun3rl").style.display="none";
                     document.getElementById("sun4rl").style.display="none";
                     document.getElementById("sun5rl").style.display="none";
                     document.getElementById("sun6rl").style.display="none";

      
             document.getElementById("sun9hr").style.display="none";
                     document.getElementById("sun10hr").style.display="none";
                     document.getElementById("sun11hr").style.display="none";
                     document.getElementById("sun1hr").style.display="none";
                     document.getElementById("sun4hr").style.display="none";
                     document.getElementById("sun5hr").style.display="none";
            document.getElementById("sun6hr").style.display="none";

       document.getElementById("sun12pr").style.display="block";
                     document.getElementById("sun1pr").style.display="block";
                     document.getElementById("sun2pr").style.display="block";
                     document.getElementById("sun3pr").style.display="block";
                     document.getElementById("sun4pr").style.display="block";
                     document.getElementById("sun5pr").style.display="block";
                           document.getElementById("sun6pr").style.display="block";
            
              
              
                                     document.getElementById("wed9pr").style.display="block";
      document.getElementById("wed11pr").style.display="block";
      document.getElementById("wed12pr").style.display="block";
      document.getElementById("wed1pr").style.display="block";
      document.getElementById("wed4pr").style.display="block";
      document.getElementById("wed5pr").style.display="block";
      document.getElementById("wed6pr").style.display="block";

      
        document.getElementById("wed11hr").style.display="none";
              document.getElementById("wed12hr").style.display="none";
        document.getElementById("wed1hr").style.display="none";
        document.getElementById("wed2hr").style.display="none";
        document.getElementById("wed3hr").style.display="none";
        document.getElementById("wed4hr").style.display="none";
        document.getElementById("wed5hr").style.display="none";
        document.getElementById("wed6hr").style.display="none";
      
                    document.getElementById("wed12ac").style.display="none";
                      document.getElementById("wed1ac").style.display="none";
                            document.getElementById("wed2ac").style.display="none";
                      document.getElementById("wed3ac").style.display="none";
                      document.getElementById("wed4ac").style.display="none";
                      document.getElementById("wed5ac").style.display="none";


                    document.getElementById("wed12rl").style.display="none";
                          document.getElementById("wed2rl").style.display="none";
                    document.getElementById("wed3rl").style.display="none";
                    document.getElementById("wed4rl").style.display="none";
                    document.getElementById("wed5rl").style.display="none";
                    document.getElementById("wed6rl").style.display="none";
      
                          document.getElementById("wed1it").style.display="none";
                                document.getElementById("wed3it").style.display="none";
                          document.getElementById("wed4it").style.display="none";
              
              
document.getElementById("Tue10hr").style.display="none";
      document.getElementById("Tue11hr").style.display="none";
document.getElementById("Tue12hr").style.display="none";
document.getElementById("Tue1hr").style.display="none";
document.getElementById("Tue2hr").style.display="none";
document.getElementById("Tue3hr").style.display="none";
document.getElementById("Tue4hr").style.display="none";
document.getElementById("Tue5hr").style.display="none";
document.getElementById("Tue6hr").style.display="none";

      document.getElementById("Tue12pr").style.display="block";
      document.getElementById("Tue1pr").style.display="block";
      document.getElementById("Tue2pr").style.display="block";
      document.getElementById("Tue3pr").style.display="block";
      document.getElementById("Tue4pr").style.display="block";
      document.getElementById("Tue5pr").style.display="block";
      document.getElementById("Tue6pr").style.display="block";
      
      document.getElementById("Tue2it").style.display="none";
            document.getElementById("Tue3it").style.display="none";
      document.getElementById("Tue4it").style.display="none";
      document.getElementById("Tue5it").style.display="none";
      document.getElementById("Tue6it").style.display="none";
      
            document.getElementById("Tue2rl").style.display="none";
            document.getElementById("Tue3rl").style.display="none";
      document.getElementById("Tue4rl").style.display="none";
      document.getElementById("Tue5rl").style.display="none";
      document.getElementById("Tue6rl").style.display="none";

      document.getElementById("Tue1ac").style.display="none";
      document.getElementById("Tue2ac").style.display="none";
      document.getElementById("Tue3ac").style.display="none";
      document.getElementById("Tue4ac").style.display="none";
      document.getElementById("Tue5ac").style.display="none";
      document.getElementById("Tue6ac").style.display="none";

              
               document.getElementById("thu9it").style.display="none";
            document.getElementById("thu10it").style.display="none";
      document.getElementById("thu12it").style.display="none";
      document.getElementById("thu1it").style.display="none";
      document.getElementById("thu2it").style.display="none";
      document.getElementById("thu3it").style.display="none";
      document.getElementById("thu4it").style.display="none";
      document.getElementById("thu5it").style.display="none";
      document.getElementById("thu6it").style.display="none";


            document.getElementById("thu10hr").style.display="none";
            document.getElementById("thu11hr").style.display="none";
            document.getElementById("thu12hr").style.display="none";
            document.getElementById("thu1hr").style.display="none";
            document.getElementById("thu2hr").style.display="none";
            document.getElementById("thu3hr").style.display="none";
            document.getElementById("thu4hr").style.display="none";
            document.getElementById("thu5hr").style.display="none";
            document.getElementById("thu6hr").style.display="none";

   document.getElementById("thu10pr").style.display="block";
                  document.getElementById("thu11pr").style.display="block";
            document.getElementById("thu12pr").style.display="block";
            document.getElementById("thu1pr").style.display="block";
            document.getElementById("thu2pr").style.display="block";
            document.getElementById("thu3pr").style.display="block";
            document.getElementById("thu4pr").style.display="block";
            document.getElementById("thu5pr").style.display="block";
            document.getElementById("thu6pr").style.display="block";

document.getElementById("thu11rl").style.display="none";
            document.getElementById("thu12rl").style.display="none";
            document.getElementById("thu1rl").style.display="none";
            document.getElementById("thu2rl").style.display="none";
 document.getElementById("thu5rl").style.display="none";
            document.getElementById("thu6rl").style.display="none";
      
      
      
         document.getElementById("thu10ac").style.display="none";
            document.getElementById("thu12ac").style.display="none";
                          document.getElementById("thu1ac").style.display="none";

      document.getElementById("thu3ac").style.display="none";
            document.getElementById("thu4ac").style.display="none";
            document.getElementById("thu5ac").style.display="none";
            document.getElementById("thu6ac").style.display="none";
    }
        
                    if (zone.value == "HR"){
                        
                                  document.getElementById("dtime").style.display="block";


     document.getElementById("itselection").style.display="none";
          document.getElementById("sat12it").style.display="none";

                      document.getElementById("sat1it").style.display="none";
  
  document.getElementById("mon9it").style.display="none";
          
             document.getElementById("mon1it").style.display="none";
            document.getElementById("mon2it").style.display="none";
             document.getElementById("mon3it").style.display="none";
             document.getElementById("mon4it").style.display="none";
             document.getElementById("mon5it").style.display="none";
             document.getElementById("mon6it").style.display="none";
                        document.getElementById("mon10it").style.display="none";
 document.getElementById("mon9pr").style.display="none";
       document.getElementById("mon12pr").style.display="none";
 document.getElementById("mon1pr").style.display="none";
       document.getElementById("mon2pr").style.display="none";
       document.getElementById("mon3pr").style.display="none";
       document.getElementById("mon4pr").style.display="none";
       document.getElementById("mon6pr").style.display="none";
        document.getElementById("mon9hr").style.display="block";
             document.getElementById("mon10hr").style.display="block";
             document.getElementById("mon11hr").style.display="block";
             document.getElementById("mon12hr").style.display="block";
             document.getElementById("mon1hr").style.display="block";
             document.getElementById("mon2hr").style.display="block";
             document.getElementById("mon3hr").style.display="block";
             document.getElementById("mon4hr").style.display="block";
             document.getElementById("mon5hr").style.display="block";
             document.getElementById("mon6hr").style.display="block";
  document.getElementById("sun9it").style.display="none";
        document.getElementById("sun10it").style.display="none";
       document.getElementById("sun5it").style.display="none";
       document.getElementById("sun6it").style.display="none";
                  document.getElementById("mon1rl").style.display="none";
             document.getElementById("mon2rl").style.display="none";
             document.getElementById("mon3rl").style.display="none";
             document.getElementById("mon4rl").style.display="none";
             document.getElementById("mon5rl").style.display="none";
             document.getElementById("mon6rl").style.display="none";
           document.getElementById("mon10ac").style.display="none";
             document.getElementById("mon11ac").style.display="none";
       document.getElementById("mon4ac").style.display="none";
             document.getElementById("mon5ac").style.display="none";
             document.getElementById("mon6ac").style.display="none";
   document.getElementById("sat11hr").style.display="block";
           document.getElementById("sat12hr").style.display="block";
   document.getElementById("sat1hr").style.display="block";
   document.getElementById("sat3hr").style.display="block";
   document.getElementById("sat4hr").style.display="block";
   document.getElementById("sat5hr").style.display="block";
   document.getElementById("sat6hr").style.display="block";
      
      document.getElementById("sat12pr").style.display="none";
   document.getElementById("sat1pr").style.display="none";
   document.getElementById("sat3pr").style.display="none";
   document.getElementById("sat4pr").style.display="none";
   document.getElementById("sat5pr").style.display="none";
   document.getElementById("sat6pr").style.display="none";
      
         document.getElementById("sat2rl").style.display="none";
   document.getElementById("sat3rl").style.display="none";
   document.getElementById("sat4rl").style.display="none";
   document.getElementById("sat5rl").style.display="none";
   document.getElementById("sat6rl").style.display="none";
      

                          document.getElementById("sun12ac").style.display="none";
                     document.getElementById("sun1ac").style.display="none";
                     document.getElementById("sun2ac").style.display="none";
                     document.getElementById("sun3ac").style.display="none";
                     document.getElementById("sun4ac").style.display="none";
                     document.getElementById("sun5ac").style.display="none";
                     document.getElementById("sun6ac").style.display="none";

               document.getElementById("sun2rl").style.display="none";
                     document.getElementById("sun3rl").style.display="none";
                     document.getElementById("sun4rl").style.display="none";
                     document.getElementById("sun5rl").style.display="none";
                     document.getElementById("sun6rl").style.display="none";

      
             document.getElementById("sun9hr").style.display="block";
                     document.getElementById("sun10hr").style.display="block";
                     document.getElementById("sun11hr").style.display="block";
                     document.getElementById("sun1hr").style.display="block";
                     document.getElementById("sun4hr").style.display="block";
                     document.getElementById("sun5hr").style.display="block";
            document.getElementById("sun6hr").style.display="block";

       document.getElementById("sun12pr").style.display="none";
                     document.getElementById("sun1pr").style.display="none";
                     document.getElementById("sun2pr").style.display="none";
                     document.getElementById("sun3pr").style.display="none";
                     document.getElementById("sun4pr").style.display="none";
                     document.getElementById("sun5pr").style.display="none";
                           document.getElementById("sun6pr").style.display="none";
    
                    
                                             document.getElementById("wed9pr").style.display="none";
      document.getElementById("wed11pr").style.display="none";
      document.getElementById("wed12pr").style.display="none";
      document.getElementById("wed1pr").style.display="none";
      document.getElementById("wed4pr").style.display="none";
      document.getElementById("wed5pr").style.display="none";
      document.getElementById("wed6pr").style.display="none";

      
        document.getElementById("wed11hr").style.display="block";
              document.getElementById("wed12hr").style.display="block";
        document.getElementById("wed1hr").style.display="block";
        document.getElementById("wed2hr").style.display="block";
        document.getElementById("wed3hr").style.display="block";
        document.getElementById("wed4hr").style.display="block";
        document.getElementById("wed5hr").style.display="block";
        document.getElementById("wed6hr").style.display="block";
      
                    document.getElementById("wed12ac").style.display="none";
                      document.getElementById("wed1ac").style.display="none";
                            document.getElementById("wed2ac").style.display="none";
                      document.getElementById("wed3ac").style.display="none";
                      document.getElementById("wed4ac").style.display="none";
                      document.getElementById("wed5ac").style.display="none";


                    document.getElementById("wed12rl").style.display="none";
                          document.getElementById("wed2rl").style.display="none";
                    document.getElementById("wed3rl").style.display="none";
                    document.getElementById("wed4rl").style.display="none";
                    document.getElementById("wed5rl").style.display="none";
                    document.getElementById("wed6rl").style.display="none";
      
                          document.getElementById("wed1it").style.display="none";
                                document.getElementById("wed3it").style.display="none";
                          document.getElementById("wed4it").style.display="none";
                      
                      
                      
document.getElementById("Tue10hr").style.display="block";
      document.getElementById("Tue11hr").style.display="block";
document.getElementById("Tue12hr").style.display="block";
document.getElementById("Tue1hr").style.display="block";
document.getElementById("Tue2hr").style.display="block";
document.getElementById("Tue3hr").style.display="block";
document.getElementById("Tue4hr").style.display="block";
document.getElementById("Tue5hr").style.display="block";
document.getElementById("Tue6hr").style.display="block";

      document.getElementById("Tue12pr").style.display="none";
      document.getElementById("Tue1pr").style.display="none";
      document.getElementById("Tue2pr").style.display="none";
      document.getElementById("Tue3pr").style.display="none";
      document.getElementById("Tue4pr").style.display="none";
      document.getElementById("Tue5pr").style.display="none";
      document.getElementById("Tue6pr").style.display="none";
      
      document.getElementById("Tue2it").style.display="none";
            document.getElementById("Tue3it").style.display="none";
      document.getElementById("Tue4it").style.display="none";
      document.getElementById("Tue5it").style.display="none";
      document.getElementById("Tue6it").style.display="none";
      
            document.getElementById("Tue2rl").style.display="none";
            document.getElementById("Tue3rl").style.display="none";
      document.getElementById("Tue4rl").style.display="none";
      document.getElementById("Tue5rl").style.display="none";
      document.getElementById("Tue6rl").style.display="none";

      document.getElementById("Tue1ac").style.display="none";
      document.getElementById("Tue2ac").style.display="none";
      document.getElementById("Tue3ac").style.display="none";
      document.getElementById("Tue4ac").style.display="none";
      document.getElementById("Tue5ac").style.display="none";
      document.getElementById("Tue6ac").style.display="none";

      document.getElementById("thu9it").style.display="none";
      document.getElementById("thu10it").style.display="none";
      document.getElementById("thu12it").style.display="none";
      document.getElementById("thu1it").style.display="none";
      document.getElementById("thu2it").style.display="none";
      document.getElementById("thu3it").style.display="none";
      document.getElementById("thu4it").style.display="none";
      document.getElementById("thu5it").style.display="none";
      document.getElementById("thu6it").style.display="none";


            document.getElementById("thu10hr").style.display="block";
            document.getElementById("thu11hr").style.display="block";
            document.getElementById("thu12hr").style.display="block";
            document.getElementById("thu1hr").style.display="block";
            document.getElementById("thu2hr").style.display="block";
            document.getElementById("thu3hr").style.display="block";
            document.getElementById("thu4hr").style.display="block";
            document.getElementById("thu5hr").style.display="block";
            document.getElementById("thu6hr").style.display="block";

        document.getElementById("thu10pr").style.display="none";
            document.getElementById("thu11pr").style.display="none";
            document.getElementById("thu12pr").style.display="none";
            document.getElementById("thu1pr").style.display="none";
            document.getElementById("thu2pr").style.display="none";
            document.getElementById("thu3pr").style.display="none";
            document.getElementById("thu4pr").style.display="none";
            document.getElementById("thu5pr").style.display="none";
            document.getElementById("thu6pr").style.display="none";

document.getElementById("thu11rl").style.display="none";
            document.getElementById("thu12rl").style.display="none";
            document.getElementById("thu1rl").style.display="none";
            document.getElementById("thu2rl").style.display="none";
 document.getElementById("thu5rl").style.display="none";
            document.getElementById("thu6rl").style.display="none";
      
      
      
         document.getElementById("thu10ac").style.display="none";
            document.getElementById("thu12ac").style.display="none";
                                                document.getElementById("thu1ac").style.display="none";

      document.getElementById("thu3ac").style.display="none";
            document.getElementById("thu4ac").style.display="none";
            document.getElementById("thu5ac").style.display="none";
            document.getElementById("thu6ac").style.display="none";
                    
                    }
        
                    if (zone.value == "AC"){
                        
                                  document.getElementById("dtime").style.display="block";


  
                            document.getElementById("itselection").style.display="none";
          document.getElementById("sat12it").style.display="none";
document.getElementById("sat1it").style.display="none";;
  
  document.getElementById("mon9it").style.display="none";
             document.getElementById("mon10it").style.display="none";
             document.getElementById("mon1it").style.display="none";
            document.getElementById("mon2it").style.display="none";
             document.getElementById("mon3it").style.display="none";
             document.getElementById("mon4it").style.display="none";
             document.getElementById("mon5it").style.display="none";
             document.getElementById("mon6it").style.display="none";
   document.getElementById("mon9pr").style.display="none";
       document.getElementById("mon12pr").style.display="none";
 document.getElementById("mon1pr").style.display="none";
       document.getElementById("mon2pr").style.display="none";
       document.getElementById("mon3pr").style.display="none";
       document.getElementById("mon4pr").style.display="none";
       document.getElementById("mon6pr").style.display="none";
        document.getElementById("mon9hr").style.display="none";
             document.getElementById("mon10hr").style.display="none";
             document.getElementById("mon11hr").style.display="none";
             document.getElementById("mon12hr").style.display="none";
             document.getElementById("mon1hr").style.display="none";
             document.getElementById("mon2hr").style.display="none";
             document.getElementById("mon3hr").style.display="none";
             document.getElementById("mon4hr").style.display="none";
             document.getElementById("mon5hr").style.display="none";
             document.getElementById("mon6hr").style.display="none";
  document.getElementById("sun9it").style.display="none";
        document.getElementById("sun10it").style.display="none";
       document.getElementById("sun5it").style.display="none";
       document.getElementById("sun6it").style.display="none";
                document.getElementById("mon1rl").style.display="none";
             document.getElementById("mon2rl").style.display="none";
             document.getElementById("mon3rl").style.display="none";
             document.getElementById("mon4rl").style.display="none";
             document.getElementById("mon5rl").style.display="none";
             document.getElementById("mon6rl").style.display="none";
           document.getElementById("mon10ac").style.display="block";
             document.getElementById("mon11ac").style.display="block";
       document.getElementById("mon4ac").style.display="block";
             document.getElementById("mon5ac").style.display="block";
             document.getElementById("mon6ac").style.display="block";
   document.getElementById("sat11hr").style.display="none";
           document.getElementById("sat12hr").style.display="none";
   document.getElementById("sat1hr").style.display="none";
   document.getElementById("sat3hr").style.display="none";
   document.getElementById("sat4hr").style.display="none";
   document.getElementById("sat5hr").style.display="none";
   document.getElementById("sat6hr").style.display="none";
      
      document.getElementById("sat12pr").style.display="none";
   document.getElementById("sat1pr").style.display="none";
   document.getElementById("sat3pr").style.display="none";
   document.getElementById("sat4pr").style.display="none";
   document.getElementById("sat5pr").style.display="none";
   document.getElementById("sat6pr").style.display="none";
      
         document.getElementById("sat2rl").style.display="none";
   document.getElementById("sat3rl").style.display="none";
   document.getElementById("sat4rl").style.display="none";
   document.getElementById("sat5rl").style.display="none";
   document.getElementById("sat6rl").style.display="none";
      

                    
                      
                          document.getElementById("sun12ac").style.display="block";
                     document.getElementById("sun1ac").style.display="block";
                     document.getElementById("sun2ac").style.display="block";
                     document.getElementById("sun3ac").style.display="block";
                     document.getElementById("sun4ac").style.display="block";
                     document.getElementById("sun5ac").style.display="block";

               document.getElementById("sun2rl").style.display="none";
                     document.getElementById("sun3rl").style.display="none";
                     document.getElementById("sun4rl").style.display="none";
                     document.getElementById("sun5rl").style.display="none";
                     document.getElementById("sun6rl").style.display="none";

      
             document.getElementById("sun9hr").style.display="none";
                     document.getElementById("sun10hr").style.display="none";
                     document.getElementById("sun11hr").style.display="none";
                     document.getElementById("sun1hr").style.display="none";
                     document.getElementById("sun4hr").style.display="none";
                     document.getElementById("sun5hr").style.display="none";
            document.getElementById("sun6hr").style.display="none";

       document.getElementById("sun12pr").style.display="none";
                     document.getElementById("sun1pr").style.display="none";
                     document.getElementById("sun2pr").style.display="none";
                     document.getElementById("sun3pr").style.display="none";
                     document.getElementById("sun4pr").style.display="none";
                     document.getElementById("sun5pr").style.display="none";
                           document.getElementById("sun6pr").style.display="none";
                      
                      
                                             document.getElementById("wed9pr").style.display="none";
      document.getElementById("wed11pr").style.display="none";
      document.getElementById("wed12pr").style.display="none";
      document.getElementById("wed1pr").style.display="none";
      document.getElementById("wed4pr").style.display="none";
      document.getElementById("wed5pr").style.display="none";
      document.getElementById("wed6pr").style.display="none";

      
        document.getElementById("wed11hr").style.display="none";
              document.getElementById("wed12hr").style.display="none";
        document.getElementById("wed1hr").style.display="none";
        document.getElementById("wed2hr").style.display="none";
        document.getElementById("wed3hr").style.display="none";
        document.getElementById("wed4hr").style.display="none";
        document.getElementById("wed5hr").style.display="none";
        document.getElementById("wed6hr").style.display="none";
      
                    document.getElementById("wed12ac").style.display="block";
                      document.getElementById("wed1ac").style.display="block";
                            document.getElementById("wed2ac").style.display="block";
                      document.getElementById("wed3ac").style.display="block";
                      document.getElementById("wed4ac").style.display="block";
                      document.getElementById("wed5ac").style.display="block";


                    document.getElementById("wed12rl").style.display="none";
                          document.getElementById("wed2rl").style.display="none";
                    document.getElementById("wed3rl").style.display="none";
                    document.getElementById("wed4rl").style.display="none";
                    document.getElementById("wed5rl").style.display="none";
                    document.getElementById("wed6rl").style.display="none";
      
                          document.getElementById("wed1it").style.display="none";
                                document.getElementById("wed3it").style.display="none";
                          document.getElementById("wed4it").style.display="none";
                      
document.getElementById("Tue10hr").style.display="none";
      document.getElementById("Tue11hr").style.display="none";
document.getElementById("Tue12hr").style.display="none";
document.getElementById("Tue1hr").style.display="none";
document.getElementById("Tue2hr").style.display="none";
document.getElementById("Tue3hr").style.display="none";
document.getElementById("Tue4hr").style.display="none";
document.getElementById("Tue5hr").style.display="none";
document.getElementById("Tue6hr").style.display="none";

      document.getElementById("Tue12pr").style.display="none";
      document.getElementById("Tue1pr").style.display="none";
      document.getElementById("Tue2pr").style.display="none";
      document.getElementById("Tue3pr").style.display="none";
      document.getElementById("Tue4pr").style.display="none";
      document.getElementById("Tue5pr").style.display="none";
      document.getElementById("Tue6pr").style.display="none";
      
      document.getElementById("Tue2it").style.display="none";
            document.getElementById("Tue3it").style.display="none";
      document.getElementById("Tue4it").style.display="none";
      document.getElementById("Tue5it").style.display="none";
      document.getElementById("Tue6it").style.display="none";
      
            document.getElementById("Tue2rl").style.display="none";
            document.getElementById("Tue3rl").style.display="none";
      document.getElementById("Tue4rl").style.display="none";
      document.getElementById("Tue5rl").style.display="none";
      document.getElementById("Tue6rl").style.display="none";

      document.getElementById("Tue1ac").style.display="block";
      document.getElementById("Tue2ac").style.display="block";
      document.getElementById("Tue3ac").style.display="block";
      document.getElementById("Tue4ac").style.display="block";
      document.getElementById("Tue5ac").style.display="block";
      document.getElementById("Tue6ac").style.display="block";
      document.getElementById("thu9it").style.display="none";
            document.getElementById("thu10it").style.display="none";
      document.getElementById("thu12it").style.display="none";
      document.getElementById("thu1it").style.display="none";
      document.getElementById("thu2it").style.display="none";
      document.getElementById("thu3it").style.display="none";
      document.getElementById("thu4it").style.display="none";
      document.getElementById("thu5it").style.display="none";
      document.getElementById("thu6it").style.display="none";


            document.getElementById("thu10hr").style.display="none";
                  document.getElementById("thu11hr").style.display="none";
            document.getElementById("thu12hr").style.display="none";
            document.getElementById("thu1hr").style.display="none";
            document.getElementById("thu2hr").style.display="none";
            document.getElementById("thu3hr").style.display="none";
            document.getElementById("thu4hr").style.display="none";
            document.getElementById("thu5hr").style.display="none";
            document.getElementById("thu6hr").style.display="none";

   document.getElementById("thu10pr").style.display="none";
                  document.getElementById("thu11pr").style.display="none";
            document.getElementById("thu12pr").style.display="none";
            document.getElementById("thu1pr").style.display="none";
            document.getElementById("thu2pr").style.display="none";
            document.getElementById("thu3pr").style.display="none";
            document.getElementById("thu4pr").style.display="none";
            document.getElementById("thu5pr").style.display="none";
            document.getElementById("thu6pr").style.display="none";

document.getElementById("thu11rl").style.display="none";
            document.getElementById("thu12rl").style.display="none";
            document.getElementById("thu1rl").style.display="none";
            document.getElementById("thu2rl").style.display="none";
 document.getElementById("thu5rl").style.display="none";
            document.getElementById("thu6rl").style.display="none";
      
      
      
         document.getElementById("thu10ac").style.display="block";
            document.getElementById("thu12ac").style.display="block";
                                                document.getElementById("thu1ac").style.display="block";

      document.getElementById("thu3ac").style.display="block";
            document.getElementById("thu4ac").style.display="block";
            document.getElementById("thu5ac").style.display="block";
            document.getElementById("thu6ac").style.display="block";
                    }
                            if (zone.value == "RL"){

                                
                                          document.getElementById("dtime").style.display="block";


  
              document.getElementById("itselection").style.display="none";
          document.getElementById("sat12it").style.display="none";
document.getElementById("sat1it").style.display="none";
  
      
        document.getElementById("mon9it").style.display="none";
             document.getElementById("mon10it").style.display="none";
             document.getElementById("mon1it").style.display="none";
            document.getElementById("mon2it").style.display="none";
             document.getElementById("mon3it").style.display="none";
             document.getElementById("mon4it").style.display="none";
             document.getElementById("mon5it").style.display="none";
             document.getElementById("mon6it").style.display="none";
                               document.getElementById("mon9pr").style.display="none";
       document.getElementById("mon12pr").style.display="none";
 document.getElementById("mon1pr").style.display="none";
       document.getElementById("mon2pr").style.display="none";
       document.getElementById("mon3pr").style.display="none";
       document.getElementById("mon4pr").style.display="none";
       document.getElementById("mon6pr").style.display="none";
                              
                                document.getElementById("mon9hr").style.display="none";
             document.getElementById("mon10hr").style.display="none";
             document.getElementById("mon11hr").style.display="none";
             document.getElementById("mon12hr").style.display="none";
             document.getElementById("mon1hr").style.display="none";
             document.getElementById("mon2hr").style.display="none";
             document.getElementById("mon3hr").style.display="none";
             document.getElementById("mon4hr").style.display="none";
             document.getElementById("mon5hr").style.display="none";
             document.getElementById("mon6hr").style.display="none";
  document.getElementById("sun9it").style.display="none";
        document.getElementById("sun10it").style.display="none";
       document.getElementById("sun5it").style.display="none";
       document.getElementById("sun6it").style.display="none";
                                          document.getElementById("mon1rl").style.display="block";
             document.getElementById("mon2rl").style.display="block";
             document.getElementById("mon3rl").style.display="block";
             document.getElementById("mon4rl").style.display="block";
             document.getElementById("mon5rl").style.display="block";
             document.getElementById("mon6rl").style.display="block";
           document.getElementById("mon10ac").style.display="none";
             document.getElementById("mon11ac").style.display="none";
       document.getElementById("mon4ac").style.display="none";
             document.getElementById("mon5ac").style.display="none";
             document.getElementById("mon6ac").style.display="none";
   document.getElementById("sat11hr").style.display="none";
           document.getElementById("sat12hr").style.display="none";
   document.getElementById("sat1hr").style.display="none";
   document.getElementById("sat3hr").style.display="none";
   document.getElementById("sat4hr").style.display="none";
   document.getElementById("sat5hr").style.display="none";
   document.getElementById("sat6hr").style.display="none";
      
      document.getElementById("sat12pr").style.display="none";
   document.getElementById("sat1hr").style.display="none";
   document.getElementById("sat3pr").style.display="none";
   document.getElementById("sat4pr").style.display="none";
   document.getElementById("sat5pr").style.display="none";
   document.getElementById("sat6pr").style.display="none";
      
         document.getElementById("sat2rl").style.display="block";
   document.getElementById("sat3rl").style.display="block";
   document.getElementById("sat4rl").style.display="block";
   document.getElementById("sat5rl").style.display="block";
   document.getElementById("sat6rl").style.display="block";
      

                              
                                  document.getElementById("sun12ac").style.display="none";
                     document.getElementById("sun1ac").style.display="none";
                     document.getElementById("sun2ac").style.display="none";
                     document.getElementById("sun3ac").style.display="none";
                     document.getElementById("sun4ac").style.display="none";
                     document.getElementById("sun5ac").style.display="none";

               document.getElementById("sun2rl").style.display="block";
                     document.getElementById("sun3rl").style.display="block";
                     document.getElementById("sun4rl").style.display="block";
                     document.getElementById("sun5rl").style.display="block";
                     document.getElementById("sun6rl").style.display="block";

      
             document.getElementById("sun9hr").style.display="none";
                     document.getElementById("sun10hr").style.display="none";
                     document.getElementById("sun11hr").style.display="none";
                     document.getElementById("sun1hr").style.display="none";
                     document.getElementById("sun4hr").style.display="none";
                     document.getElementById("sun5hr").style.display="none";
            document.getElementById("sun6hr").style.display="none";

       document.getElementById("sun12pr").style.display="none";
                     document.getElementById("sun1pr").style.display="none";
                     document.getElementById("sun2pr").style.display="none";
                     document.getElementById("sun3pr").style.display="none";
                     document.getElementById("sun4pr").style.display="none";
                     document.getElementById("sun5pr").style.display="none";
                           document.getElementById("sun6pr").style.display="none";
                              
                              
                                                     document.getElementById("wed9pr").style.display="none";
      document.getElementById("wed11pr").style.display="none";
      document.getElementById("wed12pr").style.display="none";
      document.getElementById("wed1pr").style.display="none";
      document.getElementById("wed4pr").style.display="none";
      document.getElementById("wed5pr").style.display="none";
      document.getElementById("wed6pr").style.display="none";

      
        document.getElementById("wed11hr").style.display="none";
              document.getElementById("wed12hr").style.display="none";
        document.getElementById("wed1hr").style.display="none";
        document.getElementById("wed2hr").style.display="none";
        document.getElementById("wed3hr").style.display="none";
        document.getElementById("wed4hr").style.display="none";
        document.getElementById("wed5hr").style.display="none";
        document.getElementById("wed6hr").style.display="none";
      
                    document.getElementById("wed12ac").style.display="none";
                      document.getElementById("wed1ac").style.display="none";
                            document.getElementById("wed2ac").style.display="none";
                      document.getElementById("wed3ac").style.display="none";
                      document.getElementById("wed4ac").style.display="none";
                      document.getElementById("wed5ac").style.display="none";


                    document.getElementById("wed12rl").style.display="block";
                          document.getElementById("wed2rl").style.display="block";
                    document.getElementById("wed3rl").style.display="block";
                    document.getElementById("wed4rl").style.display="block";
                    document.getElementById("wed5rl").style.display="block";
                    document.getElementById("wed6rl").style.display="block";
      
                          document.getElementById("wed1it").style.display="none";
                                document.getElementById("wed3it").style.display="none";
                          document.getElementById("wed4it").style.display="none";
                              
document.getElementById("Tue10hr").style.display="none";
      document.getElementById("Tue11hr").style.display="none";
document.getElementById("Tue12hr").style.display="none";
document.getElementById("Tue1hr").style.display="none";
document.getElementById("Tue2hr").style.display="none";
document.getElementById("Tue3hr").style.display="none";
document.getElementById("Tue4hr").style.display="none";
document.getElementById("Tue5hr").style.display="none";
document.getElementById("Tue6hr").style.display="none";

      document.getElementById("Tue12pr").style.display="none";
      document.getElementById("Tue1pr").style.display="none";
      document.getElementById("Tue2pr").style.display="none";
      document.getElementById("Tue3pr").style.display="none";
      document.getElementById("Tue4pr").style.display="none";
      document.getElementById("Tue5pr").style.display="none";
      document.getElementById("Tue6pr").style.display="none";
      
      document.getElementById("Tue2it").style.display="none";
            document.getElementById("Tue3it").style.display="none";
      document.getElementById("Tue4it").style.display="none";
      document.getElementById("Tue5it").style.display="none";
      document.getElementById("Tue6it").style.display="none";
      
            document.getElementById("Tue2rl").style.display="block";
            document.getElementById("Tue3rl").style.display="block";
      document.getElementById("Tue4rl").style.display="block";
      document.getElementById("Tue5rl").style.display="block";
      document.getElementById("Tue6rl").style.display="block";

      document.getElementById("Tue1ac").style.display="none";
      document.getElementById("Tue2ac").style.display="none";
      document.getElementById("Tue3ac").style.display="none";
      document.getElementById("Tue4ac").style.display="none";
      document.getElementById("Tue5ac").style.display="none";
      document.getElementById("Tue6ac").style.display="none";

                       document.getElementById("thu9it").style.display="none";
            document.getElementById("thu10it").style.display="none";
      document.getElementById("thu12it").style.display="none";
      document.getElementById("thu1it").style.display="none";
      document.getElementById("thu2it").style.display="none";
      document.getElementById("thu3it").style.display="none";
      document.getElementById("thu4it").style.display="none";
      document.getElementById("thu5it").style.display="none";
      document.getElementById("thu6it").style.display="none";


            document.getElementById("thu10hr").style.display="none";
                  document.getElementById("thu11hr").style.display="none";
            document.getElementById("thu12hr").style.display="none";
            document.getElementById("thu1hr").style.display="none";
            document.getElementById("thu2hr").style.display="none";
            document.getElementById("thu3hr").style.display="none";
            document.getElementById("thu4hr").style.display="none";
            document.getElementById("thu5hr").style.display="none";
            document.getElementById("thu6hr").style.display="none";

   document.getElementById("thu10pr").style.display="none";
                  document.getElementById("thu11pr").style.display="none";
            document.getElementById("thu12pr").style.display="none";
            document.getElementById("thu1pr").style.display="none";
            document.getElementById("thu2pr").style.display="none";
            document.getElementById("thu3pr").style.display="none";
            document.getElementById("thu4pr").style.display="none";
            document.getElementById("thu5pr").style.display="none";
            document.getElementById("thu6pr").style.display="none";

document.getElementById("thu11rl").style.display="block";
            document.getElementById("thu12rl").style.display="block";
            document.getElementById("thu1rl").style.display="block";
            document.getElementById("thu2rl").style.display="block";
 document.getElementById("thu5rl").style.display="block";
            document.getElementById("thu6rl").style.display="block";
      
      
      
         document.getElementById("thu10ac").style.display="none";
            document.getElementById("thu12ac").style.display="none";
                                                        document.getElementById("thu1ac").style.display="none";

      document.getElementById("thu3ac").style.display="none";
            document.getElementById("thu4ac").style.display="none";
            document.getElementById("thu5ac").style.display="none";
            document.getElementById("thu6ac").style.display="none";   
                              
    }
        
         
        

}
      
          
          $("form").submit(function(e) {
              
              var error = "";
              
              
               if ($("#yourname").val() == "") {
                  
                  error += "You must Enter Your Name.<br>"
                  
              }
              
              if ($("#email").val() == "") {
                  
                  error += "You must Enter Your Email address.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "You must Enter your first pref.<br>"
                  
              }
              
              
              
               if ($("#mobile").val() == "") {
                  
                  error += "You must Enter your mobile.<br>"
                  
              }
              
              
               if ($("#subject2").val() == "") {
                  
                  error += "You must Enter your second pref.<br>"
                  
              }
              
              
              
              
        
               if ($("#eyear").val() == "") {
                  
                  error += "You must Enter your department and year.<br>"
                  
              }
              
              
              
              
              
              
             
              
              
              if (   ($("#dtime").val() == "")   ||  ($("#dtime").val() == "---------")   ) {
                  
                  error += "You must Choose a valid Interview Time.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })
          
    </script>
          
  </body>
</html>
    
    

    

    

    

    

    

    
