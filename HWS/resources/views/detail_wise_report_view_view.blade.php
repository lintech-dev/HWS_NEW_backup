<?php
//echo"$from_date,$to_date,$c_name,$issue_category,$shipper_pu,$service_eng,$cost_inv,$status,$shipper_del";
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
      <h4 class="mb">Detailed Report</h4>  
                       
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
      
      <th>Shipper ID</th>
      <th>Shipper Exp</th>
      <th>Shipper Assigned Date</th>
      <th>Shipper Status</th>
      <th>Shipper PickedUp Date</th>
      <th>Shipper Closed Date</th>
      <th>Shipper Remarks</th>
      <th>Service Eng ID</th>
      <th>Service Eng Assign Date</th>
      <th>Service Eng Status</th>
      
      
      <th>Actual Issue</th>
      <th>Cost Involved</th>
      <th>Service Eng Remarks</th>
      <th>Customer Status</th>
      <th>Customer Approve Reject Date</th>
      <th>Customer Remarks</th>
      <th>Service Eng Closed Date</th>
      <th>Service Eng Closed Remarks</th>
      <th>Dealer Shipper ID</th>
      <th>Dealer Shipped Date</th>
      <th>Dealer Shipper Status</th>
      <th>Dealer Shipper Closed Date</th>
      <th>Dealer ID</th>
      <th>Dealer Name</th>
      <th>Dealer Location</th>
      <th>Dealer Address</th>
      
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
    //echo"$from_date,$to_date,$c_name,$issue_category,$shipper_pu,$service_eng,$cost_inv,$status,$shipper_del";
    if($c_name != "")
    {
      $query.="AND Customer_id='$c_name'";
    }
    if($issue_category != "")
    {
      $query.="AND actual_issue='$issue_category'";      
    }
    if($shipper_pu != "")
    {
        $query.="AND shipper_id='$shipper_pu'";
    }
    if($service_eng != "")
    {
        $query.="AND service_eng_id='$service_eng'";
    }
    if($cost_inv != "")
    {
        $query.="AND cost_inv='$cost_inv'";
    }
    if($status != "")
    {
        $query.="AND status='$status'";
    }
    if($shipper_del != "")
    {
        $query.="AND shipper_id='$shipper_del'";
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
          
          $shipper_id = $row['shipper_id'];
          $shipper_exp = $row['shipper_exp'];
          $shipper_assigned_date = $row['shipper_assigned_date'];
          $shipper_status = $row['shipper_status'];
          $shipper_pickup_date = $row['shipper_pickup_date'];
          $time_left = $row['time_left'];
          $shipper_closed_date = $row['shipper_closed_date'];
          $shipper_remarks = $row['shipper_remarks'];
          $service_eng_id = $row['service_eng_id'];
          $service_eng_assign_date = $row['service_eng_assign_date'];
          $service_eng_status = $row['service_eng_status'];
          
          
          $actual_issue = $row['actual_issue'];
          $cost_inv = $row['cost_inv'];
          $service_eng_remarks = $row['service_eng_remarks'];
          $customer_status = $row['customer_status'];
          $cust_app_reg_date = $row['cust_app_reg_date'];
          $customer_remarks = $row['customer_remarks'];
          $se_closed_date = $row['se_closed_date'];
          $se_closed_reamrks = $row['se_closed_reamrks'];
          
          $del_shipper_id = $row['del_shipper_id'];
          $del_shipper_date = $row['del_shipper_date'];
          $del_shipper_status = $row['del_shipper_status'];
          $del_shipper_closed_date = $row['del_shipper_closed_date'];
          $dealer_id = $row['dealer_id'];
          $dealer_name = $row['dealer_name'];
          $dealer_location = $row['dealer_location'];
          $dealer_address = $row['dealer_address'];
          
        
    
      echo"<tr><td>$requested_id</td><td>$Customer_id</td><td>$type</td><td>$brand</td><td>$model</td><td>$issue</td><td>$serialno</td><td>$itemno</td><td>$request_date</td><td>$status1</td><td>$sla</td><td>$time_taken</td>";
      echo"<td>$shipper_id</td><td>$shipper_exp</td><td>$shipper_assigned_date</td><td>$shipper_status</td><td>$shipper_pickup_date</td><td>$shipper_closed_date</td>";
      echo"<td>$shipper_remarks</td><td>$service_eng_id</td><td>$service_eng_assign_date</td><td>$service_eng_status</td>";
      echo"<td>$actual_issue</td><td>$cost_inv</td><td>$service_eng_remarks</td><td>$customer_status</td><td>$cust_app_reg_date</td><td>$customer_remarks</td><td>$se_closed_date</td><td>$se_closed_reamrks</td>";
      echo"<td>$del_shipper_id</td><td>$del_shipper_date</td><td>$del_shipper_status</td><td>$del_shipper_closed_date</td><td>$dealer_id</td><td>$dealer_name</td>";
      echo"<td>$dealer_location</td><td>$dealer_address</td></tr>";
      
      
	  }
	  
	  $query2="select * from leveloeng_customer_request where request_date between '$fdate1' AND '$tdate1'";
	  //echo"$from_date,$to_date,$c_name,$issue_category,$shipper_pu,$service_eng,$cost_inv,$status,$shipper_del";
	  if($c_name != "")
	  {
	      $query2.="AND Customer_id='$c_name'";
	  }
	  if($issue_category != "")
	  {
	      $query2.="AND actual_issue='$issue_category'";
	  }
	  if($shipper_pu != "")
	  {
	      $query2.="AND shipper_id='$shipper_pu'";
	  }
	  if($service_eng != "")
	  {
	      $query2.="AND service_eng_id='$service_eng'";
	  }
	  if($cost_inv != "")
	  {
	      $query2.="AND cost_inv='$cost_inv'";
	  }
	  if($status != "")
	  {
	      $query2.="AND status='$status'";
	  }
	  if($shipper_del != "")
	  {
	      $query2.="AND shipper_id='$shipper_del'";
	  }
	  $stmt2 = $conn->query($query2);
	  while($row2 = $stmt2->fetch())
	  {
	      $requested_id = $row2['requested_id'];
	      $Customer_id = $row2['Customer_id'];
	      $type = $row2['type'];
	      $brand = $row2['brand'];
	      $model = $row2['model'];
	      $issue = $row2['issue'];
	      $serialno = $row2['serialno'];
	      $itemno = $row2['itemno'];
	      $request_date = $row2['request_date'];
	      $status1 = $row2['status'];
	      $sla = $row2['sla'];
	      $time_taken = $row2['time_taken'];
	      
	      $shipper_id = $row2['shipper_id'];
	      $shipper_exp = $row2['shipper_exp'];
	      $shipper_assigned_date = $row2['shipper_assigned_date'];
	      $shipper_status = $row2['shipper_status'];
	      $shipper_pickup_date = $row2['shipper_pickup_date'];
	      $time_left = $row2['time_left'];
	      $shipper_closed_date = $row2['shipper_closed_date'];
	      $shipper_remarks = $row2['shipper_remarks'];
	      $service_eng_id = $row2['service_eng_id'];
	      $service_eng_assign_date = $row2['service_eng_assign_date'];
	      $service_eng_status = $row2['service_eng_status'];
	      
	      
	      $actual_issue = $row2['actual_issue'];
	      $cost_inv = $row2['cost_inv'];
	      $service_eng_remarks = $row2['service_eng_remarks'];
	      $customer_status = $row2['customer_status'];
	      $cust_app_reg_date = $row2['cust_app_reg_date'];
	      $customer_remarks = $row2['customer_remarks'];
	      $se_closed_date = $row2['se_closed_date'];
	      $se_closed_reamrks = $row2['se_closed_reamrks'];
	      
	      $del_shipper_id = $row2['del_shipper_id'];
	      $del_shipper_date = $row2['del_shipper_date'];
	      $del_shipper_status = $row2['del_shipper_status'];
	      $del_shipper_closed_date = $row2['del_shipper_closed_date'];
	      $dealer_id = $row2['dealer_id'];
	      $dealer_name = $row2['dealer_name'];
	      $dealer_location = $row2['dealer_location'];
	      $dealer_address = $row2['dealer_address'];
	      
	      
	      
	      echo"<tr><td>$requested_id</td><td>$Customer_id</td><td>$type</td><td>$brand</td><td>$model</td><td>$issue</td><td>$serialno</td><td>$itemno</td><td>$request_date</td><td>$status1</td><td>$sla</td><td>$time_taken</td>";
	      echo"<td>$shipper_id</td><td>$shipper_exp</td><td>$shipper_assigned_date</td><td>$shipper_status</td><td>$shipper_pickup_date</td><td>$shipper_closed_date</td>";
	      echo"<td>$shipper_remarks</td><td>$service_eng_id</td><td>$service_eng_assign_date</td><td>$service_eng_status</td>";
	      echo"<td>$actual_issue</td><td>$cost_inv</td><td>$service_eng_remarks</td><td>$customer_status</td><td>$cust_app_reg_date</td><td>$customer_remarks</td><td>$se_closed_date</td><td>$se_closed_reamrks</td>";
	      echo"<td>$del_shipper_id</td><td>$del_shipper_date</td><td>$del_shipper_status</td><td>$del_shipper_closed_date</td><td>$dealer_id</td><td>$dealer_name</td>";
	      echo"<td>$dealer_location</td><td>$dealer_address</td></tr>";
	      
	      
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