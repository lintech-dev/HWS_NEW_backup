
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

//echo"reqiestid: $requested_id";
if($requested_id == "")  //delear functionality
{
    $query_del="select * from leveloeng_customer_request where requested_id='$id'";
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Service Request Assigning</h4> 

   <link rel="stylesheet" href="{{ URL::asset('js/jquery-ui.css') }}">
<script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
  <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
  <script>
  var jq = jQuery.noConflict();
  jq(function() {
	  jq( "#country" ).autocomplete({
      source: function( request, response ) {
    	  jq.ajax({
          url: "{{ URL::asset('request_se.php') }}",
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
            var myt3 = data[2];
            var myt4 = data[3];
           

            document.getElementById("myText").value = myt1;
            document.getElementById("myText1").value = myt2;
            document.getElementById("myText2").value = myt3;
            document.getElementById("myText3").value = myt4;
            

          
            
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
</head>

<form class="form-horizontal" method="POST" action="{{ URL::asset('service_eng_assigning') }}" enctype="multipart/form-data">
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
<td>Ticket ID</td><td colspan="3"><?php echo"$requested_id"; ?></td>
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
<td>Service Engineer</td><td>
<input type='text' id="country" name='service_eng' class='form-control'>
<input type='hidden' id='myText3' name='seng_id' class='form-control'>

</td>
<td>Experience</td><td>
<input type='text' id='myText' name='ship_exp' class='form-control'>

</td>
</tr>

<tr>
<td>Experties</td><td>
<textarea rows="3" cols="20" id='myText1' name="experties" class='form-control'></textarea>
</td>
<td>No of Issues Resolved</td><td>
<input type='text' id='myText2' name='no_issue_reso' class='form-control'>
</td>
</tr>

<tr>
<td></td>
<td></td>
<td colspan="2"><a href="">View complete details</a></td>
</tr>


</table>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div></div></div></section></section>