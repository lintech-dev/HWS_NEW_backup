@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" align="center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Request Call back</b></div>
<br>
                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="register_pub" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                            <tr>

                            <td>Enter Your Mobile Numer</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                               
                                </td>
                                
                                <td><input type="submit" value="Go"></td>
                               <td> 

                                
                                </td>
                            </tr>

                        <tr>
                            <td>Enter OTP</td>

                            <td>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

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
