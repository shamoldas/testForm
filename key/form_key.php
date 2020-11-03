<?php 
extract($_POST);
if(isset($signup))
{
//$dob=$yy."-".$mm."-".$dd;



//encrypt your license
$license_key=md5($license_key);


$query="insert into license values('','$username','$license_key',now())";
mysqli_query($link,$query);
}




?>













<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>License</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
 

  <div class="container">
   <br />
   <h2 align="center">Create License</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   </div>
 
   
            <div class="form-group">
                <label>LicenseKey</label>
                <input type="text" name="license_key" class="form-control" value="<?php 
		$license_key = rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999);
 		echo"$license_key";?>  "/>
                
            </div>

  	    <div class="form-group" style="background-color:powderblue;">
                <input type="submit" class="form-control" value="Save" onclick="myFunction()" style="background-color:powderblue;">
 <!--<input type="submit" class="form-control" value="Save" style="background-color:powderblue;">-->
                
            </div>

			<div class="form-group">
		       <label for="cars">License For:</label>

				<select name="month" id="month">
				  <option value="3month">3</option>
				  <option value="6month">6</option>
				  <option value="12month">12</option>
				</select>
				<label>Month</label>
			</div>
		<form>
			<div class="form-group">
			<br />
                	<input type="submit" name="signup" class="btn btn-primary" value="KeyGenerated">
                
            		</div>
		</form>


     </div>
			
   
   
   
   <br />
   <div id="result"></div>
  </div>


<script>
function myFunction() {
  alert("Congrats!");
}
</script>







 </body>
</html>









<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search_id_backend.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<?php
/*
$license_key="";
  #if(isset($_POST['signup'])) { 
     $license_key = rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999) . '-' . rand(1000,9999);
  echo"$license_key";
            
  */      

?>