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

<?php 
$created_by = Auth::user()->email;
?>
         <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Create a Request <?php //echo"$created_by";?></h4> 
              
              <?php
              include 'conn.php';
              $query2="select id from users where email='$created_by'";
              $stmt2 = $conn->query($query2);
              while($row2 = $stmt2->fetch())
              {
                  $id = $row2['id'];
              }
              
              $query3="select * from dealers where loeng='$id'";
              $stmt3 = $conn->query($query3);
              while($row3 = $stmt3->fetch())
              {
                  $dealer_id = $row3['id'];
                  $dealer_name = $row3['dealer_name'];
                  $dlocation = $row3['dlocation'];
                  $address = $row3['address'];
              }
              ?>

                    
                     <form class="form-horizontal" method="POST" action="level1Eng_request_back" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table class="table">
                        
                        <tr>
                        <td>Dealer ID</td>
                               <td> 
                               <input type="text" name="did" class='form-control' value="<?php echo"$dealer_id"; ?>" readonly>
								</td>
							<td>Dealer Name</td>
                               <td> 
                               <input type="text" name="dname" class='form-control' value="<?php echo"$dealer_name"; ?>" readonly>
								</td>
                                
                            </tr> 
                        
                        <tr>
							<td>Dealer Location</td>
                               <td> 
                               <input type="text" name="dlocation" class='form-control' value="<?php echo"$dlocation"; ?>" readonly>
								</td>
                                <td>Dealer Address</td>
                               <td>
                                <textarea rows="4" cols="20" name="dea_ddress" class='form-control' readonly><?php echo"$address"; ?></textarea>
								</td>
                            </tr> 
                        
                        <tr>
							<td>Customer Name</td>
                               <td> 
                               <input type="text" name="cname" class='form-control'>
								</td>
                                <td>Mobile Number</td>
                               <td>
                                <input type="text" name="mobile_no" class='form-control'>
								</td>
                            </tr> 
                            
                            <tr>
							<td>Email ID</td>
                               <td> 
                               <input type="text" name="emailid" class='form-control'>
								</td>
                                <td>PIN Code</td>
                               <td>
                                <input type="text" name="pin" class='form-control'>
								</td>
                            </tr>
                            
                             <tr>
							<td>Select Your Device</td>
                               <td colspan="3"> 
                              <select name="type" class='form-control'>
                               <option  value="">--Select--</option>
                               <option  value="Laptop">Laptop</option>
                               <option  value="Desktop">Desktop</option>
                               </select>
								</td>
                                
                            </tr>
                            
                            
                           <tr>
							<td>Brand</td>
                               <td> 
                               <select name="brand" class='form-control'>
                               <option  value="">--Select--</option>
                               <option  value="HCL Info">HCL Info</option>
                               <option  value="D-Link India">D-Link India</option>
                               <option  value="Cerebra Int">Cerebra Int</option>
                               </select>
								</td>
                                <td>Model</td>
                               <td>
                                <select name="model" class='form-control'>
                               <option  value="">--Select--</option>
                               <option  value="model1">model1</option>
                               <option  value="model2">model2</option>
                               </select>
								</td>
                            </tr>  
                            
                            <tr>
							<td>Serial Number</td>
                               <td> 
                               <input type="text" name="serialno" class='form-control'>
								</td>
                                <td>Item Number</td>
                               <td>
                                <input type="text" name="itemno" class='form-control'>
								</td>
                            </tr>  
                            
                            
                            <tr>
							<td>Customer Address</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="address" class='form-control'></textarea>
								</td>
                                
                            </tr> 
                            
                            <tr>
							<td>Issue/Problem in Details</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="idetails" class='form-control'></textarea>
								</td>
                                
                            </tr>   
                            
                            <tr>
<td>Browse & Upload Pictures</td>
<td colspan="3">
<input type="file" name="hardware_photos[]" multiple class='form-control'>
</td>
</tr>
                            
                           
                            
                            
                              
                       
                            
                            
                        </table>
               <br>         
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section></section>