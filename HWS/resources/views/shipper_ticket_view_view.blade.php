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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Detail View of Pick-Up Ticket</h4> 

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
    $serialno = $row['serialno'];
    $itemno = $row['itemno'];
    $time_taken = $row['time_taken'];
    $processed_by = $row['processed_by'];
    $process_remaks = $row['process_remaks'];
    $time_left = $row['time_left'];
    
    
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

<form class="form-horizontal" method="POST" action="{{ URL::asset('ticket_shipper_submit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="ticket_id" value="<?php echo"$requested_id"; ?>">
<table class="table">
<tr>
<td>Customer Name</td><td><?php echo"$cust_name"; ?></td>
<td>Mobile Number</td><td><?php echo"$mnumber"; ?></td>
</tr>
<tr>
<td>Email-ID</td><td><?php echo"$email"; ?></td>
<td>Pin Code</td><td><?php echo"$pin"; ?></td>
</tr>
<tr>
<td>Brand</td><td><?php echo"$brand"; ?></td>
<td>Model No</td><td><?php echo"$model"; ?></td>
</tr>

<tr>
<td>Serial Number</td><td><?php echo"$serialno"; ?></td>
<td>Item Number</td><td><?php echo"$itemno"; ?></td>
</tr>

<tr>
<td>SLA</td><td><?php echo"$sla"; ?></td>
<td>Time Left</td><td><?php echo"$time_left"; ?></td>
</tr>

<tr>
<td>Customer Address</td>
<td colspan="3">
<textarea rows="4" cols="55" name="new_remarks" class='form-control'><?php echo"$address"; ?></textarea></td>
</tr>

<tr>
<td>Browse & Upload Pictures</td><td>
<input type="file" name="hardware_photos[]" multiple class='form-control'>
</td>
</tr>


</table>
<br>
<input type="submit" value="Pickup" class="btn btn-primary">
</form>
</body>
</html>