@extends('layouts.app')

@section('content')

  @if(Session:: has('message'))
  <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
       <strong> {{ Session::get('message') }} </strong>
        @yield('content')
    </div>
@endif

<div class="container">
    <div class="row justify-content-center" align="center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Service Request Generation</b></div>
<br>
                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="Coordinator_request_back" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                        
                        <tr>
							<td>Customer Name</td>
                               <td> 
                               <input type="text" name="cname">
								</td>
                                <td>Mobile Number</td>
                               <td>
                                <input type="text" name="mobile_no">
								</td>
                            </tr> 
                            
                            <tr>
							<td>Email ID</td>
                               <td> 
                               <input type="text" name="emailid">
								</td>
                                <td>PIN Code</td>
                               <td>
                                <input type="text" name="pin">
								</td>
                            </tr>
                            
                           <tr>
							<td>Brand</td>
                               <td> 
                               <select name="brand">
                               <option  value="">--Select--</option>
                               <option  value="HCL Info">HCL Info</option>
                               <option  value="D-Link India">D-Link India</option>
                               <option  value="Cerebra Int">Cerebra Int</option>
                               </select>
								</td>
                                <td>Model</td>
                               <td>
                                <select name="model">
                               <option  value="">--Select--</option>
                               <option  value="model1">model1</option>
                               <option  value="model2">model2</option>
                               </select>
								</td>
                            </tr>  
                            
                            <tr>
							<td>Address</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="address"></textarea>
								</td>
                                
                            </tr> 
                            
                            <tr>
							<td>Issue Details</td>
                               <td colspan="3"> 
                               <textarea rows="4" cols="55" name="idetails"></textarea>
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
@endsection
