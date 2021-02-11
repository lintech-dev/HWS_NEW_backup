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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Shipper Dashboard</h4> 



<?php 
$uid = Auth::user()->id;
?>

                    
                    <h3>Pick-up Requests <?php //echo"$uid"; ?></h3>
                    <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>SLA</th>
                            <th>Pick-up Timing</th>
                            <th>View Details</th>
                                                    </tr>
                                                    
                          <?php 
                          
                          include 'conn.php';
                          $query="select * from customer_request where shipper_status='pickup' AND shipper_id='$uid'";
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
                          $sla= $row['sla'];
                          
                          echo"<tr><td>$requested_id</td><td>$brand</td><td>$model</td><td>$sla</td><td></td>";
                          ?>
                          <td><a href="{{ URL::asset("shipper_ticket_view/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                                                    
                         ?>
                           </table>
                           
                           
                           
                            <h3>Dealse Pick-up/Delivery Requests <?php //echo"$uid"; ?></h3>
                    <table class="table">
                            <tr>

                            <th>Dealer ID</th>
                            <th>Dealer Name</th>
                            <th>Location</th>
                            <th>No of Request</th>
                            <th>Shipment Type</th>
                            <th>Pick-up Timing</th>
                            <th>View Details</th>
                                                    </tr>
                                                    
                          <?php 
                          
                          include 'conn.php';
                          $query5="select * from leveloeng_customer_request where shipper_status='pickup' AND shipper_id='$uid' group by dealer_id";
                          $stmt5 = $conn->query($query5);
                          while($row5 = $stmt5->fetch())
                          {
                          $id = $row5['id'];
                          $requested_id = $row5['requested_id'];
                          $Customer_id = $row5['Customer_id'];
                          $brand = $row5['brand'];
                          $model = $row5['model'];
                          $issue = $row5['issue'];
                          $request_date = $row5['request_date'];
                          $status = $row5['status'];
                          $sla= $row5['sla'];
                          $dealer_name = $row5['dealer_name'];
                          $dealer_id = $row5['dealer_id'];
                          $dealer_location = $row5['dealer_location'];
                          $shipper_pickup_date = $row5['shipper_pickup_date'];
                          
                          $sql = "SELECT count(*) FROM leveloeng_customer_request where shipper_status='pickup' AND shipper_id='$uid'";
                          $result = $conn->prepare($sql);
                          $result->execute();
                          $number_of_rows = $result->fetchColumn();
                          
                          echo"<tr><td>$dealer_id</td><td>$dealer_name</td><td>$dealer_location</td><td>$number_of_rows</td><td></td><td>$shipper_pickup_date</td>";
                          
                          $del_loc_id = "$dealer_location|$dealer_id";
                          ?>
                          <td><a href="{{ URL::asset("del_ship_pickup_view/$del_loc_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                                                    
                         ?>
                           </table>
		                    
		                    
		                    
		                    <h3>Delivery Requests</h3>
                    <table class="table">
                            <tr>

                          <th>Request ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>SLA</th>
                            <th>Delivery Timing</th>
                            <th>View Details</th>
                                                    </tr>
                                                    
                                                    
                                                    <?php 
                                                    $query2="select * from customer_request where del_shipper_id='$uid' AND del_shipper_status='deliver'";
                                                    $stmt2 = $conn->query($query2);
                                                    while($row2 = $stmt2->fetch())
                                                    {
                                                        $id = $row2['id'];
                                                        $requested_id = $row2['requested_id'];
                                                        $Customer_id = $row2['Customer_id'];
                                                        $brand = $row2['brand'];
                                                        $model = $row2['model'];
                                                        $issue = $row2['issue'];
                                                        $request_date = $row2['request_date'];
                                                        $status = $row2['status'];
                                                        $sla= $row2['sla'];
                                                        
                                                        echo"<tr><td>$requested_id</td><td>$brand </td><td>$model</td><td>$sla</td><td></td>";
                                                        
                                                        ?>
                          <td>
                          <!-- <a href="{{ URL::asset("closed_ticket_view/$requested_id") }}">Click to View</a> -->
                          <a href="{{ URL::asset("shipper_deliver_dev/$requested_id") }}">Click to View</a>
                          </td>
                          </tr>
                          <?php 
                         }
                         ?>
                         
                         <?php 
                                                    $query_del1="select * from leveloeng_customer_request where del_shipper_id='$uid' AND del_shipper_status='deliver'";
                                                    $stmt_del1 = $conn->query($query_del1);
                                                    while($row_del1 = $stmt_del1->fetch())
                                                    {
                                                        $id = $row_del1['id'];
                                                        $requested_id = $row_del1['requested_id'];
                                                        $Customer_id = $row_del1['Customer_id'];
                                                        $brand = $row_del1['brand'];
                                                        $model = $row_del1['model'];
                                                        $issue = $row_del1['issue'];
                                                        $request_date = $row_del1['request_date'];
                                                        $status = $row_del1['status'];
                                                        $sla= $row_del1['sla'];
                                                        $del_shipper_date= $row_del1['del_shipper_date'];
                                                        
                                                        echo"<tr><td>$requested_id</td><td>$brand </td><td>$model</td><td>$sla</td><td>$del_shipper_date</td>";
                                                        
                                                        ?>
                          <td>
                          <!-- <a href="{{ URL::asset("closed_ticket_view/$requested_id") }}">Click to View</a> -->
                          <a href="{{ URL::asset("shipper_deliver_dev/$requested_id") }}">Click to View</a>
                          </td>
                          </tr>
                          <?php 
                         }
                         ?>
                         
                         
		                    </table>




		                    <h3>In-Transit</h3>
                    <table class="table">
                            <tr>

                          <th>Request ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>SLA</th>
                            <th>Delivery Timing</th>
                            <th>View Details</th>
                                                    </tr>
                                                    
                                                    
                                                    <?php 
                                                    $query3="select * from customer_request where shipper_status='In-Transit' AND shipper_id='$uid'";
                                                    $stmt3 = $conn->query($query3);
                                                    while($row3 = $stmt3->fetch())
                                                    {
                                                        $id = $row3['id'];
                                                        $requested_id = $row3['requested_id'];
                                                        $Customer_id = $row3['Customer_id'];
                                                        $brand = $row3['brand'];
                                                        $model = $row3['model'];
                                                        $issue = $row3['issue'];
                                                        $request_date = $row3['request_date'];
                                                        $status = $row3['status'];
                                                        $sla= $row3['sla'];
                                                        
                                                        echo"<tr><td>$requested_id</td><td>$brand </td><td>$model</td><td>$sla</td><td></td>";
                                                        
                                                        ?>
                          <td>
                          <!-- <a href="{{ URL::asset("closed_ticket_view/$requested_id") }}">Click to View</a> -->
                          <a href="{{ URL::asset("intransit_view/$requested_id") }}">Click to View</a>
                          </td>
                          </tr>
                          <?php 
                                                    }
                                                    ?>
                                                    
                                                    
                                                     <?php 
                                                    $query6="select * from leveloeng_customer_request where shipper_status='In-Transit' AND shipper_id='$uid'";
                                                    $stmt6 = $conn->query($query6);
                                                    while($row6 = $stmt6->fetch())
                                                    {
                                                        $id = $row6['id'];
                                                        $requested_id = $row6['requested_id'];
                                                        $Customer_id = $row6['Customer_id'];
                                                        $brand = $row6['brand'];
                                                        $model = $row6['model'];
                                                        $issue = $row6['issue'];
                                                        $request_date = $row6['request_date'];
                                                        $status = $row6['status'];
                                                        $sla= $row6['sla'];
                                                        
                                                        echo"<tr><td>$requested_id</td><td>$brand </td><td>$model</td><td>$sla</td><td></td>";
                                                        
                                                        ?>
                          <td>
                          <!-- <a href="{{ URL::asset("closed_ticket_view/$requested_id") }}">Click to View</a> -->
                          <a href="{{ URL::asset("intransit_view_two/$requested_id") }}">Click to View</a>
                          </td>
                          </tr>
                          <?php 
                                                    }
                                                    ?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
		                    </table>




                    
                </div>
            </div>
        </div>
    </section></section>