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
              <h4 class="mb" align="center">SLA Wise Report</h4>                                                     
                <form class="form-horizontal" method="POST" action="generate_sla_report" enctype="multipart/form-data">
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
                               <td>Issue Category</td>
                               <td> 
                                  <select name="issue_category" class="form-control">
                                    <option value="">---Select---</option>
                                    <?php
                                      include 'conn.php';
                                      $query="select actual_issue from customer_request";
                                      $stmt = $conn->query($query);
                                      while($row = $stmt->fetch())
                                      {
                                          $actual_issue = $row['actual_issue'];
                                        echo "<option value='$actual_issue'>$actual_issue</option>";
                                      }
                                    ?>
                                  </select>
                               </td>
                               <td>Status</td>
                               <td>
                                  <select name="status" class="form-control">
                                    <option value="">---Select---</option>
                                    <option value="Within SLA">Within SLA</option>
                                    <option value="Out of SLA">Out of SLA</option>
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