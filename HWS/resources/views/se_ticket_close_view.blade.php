


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
    $service_eng_assign_date = $row['service_eng_assign_date'];
    
}


if($requested_id == "") //distributer functionality
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
        $service_eng_assign_date = $row['service_eng_assign_date'];
        
    }
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Service Request Closure</h4> 




 <form class="form-horizontal" method="POST" action="{{ URL::asset('service_eng_close_issue') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
   <input type="hidden" name="ticket_id" value="<?php echo"$requested_id";?>">                 
                    
<table class="table">
<tr>
<td>Request ID</td><td><?php echo"$requested_id"; ?></td>
<td>Assigned Date</td><td><?php echo"$service_eng_assign_date"; ?></td>
</tr>
<tr>
<td>Brand</td><td><?php echo"$brand"; ?></td>

<td>Model</td><td><?php echo"$model"; ?></td>
</tr>

<tr>
<td>Serial Number</td><td><?php echo"$serialno"; ?></td>

<td>Part Number</td><td><?php echo"$itemno"; ?></td>
</tr>
<tr>
<td>Issue Details</td><td colspan="3"><?php echo"$issue"; ?></td>
</tr>


<tr>
<td colspan="4">&nbsp;</td>
</tr>




<tr>
<td>Closure Remarks</td>
<td colspan="3"><textarea rows="4" cols="55" name="close_remarks" class='form-control'></textarea></td>
</tr>
</table>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div></div></div></section></section>