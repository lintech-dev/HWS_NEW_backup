
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
            
      <h4 class="mb">Customer Wise Report</h4>  
            
            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
      <th>Customer Name</th>
      <th>Mobile</th>
      <th>Request Date</th>
      <th>Brand</th>
      <th>Model No</th>
      <th>Issue Category</th>
      <th>Status</th>
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

// echo"$fdate1,$tdate1";

    include 'conn.php'; 
    $query = "SELECT users.name,users.email,users.mnumber,customer_request.request_date,customer_request.brand,customer_request.model,customer_request.issue,customer_request.status FROM users INNER JOIN customer_request ON(users.email = customer_request.Customer_id) AND request_date BETWEEN '$fdate1' AND '$tdate1'";   
    if($name != "")
    {    
      $query.="AND email='$name'";
    }
    if($mnumber != "")
    { 
      $query.="AND mnumber='$mnumber'";
    }
    if($brand != "")
    {
      $query.="AND brand='$brand'";
    }
    if($model != "")
    {
      $query.="AND model='$model'";      
    }
    if($issue != "")
    {
      $query.="AND issue='$issue'";     
    }
    if($status != "")
    {
      $query.="AND status='$status'";      
    }
    $stmt = $conn->query($query);
    while($row = $stmt->fetch())
    {
      $name = $row['name'];
      $mnumber = $row['mnumber'];
      $request_date = $row['request_date'];
      $brand = $row['brand'];
      $model = $row['model'];
      $issue = $row['issue'];
      $status = $row['status'];
     
      echo"<tr><td>$name</td><td>$mnumber</td><td>$request_date</td><td>$brand</td><td>$model</td><td>$issue</td><td>$status</td></tr>";
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