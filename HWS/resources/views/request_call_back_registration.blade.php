@include('header_public')


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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Create a Request for Request Call Back</h4> 
              

                    
                     <form class="form-horizontal" method="POST" action="call_back_user_request_back" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table class="table">
                        
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
							<td>Customer Address</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="address" class='form-control'></textarea>
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
							<td>Issue/Problem in Details</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="idetails" class='form-control'></textarea>
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

