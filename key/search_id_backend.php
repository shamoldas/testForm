
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "demo");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM form 
  WHERE id LIKE '%".$search."%'
 ";







$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>UserName</th>
     <th>Organization</th>
     <th>Street</th>
     <th>City</th>
     <th>Mobile</th>
     <th>Email</th>
    
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["org"].'</td>
    <td>'.$row["street"].'</td>
    <td>'.$row["city"].'</td>
    <td>'.$row["phone"].'</td>
    <td>'.$row["email"].'</td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}










}
else
{
echo"Searrch your data in ID & Name";
 $query = "
  SELECT * FROM users ORDER BY id
 ";
}

/*
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>UserName</th>
     <th>Address</th>
     <th>Mobile</th>
     <th>Email</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["mobile"].'</td>
    <td>'.$row["email"].'</td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
*/
?>