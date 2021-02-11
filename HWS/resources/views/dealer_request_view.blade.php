<?php
echo"$id";

include 'conn.php';
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
    $dealer_name = $row['dealer_name'];
    $dealer_location = $row['dealer_location'];
    $dealer_address = $row['dealer_address'];    
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
              <h4 class="mb">View All Dealer Request Details</h4> 

                 <form class="form-horizontal" method="POST" action="{{ URL::asset('') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <input type="hidden" name="ticket_id" value="<?php echo"$requested_id"; ?>">

                        <table class="table">

                            <tr>
                               
                               <td>Request ID</td><td><?php echo"$requested_id"; ?></td>
                            </tr>

                            <tr>
                               <td>Customer ID</td><td><?php echo"$Customer_id"; ?></td>
                               <td>Brand</td><td><?php echo"$brand"; ?></td>
                            </tr>

                            <tr>
                               <td>Model No</td><td><?php echo"$model"; ?></td>
                               <td>Issue</td><td><?php echo"$issue"; ?></td>
                            </tr>

                            <tr>
                               <td>Request Date</td><td><?php echo"$request_date"; ?></td>
                               <td>Status</td><td><?php echo"$status"; ?></td>
                            </tr>

                            <tr>
                               <td>SLA</td><td><?php echo"$sla"; ?></td>
                               <td>Time Taken</td><td><?php echo"$time_taken"; ?></td>
                            </tr>

                            <tr>
                               <td>Processed By</td><td><?php echo"$processed_by"; ?></td>
                               <td>Process Remarks</td><td><?php echo"$process_remarks"; ?></td>
                            </tr>

                            <tr>
                               <td>Dealer Name</td><td><?php echo"$dealer_name"; ?></td>
                               <td>Dealer Location</td><td><?php echo"$dealer_location"; ?></td>
                            </tr>

                            <tr>
                               <td>Dealer Address</td><td><?php echo"$dealer_address"; ?></td>
                            </tr>

                        </table>

                        <button onClick="window.print()" style="text-align:center">Print</button>
                     <!--   <input type="submit" class="btn btn-primary" value="Print">    -->            

                </form>

            </div>
          </div>
        </div>
    </section>
</section>