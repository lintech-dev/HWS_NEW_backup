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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Customer Dashboard <?php //echo"$user_segment";?></h4> 



                
                
                
                
                    
                    <h3>Pending Requests</h3>
                    <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand & Model Number</th>
                            <th>Requested Date</th>
                            <th>Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          $cust = Auth::user()->email;
                          include 'conn.php';
                          $query="select * from customer_request where Customer_id='$cust' AND (status='On Progress' OR status='New')";
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
                          <td><a href="{{ URL::asset("ticket_view/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                                                    
                                                    ?>
		                    </table>
		                    
		                    
		                    
		                    <h3>Closed Requests</h3>
                    <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand & Model Number</th>
                            <th>Requested Date</th>
                            <th>Status</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                                                    
                                                    <?php 
                                                    $query="select * from customer_request where Customer_id='$cust' AND status='Closed'";
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
                          <td><a href="{{ URL::asset("closed_ticket_view/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                                                    }
                                                    
                                                    
                                                    
                                                    ?>
		                    </table>
                    
                </div>
            </div>
        </div>
   </section></section>
   
   @include('footer');
