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
                <div class="card-header"><b>Request Call Back</b></div>
<br>
                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="user_request_call_back_otp" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                           <tr>
							<td>Enter Your Mobile Number</td>
                               <td> 
                               <input type="text" name="mobile">
								</td>
                                <td></td>
                               <td>
                                <input type="submit" value="Request">
								</td>
                            </tr>  
                        </table>
                    </form>
                    <br><br>
                    
                                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
