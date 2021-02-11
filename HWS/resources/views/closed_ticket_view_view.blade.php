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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Closed Request Detail View</h4> 

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
    
}
?>


<table class="table">
<tr>
<td>Request ID</td><td><?php echo"$requested_id"; ?></td>
</tr>
<tr>
<td>Customer ID</td><td><?php echo"$Customer_id"; ?></td>
</tr>
<tr>
<td>Brand & Model Number</td><td><?php echo"$brand $model"; ?></td>
</tr>
<tr>
<td>Requested Date</td><td><?php echo"$request_date"; ?></td>
</tr>
<tr>
<td>Issue Details</td><td><?php echo"$issue"; ?></td>
</tr>
<tr>
<td>Status</td><td><?php echo"$status"; ?></td>
</tr>
<tr>
<td>SLA</td><td><?php echo"$sla"; ?></td>
</tr>
<tr>
<td>Time Taken</td><td><?php echo"$time_taken"; ?></td>
</tr>
<tr>
<td>Processed By</td><td><?php echo"$processed_by"; ?></td>
</tr>
<tr>
<td>Remarks Entered</td><td><?php echo"$process_remaks"; ?></td>
</tr>

<tr>
<td>New Remarks</td><td><textarea rows="4" cols="55" name="new_remarks" class='form-control'></textarea></td>
</tr>

<tr>
<td>New Status</td><td>
<select name="new_status" class='form-control'>

<option value="<?php echo"Open"; ?>"><?php echo"Open"; ?></option>
</select>
</td>
</tr>


</table>
<br>
<input type="submit" value="Submit" class="btn btn-primary">

</div></div></div></section></section>