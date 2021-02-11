<?php 
include 'conn.php';
$admin_email = Auth::user()->email;
//echo"$admin_email";
$query1="Select * from users where email='$admin_email'";
$stmt1= $conn->query($query1);
while($row1 = $stmt1->fetch())
{
    $role=$row1['role'];
}

//echo"$email,$role";

//header("location: ./index.php");
if($role == "User")
{
    ?>
    <script>window.location = "{{ URL::asset('UDashboard') }}";</script>
   <?php  
}
else if($role == "Coordinator")
{
?>

 <script>window.location = "{{ URL::asset('Coordinator_Dashboard') }}";</script>
   <?php  
}
else if($role == "Service Engineer")
{
?>
<script>window.location = "{{ URL::asset('Service_Engineer_Dashboard') }}";</script>
   <?php  
}
else if($role == "Level 1 Engineer")
{
    ?>
<script>window.location = "{{ URL::asset('Dealer_Dashboard') }}";</script>
   <?php  
}
else if($role == "Shipper")
{
?>
<script>window.location = "{{ URL::asset('Shipper_Dashboard') }}";</script>
   <?php  
}
?>



