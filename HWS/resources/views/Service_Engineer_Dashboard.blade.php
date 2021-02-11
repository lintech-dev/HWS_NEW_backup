
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Service Engineer Dashboard</h4> 



                    
                    <h3>New Requests</h3>
                    <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>SLA</th>
                            <th>Issue Details</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                          <?php 
                          $uid = Auth::user()->id;
                          
                          include 'conn.php';
                          $query="select * from customer_request where service_eng_status='Pending' AND service_eng_id='$uid'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand </td><td> $model</td><td>$sla</td><td>$issue</td>";
                          ?>
                          <td><a href="{{ URL::asset("s_eng_ticket_view/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                          ?>
                          <?php 
                          $uid = Auth::user()->id;
                          
                          include 'conn.php';
                          $query="select * from leveloeng_customer_request where service_eng_status='Pending' AND service_eng_id='$uid'";
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
                          
                          echo"<tr><td>$requested_id</td><td>$brand </td><td> $model</td><td>$sla</td><td>$issue</td>";
                          ?>
                          <td><a href="{{ URL::asset("s_eng_ticket_view/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                          ?>
		                    </table>
		                    
		                    
		                    
		                    <h3>On Going Requests</h3>
                    <table class="table">
                            <tr>

                            <th>Request ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>SLA</th>
                            <th>Issue Details</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                                                    
                                                    <?php 
                                                    $query="select * from customer_request where service_eng_status='on going'";
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
                                                        
                                                        echo"<tr><td>$requested_id</td><td>$brand </td><td>$model</td><td>$sla</td><td>$issue</td>";
                                                        ?>
                          <td><a href="{{ URL::asset("se_ticket_close/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                          ?>
                          
                           <?php 
                                                    $query_del="select * from leveloeng_customer_request where service_eng_status='on going'";
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
                                                        
                                                        echo"<tr><td>$requested_id</td><td>$brand </td><td>$model</td><td>$sla</td><td>$issue</td>";
                                                        ?>
                          <td><a href="{{ URL::asset("se_ticket_close/$requested_id") }}">Click to View</a></td>
                          </tr>
                          <?php 
                          }
                          ?>
                          
                          
		                    </table>
                    
                </div>
            </div>
        </div>
</section></section>
