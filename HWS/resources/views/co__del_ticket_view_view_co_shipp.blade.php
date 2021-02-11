<?php
//echo"$id";

$exp = explode("|", $id);

$del_id = $exp[0];
$del_loc = $exp[1];

//echo"$del_id,$del_loc";

include 'conn.php';
$query="select * from leveloeng_customer_request where dealer_id='$del_id'";
$stmt = $conn->query($query);
while($row = $stmt->fetch())
{
    $id = $row['id'];
    $requested_id[] = $row['requested_id'];
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
    $dealer_name = $row['dealer_name'];
    $dealer_location = $row['dealer_location'];
    $dealer_address = $row['dealer_address'];
    $dealer_id = $row['dealer_id'];
    $dealer_location = $row['dealer_location'];
    
}

$sql = "SELECT count(*) FROM leveloeng_customer_request where status='New' group by dealer_id";
$result = $conn->prepare($sql);
$result->execute();
$number_of_rows = $result->fetchColumn();

$query1="select * from users where email='$Customer_id'";
$stmt1 = $conn->query($query1);
while($row1 = $stmt1->fetch())
{
    $cust_name = $row1['name'];
    $email = $row1['email'];
    $mnumber = $row1['mnumber'];
    $pin = $row1['pin'];
}
?>

              @include('header')
              
               <link rel="stylesheet" href="{{ URL::asset('js/jquery-ui.css') }}">
<script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
  <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
  <script>
  var jq = jQuery.noConflict();
  jq(function() {
	  jq( "#country" ).autocomplete({
      source: function( request, response ) {
    	  jq.ajax({
          url: "{{ URL::asset('request_sp.php') }}",
          dataType: "json",
          data: {
            q: request.term
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 1,  // Set minum input length
      select: function( event, ui ) {
            //do something on select event
            var vl = ui.item.id;      
            var data = vl.split("|");
            console.log(data);
            
            jq("#divison").html(data[0]);
            jq("#reg").html(data[1]);

            var myt1 = data[0];
            var myt2 = data[1];
           
           

            document.getElementById("myText").value = myt1;
            document.getElementById("myText2").value = myt2;
           
            

          
            
           <?php 

           //$_SESSION['get_emp'] = <script type='text/javascript'>myt14</script>';
           //$_SESSION['get_emp'] = "<script>document.getElementById.value = myt13;</script>";
           
           ?>
            
        //console.log(ui.item); // ui.item is  responded json from server
      },
      open: function() {
                 // D0 something on open event.
      },
      close: function() {
               // Do omething on close event
      }
    });
  });
  </script>
              

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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Assign a Shipper for Pick-up <?php //print_r($requested_id);?></h4> 
              

<form class="form-horizontal" method="POST" action="{{ URL::asset('assign_ticket_shipper_del') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <?php 
                        $query3="select * from leveloeng_customer_request where dealer_id='$del_id'";
                        $stmt3 = $conn->query($query3);
                        while($row3 = $stmt3->fetch())
                        {
                            //$id = $row['id'];
                            $requested_idd = $row3['requested_id'];
                            ?>
                            <input type="hidden" name="ticket_id[]" value="<?php echo"$requested_idd"; ?>">
                            <?php 
                        }
                        
                        ?>
                        
<table class="table">
<tr>
<td>Dealer ID</td><td><?php echo"$dealer_id"; ?></td>
<td>Dealer Name</td><td><?php echo"$dealer_name"; ?></td>
</tr>
<tr>
<td>Dealer Location</td><td><?php echo"$dealer_location"; ?></td>
<td>Dealer Address</td><td colspan="3"><?php echo"$dealer_address"; ?></td>
</tr>

<tr>
<td>Number of Request</td><td><?php echo"$number_of_rows"; ?></td>
<td colspan="3">
<?php 
$del_id_loc = "$dealer_id|$dealer_location";
?>
<a href="{{ URL::asset("del_tick_view_mul/$del_id_loc") }}">Click to View Requests</a>
</td>
</tr>

<tr>
<td>Shipper Name</td><td>
<input type='text' id="country" name='shipper_disp' class='form-control'>
<input type='hidden' id="myText2" name='shipper' class='form-control'>
<!-- <select name="shipper" class='form-control'>
<option value="">--Select--</option>
<?php 
$query2="select * from users where role='Shipper'";
$stmt2 = $conn->query($query2);
while($row2 = $stmt2->fetch())
{
    $s_id = $row2['id'];
    $s_name = $row2['name'];
    echo"<option value='$s_id'>$s_name</option>";
}
?>
</select>
 -->
</td>
<td>Experience</td><td>
<input type='text' id='myText' name='ship_exp' class='form-control' readonly>
<!-- <select name="ship_exp" class='form-control'>
<option value="">--Select--</option>
<?php 
$query3="select * from users where role='Shipper'";
$stmt3 = $conn->query($query3);
while($row3 = $stmt3->fetch())
{
    $s_exp = $row3['Experience'];
    echo"<option value='$s_exp'>$s_exp</option>";
}
?>
</select> -->
</td>
</tr>
<tr>
<td>Pickup Date & Time</td><td>
<input type="datetime-local" name="pup_date_time" class='form-control'>
</td>
<td></td>
<td></td>
</tr>
<tr>
<td colspan="4"><a href="">View Shipper details</a></td>
</tr>


</table>
<br>
<input type="submit" value="Assign" class="btn btn-primary">
</form>
</div></div></div></section></section>