

<?php
//echo"$id";

include 'conn.php';
$query="select * from customer_request where requested_id='$id'";
$stmt = $conn->query($query);
while($row = $stmt->fetch())
{
    $id = $row['id'];
    $requested_id = $row['requested_id'];
    $Customer_id = $row['Customer_id'];
    $brand = $row['brand'];
    $model = $row['model'];
    $issue = $row['issue'];
    $request_date = $row['request_date'];
    $status = $row['status'];
    $sla = $row['sla'];
    $time_taken = $row['time_taken'];
    $processed_by = $row['processed_by'];
    $process_remaks = $row['process_remaks'];
    
    $serialno = $row['serialno'];
    $itemno = $row['itemno'];
    $actual_issue = $row['actual_issue'];
    $issue = $row['issue'];
    
    $sla = $row['sla'];
    $time_taken = $row['time_taken'];
    $service_eng_assign_date = $row['service_eng_assign_date'];
    $cost_inv = $row['cost_inv'];
    $service_eng_id = $row['service_eng_id'];
    $se_closed_reamrks = $row['se_closed_reamrks'];
    
}

if($requested_id == "")
{
    $query="select * from leveloeng_customer_request where requested_id='$id'";
    $stmt = $conn->query($query);
    while($row = $stmt->fetch())
    {
        $id = $row['id'];
        $requested_id = $row['requested_id'];
        $Customer_id = $row['Customer_id'];
        $brand = $row['brand'];
        $model = $row['model'];
        $issue = $row['issue'];
        $request_date = $row['request_date'];
        $status = $row['status'];
        $sla = $row['sla'];
        $time_taken = $row['time_taken'];
        $processed_by = $row['processed_by'];
        $process_remaks = $row['process_remaks'];
        
        $serialno = $row['serialno'];
        $itemno = $row['itemno'];
        $actual_issue = $row['actual_issue'];
        $issue = $row['issue'];
        
        $sla = $row['sla'];
        $time_taken = $row['time_taken'];
        $service_eng_assign_date = $row['service_eng_assign_date'];
        $cost_inv = $row['cost_inv'];
        $service_eng_id = $row['service_eng_id'];
        $se_closed_reamrks = $row['se_closed_reamrks'];
        
    }
}

$query1="select * from users where email='$Customer_id'";
$stmt1 = $conn->query($query1);
while($row1 = $stmt1->fetch())
{
    $cust_name = $row1['name'];
    $email = $row1['email'];
    $mnumber = $row1['mnumber'];
    $pin = $row1['pin'];
    $address = $row1['address'];
    
}
?>
                @include('header')

          <section id="main-content">
      <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
         @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Shipper view of Deliver Request</h4> 

<form class="form-horizontal" method="POST" action="{{ URL::asset('shipper_delivery_close') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="ticket_id" value="<?php echo"$requested_id"; ?>">
                        
                        
<table class="table">

<tr>
<td>Customer Name</td><td><?php echo"$cust_name"; ?></td>
<td>Mobile Number</td><td><?php echo"$mnumber"; ?></td>
</tr>

<tr>
<td>Email-ID</td><td><?php echo"$email"; ?></td>
<td>Pincode</td><td><?php echo"$pin"; ?></td>
</tr>

<tr>
<td>Address</td><td colspan="3"><?php echo"$address"; ?></td>
</tr>


<tr>
<td>Brand</td><td><?php echo"$brand"; ?></td>
<td>Model No</td><td><?php echo"$model"; ?></td>
</tr>

<tr>
<td>Serial No</td><td><?php echo"$serialno"; ?></td>
<td>Item Number</td><td><?php echo"$itemno"; ?></td>
</tr>


<tr>
<td>Issue Category</td><td><?php echo"$actual_issue"; ?></td>
<td>Issue in Detail</td><td><?php echo"$issue"; ?></td>
</tr>


<tr>
<td>Cost</td><td><?php echo"$cost_inv"; ?></td>
<td>Payment Status</td><td><?php echo""; ?></td>
</tr>

<tr>
<td>Browse & Upload</td><td colspan="3">
<input type="file" name="hardware_photos[]" multiple class='form-control'>
</td>



</table>
<br>
<input type="submit" value="Deliver" class="btn btn-primary">
</form>
</body>
</html>