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
              <h4 class="mb" align="center">Generate Customer Wise Report</h4> 
           			  
                <form class="form-horizontal" method="POST" action="generate_customer_report" enctype="multipart/form-data">
                      {{ csrf_field() }}
                     						
                        
                        <table class="table"> 
                        
                            <tr>
                               <td>Customer Name</td>
                               <td> 
                                  <select name="name" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                      include 'conn.php';
                                      $query="select * from users";
                                      $stmt = $conn->query($query);
                                      while($row = $stmt->fetch())
                                      {
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        echo "<option value='$email'>$name</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                               <td>Mobile Number</td>
                               <td>
                                  <input type="text" name="mnumber" class="form-control">
                               </td>
                            </tr> 
                            
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
                               <td>Brand</td>
                               <td> 
                                  <select name="brand" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="HCL Info">HCL Info</option>
                                    <option value="D-Link India">D-Link India</option>
                                    <option value="Cerebra Int">Cerebra Int</option>
                                  </select>
                               </td>
                               <td>Model No</td>
                               <td>
                                  <select name="model" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="model1">Model1</option>
                                    <option value="model2">Model2</option>
                                  </select>
                               </td>
                            </tr>

                            <tr>
                               <td>Issue Category</td>
                               <td> 
                                  <select name="issue" class="form-control">                                  
                                    <option value="">---Select---</option>
                                    <?php
                                      include 'conn.php';
                                      $query="select * from customer_request";
                                      $stmt = $conn->query($query);
                                      while($row = $stmt->fetch())
                                      {
                                        $issue = $row['issue'];
                                        echo "<option value='$issue'>$issue</option>";
                                      }
                                    ?>
                                    <!-------
                                    <option value="testing description">Testing Description</option>
                                    <option value="testing remarks by customer">Testing remarks by Customer</option>
                                    <option value="test issue">Test Issue</option>
                                    <option value="test">Test</option>
                                    <option value="test issue 3">Test Issue 3</option>
                                    <option value="router issue">Router Issue</option>
                                    <option value="network issue">Network Issue</option>
                                    <option value="testing today">Testing today</option>
                                    <option value="component issue">Component Issue</option>
                                    ------->
                                  </select>
                               </td>
                               <td>Issue Status</td>
                               <td>
                                  <select name="status" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                      include 'conn.php';
                                      $query="select * from customer_request";
                                      $stmt = $conn->query($query);
                                      while($row = $stmt->fetch())
                                      {
                                        $status = $row['status'];
                                        echo "<option value='$status'>$status</option>";
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