@extends('layouts.app')

@section('content')

<?php // echo"$mobile_no_no";?>

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
                <div class="card-header"><b>Enter Request a Call Back OTP</b></div>
<br>
                
                    
                    <form class="form-horizontal" method="POST" action="user_request_call_back_sub" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
     <input type="hidden" name="id" value="<?php echo"$id";?>">
                        <table>
                           
                            <tr>
							<td>Enter the OTP</td>
                               <td> 
                              
                               
                               <input type="password" name="user_otp">
								</td>
                               
                            </tr>  
                        </table>
                        <br>
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
