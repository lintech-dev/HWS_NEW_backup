

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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Assign a Shipper for Pick-up</h4> 

<form class="form-horizontal" method="POST" action="{{ URL::asset('assign_ticket_shipper') }}" enctype="multipart/form-data">
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
<td>Issue in Detail</td>
<td colspan="3">
<textarea rows="4" cols="55" name="new_remarks" class='form-control'><?php echo"$issue"; ?></textarea></td>
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
</select> -->
</td>
<td>Experience</td><td>


<input type='text' id='myText' name='ship_exp' class='form-control'>

</td>
</tr>
<tr>
<td></td>
<td></td>
<td colspan="2"><a href="">View Shipper details</a></td>
</tr>


</table>
<br>
<input type="submit" value="Assign" class="btn btn-primary">
</form>
</div></div></div></section></section>