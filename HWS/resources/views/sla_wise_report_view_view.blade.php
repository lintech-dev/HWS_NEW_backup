<?php
//echo"$from_date,$to_date,$issue_category,$status";
?>
   @include('header'); 
 
<section id="main-content">
  <section class="wrapper">
        <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
        <!-- BASIC FORM ELELEMNTS -->
    @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif
  <div class="row mt">
    <div class="col-lg-12">            
      <h4 class="mb">SLA Wise Report</h4>  
                       
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

  
 <table id="example" class="display" style="width:100%">
  <thead>
               
    <tr>
      <th>Request ID</th>
      <th>Customer ID</th>
      <th>Type</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Issue</th>
      <th>Serial No</th>
      <th>Item No</th>
      <th>Requested Date</th>
      <th>Status</th>
      <th>SLA</th>
      <th>Time Taken</th>
      <th>Actual Issue</th>
      <th>Cost Involved</th>
      <th>Service Eng Remarks</th>
      <th>Customer Status</th>
      <th>Customer Approve Reject Date</th>
      <th>Service Eng Closed Remarks</th>
    </tr>
  </thead>
    <tbody>
      <?php

$exp  = explode("-", $from_date);
$year1 = $exp[0];
$month1 = $exp[1];
$date1 = $exp[2];

$fdate1 = "$year1-$month1-$date1";

$exp2  = explode("-", $to_date);
$year2 = $exp2[0];
$month2 = $exp2[1]; 
$date2 = $exp2[2]; 

$fdate1 = "$year1-$month1-$date1";
$tdate1 = "$year2-$month2-$date2";

 //echo "$fdate1,$tdate1";

    include 'conn.php'; 
    $query="select * from customer_request where request_date between '$fdate1' AND '$tdate1'";
    if($issue_category != "")
    {
      $query.="AND actual_issue='$issue_category'";
    }
    if($status != "")
    {
      $query.="AND status='$status'";      
    }
      $stmt = $conn->query($query);
      while($row = $stmt->fetch())
      {
          $requested_id = $row['requested_id'];
          $Customer_id = $row['Customer_id'];
          $type = $row['type'];
          $brand = $row['brand'];
          $model = $row['model'];
          $issue = $row['issue'];
          $serialno = $row['serialno'];
          $itemno = $row['itemno'];
          $request_date = $row['request_date'];
          $status1 = $row['status'];
          $sla = $row['sla'];
          $time_taken = $row['time_taken'];
          $actual_issue = $row['actual_issue'];
          $cost_inv = $row['cost_inv'];
          $service_eng_remarks = $row['service_eng_remarks'];
          $customer_status = $row['customer_status'];
          $cust_app_reg_date = $row['cust_app_reg_date'];
          $se_closed_reamrks = $row['se_closed_reamrks'];
        
    
      echo"<tr><td>$requested_id</td><td>$Customer_id</td><td>$type</td><td>$brand</td><td>$model</td><td>$issue</td><td>$serialno</td><td>$itemno</td><td>$request_date</td><td>$status1</td><td>$sla</td><td>$time_taken</td>";
      echo"<td>$actual_issue</td><td>$cost_inv</td><td>$service_eng_remarks</td><td>$customer_status</td><td>$cust_app_reg_date</td><td>$se_closed_reamrks</td></tr>";
	  }
      ?>
    </tbody>
</table>
                
  </div>
</div>
                
<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function() {
    j('#example').DataTable( {
        dom: 'Bfrtip',
	"ordering": false,
	"pageLength": 50,
        buttons: [
          'copy', 'csv', 'excel', 'print'
        ]
    } );
} );
</script>

  </div>
  </div>
          <!-- col-lg-12-->
</div>
        
      
        <!-- /row -->
  </section>
      <!-- /wrapper -->
</section>
   
   
@include('footer');