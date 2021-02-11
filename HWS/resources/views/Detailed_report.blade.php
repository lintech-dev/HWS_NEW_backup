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
              <h4 class="mb" align="center">Detailed Report</h4>                                                     
                <form class="form-horizontal" method="POST" action="generate_detail_report" enctype="multipart/form-data">
                      {{ csrf_field() }} 

                        
                        <table class="table">
                                                                              
                            <tr>
                               <td>From Date*</td>
                               <td> 
                                  <input type="date" name="from_date" class="form-control" required>
                               </td>
                               <td>To Date*</td>
                               <td>
                                  <input type="date" name="to_date" class="form-control" required>
                               </td>
                            </tr>
                            
                            <tr>
                               <td>Customer Name</td>
                               <td> 
                                  
                                  <select name="c_name" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                    include 'conn.php';
                                     $query2="select * from users where role='User'";
                                      $stmt2 = $conn->query($query2);
                                      while($row2 = $stmt2->fetch())
                                      {
                                        $name = $row2['name'];
                                        $email = $row2['email'];
                                        echo "<option value='$email'>$email,$name</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                               <td>Issue Category</td>
                               <td>
                                   <select name="issue_category" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                      
                                      $query="select * from customer_request";
                                      $stmt = $conn->query($query);
                                      while($row = $stmt->fetch())
                                      {
                                        $issue = $row['issue'];
                                        echo "<option value='$issue'>$issue</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                            </tr>
                            
                            <tr>
                               <td>Shipper Picked Up</td>
                               <td> 
                                  <select name="shipper_pu" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                     $query2="select * from users where role='Shipper'";
                                      $stmt2 = $conn->query($query2);
                                      while($row2 = $stmt2->fetch())
                                      {
                                        $name = $row2['name'];
                                        $id = $row2['id'];
                                        echo "<option value='$id'>$name</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                               <td>Service Engineer</td>
                               <td>
                                   <select name="service_eng" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                      $query3="select * from users where role='Service Engineer'";
                                      $stmt3 = $conn->query($query3);
                                      while($row3 = $stmt3->fetch())
                                      {
                                          $name = $row3['name'];
                                          $id = $row3['id'];
                                        echo "<option value='$id'>$name</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                            </tr>

                            <tr>
                               <td>Cost Involved</td>
                               <td> 
                                  <select name="cost_inv" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                      $query4="select cost_inv from customer_request";
                                      $stmt4 = $conn->query($query4);
                                      while($row4 = $stmt4->fetch())
                                      {
                                          $cost_inv = $row4['cost_inv'];
                                        echo "<option value='$cost_inv'>$cost_inv</option>";
                                      }
                                      $query5="select cost_inv from leveloeng_customer_request";
                                      $stmt5 = $conn->query($query5);
                                      while($row5 = $stmt5->fetch())
                                      {
                                          $cost_inv1 = $row5['cost_inv'];
                                          echo "<option value='$cost_inv1'>$cost_inv1</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                               <td>Status</td>
                               <td>
                                  <select name="status" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="Pending">Pending</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Closed">Closed</option>
                                    <option value="New">New</option>
                                    <option value="Escalated">Escalated</option>
                                    <option value="Shipped">Shipped</option>
                                  </select>
                               </td>
                            </tr>

<tr>
                               <td>Shipper Delivered</td>
                               <td> 
                                  <select name="shipper_del" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                     $query2="select * from users where role='Shipper'";
                                      $stmt2 = $conn->query($query2);
                                      while($row2 = $stmt2->fetch())
                                      {
                                        $name = $row2['name'];
                                        $id = $row2['id'];
                                        echo "<option value='$id'>$name</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                              
                            </tr>
                                                                                                                                                                                                                                                                                                              
                        </table>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Generate Report
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
  </section></section>