<html> 
<head> 
<link rel="stylesheet" href="../static/broom.css">
</head>
<body>
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
    $uname = $_POST["uname"];
    $uemail = $_POST["uemail"]; 
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $mobno = $_POST["mobno"]; 
    $stay = $_POST["stay"]; 

    $sql = "Select * from gbook where uname='$uname'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result); 
    echo $num;
    if($num == 0) {
    $sql = "INSERT INTO `gbook` ( `uname`,`uemail`,`checkin`,`checkout`,`mobno`,`stay`) VALUES ('$uname','$uemail', '$checkin','$checkout','$mobno','$stay')";
    $result = mysqli_query($conn, $sql);
               if ($result) {
                   $showAlert = true; 
               }
               else{}
           }    }
?>
<div class="container"> <br> 
<header> <center> <h1>BOOK ROOMS IN A HOMESTAY</h1> </center> </header>
    <form name="sentMessage" id="rbookForm"  method="POST" >
        <div class="form"> <div class="right"> <div class="contact-form">
                  <input type="text" required placeholder="Full Name" name="uname" id="uname" minlength="5" maxlength="50" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" >     
         </div>
        <div class="contact-form">
                  <input type="email" required placeholder="E-mail" name="uemail" id="uemail" 
oninvalid="this.setCusomValidity('Please enter your email')" oninput="this.setCusomValidity('')"></div>
         <div class="contact-form">
         <input type="date" required placeholder="Check-in Date" id="checkin" name="checkin"></div>
                <div class="contact-form">
                    <input type="date" required placeholder="Check-out Date" id="checkout" name="checkout"></div>
                <div class="contact-form">
                    <input type="text" name="mobno" id="mobno" required placeholder="Mobile No."  onkeypress="if(this.value.length==10) return false" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> </div> <br>
<div class="dropdown"> &nbsp; &nbsp;<label for="stay" style="font-size: 22px;"> Select a homestay : &nbsp; </label> <br> <br>
<select name="stay" id="stay" style="font-size: 20px;" >
<option value="Musafir Homestay" style="font-size: 20px;">&nbsp; Musafir Homestay & Cafe &nbsp;</option>
<option value="Sangam Guesthouse" style="font-size: 20px;">&nbsp; Sangam Guesthouse &nbsp;</option>
<option value="Yog Homestay" style="font-size: 20px;">&nbsp; Yog Homestay &nbsp;</option>
</select> </div> <br> <br>
</select> </div> <br> <br>
<div class="contact-form"> <input type="submit" name="submit" id="demo"> </div>
</div> </form> </div> 
    
<script>
    	var todayDate=new Date();
    	var month=todayDate.getMonth()+1;
    	var year=todayDate.getUTCFullYear()-0;
    	var tdate=todayDate.getDate();
    	if(month<10){
        		month='0'+month;
    	}
    	if(tdate<10){
        		tdate='0'+tdate;
    	}
    	var maxDate=year+"-"+month+"-"+tdate;
    	document.getElementById("checkin").setAttribute("min",maxDate);
    	console.log(maxDate);
	    console.log(demo.value);
        var checkIn = document.getElementById('checkin');
        checkIn.addEventListener('change', function() { 
		var date = checkIn.value;
		console.log(date)
		date = new Date(date);
		date.setDate(date.getDate() + 1);
    		var month=date.getMonth()+1;
    		var year=date.getUTCFullYear()-0;
		var tdate=date.getDate();
    		if(month<10){
        			month='0'+month;
    		}
    		if(tdate<10){
        			tdate='0'+tdate;
    		}
    		var maxDate=year+"-"+month+"-"+tdate;
    		document.getElementById("checkout").setAttribute("min",maxDate);
		document.getElementById("checkout").value = maxDate;		
	});
</script>
</body>
</html>
