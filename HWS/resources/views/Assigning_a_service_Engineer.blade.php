@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" align="center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Assigning Service Engg</b></div>
<br>
                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="register_pub" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                            <tr>
							<td>Request ID</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Customer Name</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>
							<tr>
							<td>Brand</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Model</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>  
                            
                            
                            <tr>
							<td>Issue Details</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Picked Date</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>   
                            
                            <tr>
							<td>Submitted Date</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Customer Mobile Number</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>
                            
                            
                             <tr>
							<td>Assign Service Engg</td>
                               <td>
                               <select>
                               <option  value="">--Select--</option>
                               </select>
								</td>
                               
                            </tr>  
                            
                            <tr>
							<td>Remarks</td>
                               <td colspan="3"> <textarea rows="4" cols="55"></textarea>
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
