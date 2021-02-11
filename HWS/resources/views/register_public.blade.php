@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                     <form class="form-horizontal" method="POST" action="register_pub" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table>
                            <tr>

                            <td>Name</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                               
                                </td>
                                
                                <td>Mobile Numer</td>
                               <td> <input id="mnumber" type="text" class="form-control @error('mnumber') is-invalid @enderror" name="mnumber"  required autocomplete="mnumber" autofocus>

                                
                                </td>
                            </tr>

                        <tr>
                            <td>Email-ID</td>

                            <td>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                </td>
                                
                                <td>PIN</td>

                            <td>
                                <input id="pin" type="text" class="form-control @error('pin') is-invalid @enderror" name="pin" required autocomplete="pin">

                               
                                </td>
                                </tr>
                          

                        <tr>
                           <td>Password</td>

                            <td>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                
                            </td>
							<td>Confirm Password</td>
                        
                            <td>                        
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </td>
                        </tr>
                        
                        <tr>
                           <td>Address</td>

                            <td>
                                <textarea rows="" cols="" name="address" required></textarea>
                                
                            
                        </tr>
                        
                        </table>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
