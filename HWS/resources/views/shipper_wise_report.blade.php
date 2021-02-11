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
              <h4 class="mb" align="center">Generate Shipper Wise Report</h4>                                                     
                <form class="form-horizontal" method="POST" action="generate_shipper_report" enctype="multipart/form-data">
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
                               <td>Shipment Type</td>
                               <td> 
                                  <select name="shipment_type" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="Pick-up">Pick-up</option>
                                    <option value="Deliver">Deliver</option>
                                  </select>
                               </td>
                               <td>Shipment From/To</td> 
                               <td>
                                  <select name="shipment_from" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="dealer">Dealer</option>
                                    <option value="customer">Customer</option>
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
                                  </select>
                               </td>
                               <td>Issue Status</td>
                               <td>
                                  <select name="status" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="Closed">New</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Pending">Pending</option>
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