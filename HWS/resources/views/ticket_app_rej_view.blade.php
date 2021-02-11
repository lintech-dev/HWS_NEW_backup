

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
    $service_eng_remarks = $row['service_eng_remarks'];
    $service_eng_assign_date = $row['service_eng_assign_date'];
    $actual_issue = $row['actual_issue'];
    $cost_inv = $row['cost_inv'];
    
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
        $service_eng_remarks = $row['service_eng_remarks'];
        $service_eng_assign_date = $row['service_eng_assign_date'];
        $actual_issue = $row['actual_issue'];
        $cost_inv = $row['cost_inv'];
        
    }
}

$query1="select * from users where email='$Customer_id'";
$stmt1 = $conn->query($query1);
while($row1 = $stmt1->fetch())
{
    $cust_name = $row1['name'];
    $mnumber = $row1['mnumber'];
    
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Ticket Approve/Reject</h4> 



 <form class="form-horizontal" method="POST" action="{{ URL::asset('ticket_approve_reject_cust') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
   <input type="hidden" name="ticket_id" value="<?php echo"$requested_id";?>">                 
                    
<table class="table">

<tr>
<td>Customer Name</td><td><?php echo"$cust_name"; ?></td>
<td>Mobile Number</td><td><?php echo"$mnumber"; ?></td>
</tr>

<tr>
<td>Customer Remarks</td><td colspan="3"><?php echo"$issue"; ?></td>

</tr>
<tr>
<td>Brand</td><td><?php echo"$brand"; ?></td>

<td>Model</td><td><?php echo"$model"; ?></td>
</tr>

</tr>
<tr>
<td>Serial Number</td><td><?php echo"$serialno"; ?></td>

<td>Item Number</td><td><?php echo"$itemno"; ?></td>
</tr>

<tr>
<td>Actual Issue</td><td>
<?php echo"$actual_issue"; ?>
</td>
<td>Cost Involved</td><td>
<?php echo"$cost_inv"; ?>
</td>
</tr>


<tr>
<td>Issue/Problem Details</td><td colspan="3"><?php echo"$service_eng_remarks"; ?></td>
</tr>


<tr>
<td>Customer Remarks <br>while Approve/Reject</td>
<td colspan="3">
<textarea rows="4" cols="40" name="customer_remarks" class='form-control'></textarea>
</td>
</tr>
<tr>
<td colspan="4">&nbsp;</td>
</tr>




</table>
<br>
<input type="submit" name="Approve" value="Approve" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="Reject" value="Reject" class="btn btn-primary">
</form>
</body>
</html>