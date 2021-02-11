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
              <h4 class="mb"><i class="fa fa-angle-right"></i>New Tickets</h4> 
                
                    
                    
                    <table class="table">
                            <tr>

                            <th>Ticket ID <?php //echo"$id";?></th>
                            <th>Customer Name</th>
                            <th>Brand & Model Number</th>
                            <th>Serial Number</th>
                            <th>Requested Date</th>
                            <th>Shipper Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          $sid = $id;
                          include 'conn.php';
                          //$query="select * from customer_request where status='$sid' AND dealer_name IS NULL";
                          $query="select * from customer_request where (shipper_status != 'Closed' OR shipper_status IS NULL) AND dealer_name IS NULL";
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
                          $serialno = $row['serialno'];
                          $shipper_status = $row['shipper_status'];
                          
                          $query2="select name from users where email='$Customer_id'";
                          $stmt2 = $conn->query($query2);
                          while($row2 = $stmt2->fetch())
                          {
                              $cust_name = $row2['name'];
                          }
                          
                          echo"<tr><td>$requested_id</td><td>$cust_name</td><td>$brand $model</td><td>$serialno</td><td>$request_date</td><td>$shipper_status</td>";
                          if($shipper_status == "pickup")
                          {
                          ?>
                          <td><a href="{{ URL::asset("ticket_view_view_co_ship/$requested_id") }}">Re-Assign</a></td>
                          <?php 
                          }
                          else
                          {
                          ?>
                          <td><a href="{{ URL::asset("ticket_view_view_co_ship/$requested_id") }}">Assign</a></td>
                          <?php 
                          }
                          ?>
                          </tr>
                          <?php 
                          }
                                                    
                                                    ?>
		                    </table>
		                    
		                    
		                    
		                    <br><br>
		                    
		                    
		                    
		                    <h4 class="mb"><i class="fa fa-angle-right"></i>Request Generated From Dealer Place</h4> 
		                    <br><br>
		                    
		                    <table class="table">
                            <tr>

                            <th>Dealer ID</th>
                            <th>Dealer Name</th>
                            <th>Dealer Location</th>
                            <th>No of Request</th>
                            <th>Requested Date</th>
                            <th>Shipper Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          include 'conn.php';
                          $query1="select * from leveloeng_customer_request group by dealer_id";
                          $stmt1 = $conn->query($query1);
                          while($row1 = $stmt1->fetch())
                          {
                          $id = $row1['id'];
                          $requested_id = $row1['requested_id'];
                          $Customer_id = $row1['Customer_id'];
                          $brand = $row1['brand'];
                          $model = $row1['model'];
                          $issue = $row1['issue'];
                          $request_date = $row1['request_date'];
                          $status = $row1['status'];
                          $serialno = $row1['serialno'];
                          $dealer_name = $row1['dealer_name'];
                          $dealer_id = $row1['dealer_id'];
                          $dealer_location = $row1['dealer_location'];
                          $shipper_status2 = $row1['shipper_status'];
                          
                          $query11="select name from users where email='$Customer_id'";
                          $stmt11 = $conn->query($query11);
                          while($row11 = $stmt11->fetch())
                          {
                              $cust_name = $row11['name'];
                          }
                          
                          $sql = "SELECT count(*) FROM leveloeng_customer_request group by dealer_id";
                          $result = $conn->prepare($sql);
                          $result->execute();
                          $number_of_rows = $result->fetchColumn();
                          
                          echo"<tr><td>$dealer_id</td><td>$dealer_name</td><td>$dealer_location</td><td>$number_of_rows</td><td>$request_date</td><td>$shipper_status2</td>";
                          
                          
                          $id_loc = "$dealer_id|$dealer_location";
                          
                          if($shipper_status2 == "pickup")
                          {
                          ?>
                          
                          <td><a href="{{ URL::asset("ticket_view_view_co_ship_del/$id_loc") }}">Re-Assign</a></td>
                          
                          <?php 
                          }
                          else 
                          {
                          ?>
                          <td><a href="{{ URL::asset("ticket_view_view_co_ship_del/$id_loc") }}">Assign</a></td>
                          <?php 
                          }
                          ?>
                          </tr>
                          <?php 
                          }
                                                    
                                                    ?>
		                    </table>
		                    
		                    
		                    
		                   
                    
                </div>
            </div>
        </div>
    </section></section>
