@extends('header')

@section('content')
<div class="container">
    <div class="row justify-content-center" align="center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Generate Ticket on behalf of the Customer</b></div>
<br>
                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="cordinator_request_tick" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                            <tr>
							<td>Customer Name</td>
                               <td> <input id="name" type="text" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Phone Number</td>
                               <td>
                                <input id="name" type="text"  name="pnumber" required autocomplete="name" autofocus>
								</td>
                            </tr>
							<tr>
							<td>Email ID</td>
                               <td> <input id="name" type="text" name="email" required autocomplete="name" autofocus>
								</td>
                                <td>PIN</td>
                               <td>
                                <input id="name" type="text" name="pin" required autocomplete="name" autofocus>
								</td>
                            </tr>   
                            
                            <tr>
							<td>Customer Address</td>
                               <td colspan="3"> <textarea rows="4" cols="55" name="address"></textarea>
								</td>
								</tr>                       
                        
                      
								
								<tr>
							<td>Device Brand</td>
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
							<td>Serial Number</td>
                               <td> 
                               <input type="text" name="serialno">
								</td>
                                <td>Item Number</td>
                               <td>
                                <input type="text" name="itemno">
								</td>
                            </tr>  
                            
                            <tr>
							<td>Issue</td>
                               <td colspan="3"> <textarea rows="4" cols="55" name="issue"></textarea>
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
