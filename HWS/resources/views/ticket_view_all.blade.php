
  
  
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Co-ordinator Tickets</h4> 
  
  
                    
                    
                    
                    <?php 
                    if($id == "Pending")
                    {
                    
                    ?>

<h3><?php echo"$id";?> Requests</h3>
                           <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand & Model Number</th>
                            <th>Requested Date</th>
                            <th>Status</th>
                            <th>Service Engineer Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          
                          include 'conn.php';
                          //$query="select * from customer_request where status='Pending' AND shipper_status='Closed' AND service_eng_id='null'";
                          $query="select * from customer_request where status='Pending' AND shipper_status='Closed'";
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
                          $service_eng_status = $row['service_eng_status'];
                          
                          
                          echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td><td>$service_eng_status</td>";
                          
                          if($service_eng_status == "Pending")
                          {
                          ?>
                          <td><a href="{{ URL::asset("service_eng_assing/$requested_id") }}">Re-assign Service Eng</a></td>
                          <?php 
                          }
                          else 
                          {
                          ?>
                          <td><a href="{{ URL::asset("service_eng_assing/$requested_id") }}">Click here to view & Assign SE</a></td>
                          <?php 
                          }
                          ?>
                          </tr>
                          <?php 
                          }
                          include 'conn.php';
                          //$query="select * from customer_request where status='Pending' AND shipper_status='Closed' AND service_eng_id='null'";
                          $query="select * from leveloeng_customer_request where status='Pending' AND shipper_status='Closed'";
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
                              $service_eng_status = $row['service_eng_status'];
                              
                              
                              echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td><td>$service_eng_status</td>";
                              
                              if($service_eng_status == "Pending")
                              {
                          ?>
                          <td><a href="{{ URL::asset("service_eng_assing/$requested_id") }}">Re-assign Service Eng</a></td>
                          <?php 
                          }
                          else 
                          {
                          ?>
                          <td><a href="{{ URL::asset("service_eng_assing/$requested_id") }}">Click here to view & Assign SE</a></td>
                          <?php 
                          }
                          ?>
                          </tr>
                          <?php 
                          }
                          ?>
		                    </table>

                    
                    
                    <?php
                    }
                   else if($id == "Closed")
                    {
                    ?>
                    <h3>Service Engineer Closed Requests</h3>
                     <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand & Model Number</th>
                            <th>Requested Date</th>
                            <th>Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                              
                          <?php 
                          include 'conn.php';
                          //$query="select * from customer_request where status='Pending' AND shipper_status='Closed' AND service_eng_id='null'";
                          $query="select * from customer_request where service_eng_status='Closed'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td>";
                         ?>
                          <td><a href="{{ URL::asset("service_eng_clo_upd_cor/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php
                          }
                          ?>
                          
                          <?php 
                         
                          //$query="select * from customer_request where status='Pending' AND shipper_status='Closed' AND service_eng_id='null'";
                          $query="select * from leveloeng_customer_request where service_eng_status='Closed'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td>";
                         ?>
                          <td><a href="{{ URL::asset("service_eng_clo_upd_cor/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php
                          }
                          ?>
                          
                          
                         </table>
                         <?php 
                    }
                    else
                    {
                    ?>
                    <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand & Model Number</th>
                            <th>Requested Date</th>
                            <th>Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          include 'conn.php';
                          $query="select * from customer_request where status='$id'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td>";
                          ?>
                          <td><a href="{{ URL::asset("ticket_view_view_co/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                                                    
                                                    ?>
		                    </table>
		             <?php 
                    }
                    ?>       
		               
		               
		               <br><br><br>
		               
		               <h4>Customer Approve/Reject Requests</h4>
		               
		               
		               
		               <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand & Model Number</th>
                            <th>Requested Date</th>
                            <th>Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          include 'conn.php';
                          $query="select * from customer_request where status='Pending' AND service_eng_status='Closed'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td>";
                          ?>
                          <td><a href="{{ URL::asset("ticket_app_rej/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                          ?>
                          <?php 
                          //dealer functionality
                          $query="select * from leveloeng_customer_request where status='Pending' AND service_eng_status='Closed'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand $model</td><td>$request_date</td><td>$status</td>";
                          ?>
                          <td><a href="{{ URL::asset("ticket_app_rej/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                          ?>
		                    </table>     
		                    
		                   
                    
                </div>
            </div>
        </div>
 </section></section>

