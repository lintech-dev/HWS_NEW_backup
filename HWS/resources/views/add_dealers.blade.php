
                
                                
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Add Dealers</h4> 
                                                    
                    <form class="form-horizontal" method="POST" action="add_dealers" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <table class="table">
                                                                                  
                            <tr>                            
                               <td>Dealer Name</td>
                               <td>
                                <input type="text" name="dealer_name" class="form-control">
                                </td>
                                <td>Contact Person</td>
                               <td>
                                <input type="text" name="contact_person" class="form-control">
                                </td>
                            </tr>

                            <tr>                            
                               <td>Mobile Number</td>
                               <td>
                                <input type="text" name="mobile" class="form-control">
                                </td>
                                <td>Email ID</td>
                               <td>
                                <input type="text" name="email" class="form-control">
                                </td>
                            </tr>

                            <tr>                            
                               <td>City</td>
                               <td>
                                <input type="text" name="city" class="form-control">
                                </td>
                               <td>PIN Code</td>
                               <td>
                                <input type="text" name="pin_code" class="form-control">
                                </td>
                            </tr>  
                                                        
                            <tr>
                            <td>Address</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="address" class="form-control"></textarea>
                               </td>                                
                            </tr>   
                            
                            <tr> 
                            <td>Dealer Location</td>
                               <td>
                                <select name="dlocation" class="form-control">
                                  <option value="">----Select----</option>
                                  <option value="Rajaji nagar">Rajaji nagar</option>
                                  <option value="Indra nagar">Indra nagar</option>
                                  <option value="BTM">BTM</option>
                                  <option value="Malleshweram">Malleshweram</option>
                                </select>
                                </td>                            
                               <td>Dealer Status</td>
                               <td>
                                <select name="status" class="form-control">
                                  <option value="">----Select----</option>
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>
                                </select>
                                </td>                                
                            </tr>
                            
                             <tr> 
                            <td>Level One Engineer</td>
                               <td>
                                <select name="loeng" class="form-control">
                                  <option value="">----Select----</option>
                                  <?php 
                                  include 'conn.php';
                                  $query2="select * from users where role='Level 1 Engineer'";
                          $stmt2 = $conn->query($query2);
                          while($row2 = $stmt2->fetch())
                          {
                              $id = $row2['id'];
                              $name = $row2['name'];
                              echo"<option value='$id'>$name</option>";
                          }
                          ?>
                                </select>
                                </td>                            
                                                             
                            </tr>
                                                                                                                                                                     
                        </table>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section></section>
