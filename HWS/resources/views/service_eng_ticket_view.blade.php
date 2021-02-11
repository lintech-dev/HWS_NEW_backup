

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
    if($requested_id == "")  // dealer functioanlity
    {
        
        $query_del="select * from  leveloeng_customer_request where requested_id='$id'";
        $stmt_del = $conn->query($query_del);
        while($row_del = $stmt_del->fetch())
        {
            $id = $row_del['id'];
            $requested_id = $row_del['requested_id'];
            $Customer_id = $row_del['Customer_id'];
            $brand = $row_del['brand'];
            $model = $row_del['model'];
            $issue = $row_del['issue'];
            $request_date = $row_del['request_date'];
            $status = $row_del['status'];
            $sla = $row_del['sla'];
            $time_taken = $row_del['time_taken'];
            $processed_by = $row_del['processed_by'];
            $process_remaks = $row_del['process_remaks'];
            $serialno = $row_del['serialno'];
            $itemno = $row_del['itemno'];
            $service_eng_assign_date = $row_del['service_eng_assign_date'];
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>New Request For Issue Diagnosis</h4> 



 <form class="form-horizontal" method="POST" action="{{ URL::asset('service_eng_update_issue') }}" enctype="multipart/form-data">
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
<td>Actual Issue</td><td>
<select name="actual_issue" class='form-control'>
<option value="">--select--</option>
<option value="Mother bord">Mother bord</option>
<option value="HDD">HDD</option>
<option value="RAM">RAM</option>
<option value="SMPS">SMPS</option>
</select>
</td>
<td>Cost Involved</td><td>
<input type="text" name="cost_inv" class='form-control'>
</td>
</tr>

<tr>
<td>Actual Issue Details</td>
<td colspan="3"><textarea rows="4" cols="55" name="ac_iss_det" class='form-control'></textarea></td>
</tr>
</table>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div></div></div></section></section>