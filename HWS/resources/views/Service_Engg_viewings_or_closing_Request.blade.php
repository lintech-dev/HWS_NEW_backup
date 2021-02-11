@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" align="center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Service Required Request In Detail</b></div>
<br>
                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="register_pub" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                            <tr>
							<td>Request ID</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Assing Date</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>
							<tr>
							<td>Approved Date</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>Model</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>  
                            
                            
                            <tr>
							<td>Issue in Detail</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                                <td>SLA</td>
                               <td>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
								</td>
                            </tr>   
                            
                             
                            
                            <tr>
							<td>Solution Provided</td>
                               <td colspan="3"> <textarea rows="4" cols="55"></textarea>
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
                                    Completed
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
