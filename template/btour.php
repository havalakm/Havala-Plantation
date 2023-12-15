<html> <body background="../static/tourbg.jpg">
<?php
   $server ="localhost";
   $username ="root";
   $password ="";
   $database ="bookings";

$conn = mysqli_connect($server,$username,$password,$database);
   
   $showAlert = false; 
   $showError = false; 
   $exists=false;
       
   if($_SERVER["REQUEST_METHOD"] == "POST") {  
       $name = $_POST["name"];
       $email = $_POST["email"]; 
       $date = $_POST["date"];
       $mobile = $_POST["mobile"];
       $facility = $_POST["facility"]; 
       $place = $_POST["place"];     

       $sql = "Select * from tbook where name='$name'";
       $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result); 
    //    echo $num;
       if($num == 0) {
           
               $sql = "INSERT INTO `tbook` ( `name`,`email`, 
                    `date`,`mobile`,`facility`,`place`) VALUES ('$name','$email', 
                   '$date','$mobile','$facility','$place')";
               $result = mysqli_query($conn, $sql);
             //echo $result;
               if ($result) {
                   $showAlert = true; 
               }
               else{ } 
        } }
?>
<div class="container"> <br> 
<header> <center> <h1>BOOK A TOUR OR TREK</h1> </center> </header>
      <div class="content">
      <form name="sentMessage" id="tbookingform"  method="POST" >
        <div class="form"> <div class="right"> <div class="contact-form">
                <label for="name" style="font-size: 20px;">
<input type="text" required name="name" id="name" placeholder="Full Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="50"> </label>   </div>
<div class="contact-form">
<label for="stay" style="font-size: 20px;">
<input type="email" required name="email" id="email" placeholder="Email"
oninvalid="this.setCusomValidity('Please enter your email')" oninput="this.setCusomValidity('')">
</label> </div>
<div class="contact-form">
<label for="stay" style="font-size: 20px;">
<input type="date" required id="date" name="date" placeholder="date of booking">
</label> </div>
<div class="contact-form">
<label for="stay" style="font-size: 20px;">
<input type="tel" name="mobile" id="mobile" required placeholder="Mobile No."  onkeypress="if(this.value.length==10) return false" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> </label>
</div> <br>
<div class="dropdown">
<label for="facility" style="font-size: 22px;">&nbsp; &nbsp; Select a facility: &nbsp; </label>&nbsp; &nbsp; <select class="dd" name="facility" id="facility" style="font-size: 20px;" >
<option value="Tour" style="font-size: 20px;">&nbsp;Tour &nbsp;</option>
<option value="Trek" style="font-size: 20px;">&nbsp; Trek &nbsp;</option>
</select>  </div>
<div class="contact-form"> <label for="place" style="font-size: 20px;">
<input type="text" required name="place" id="place" placeholder="Place you'll like to go">     
</div> <br> <br>
<div class="contact-form"> <input type="submit" name="submit" id="demo"> </div>
</div> </form>  </div> 
    <script>
      var todayDate=new Date();
      var month=todayDate.getMonth()+1;
      var year=todayDate.getUTCFullYear()-0;
      var tdate=todayDate.getDate();
      if(month<10){
          month='0'+month;}
      if(tdate<10){
          tdate='0'+tdate;
      }
      var maxDate=year+"-"+month+"-"+tdate;
      document.getElementById("date").setAttribute("min",maxDate);     
    </script> </body> </html>
