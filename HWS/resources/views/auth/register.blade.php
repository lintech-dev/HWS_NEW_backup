@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <table>
                            <tr>

                            <td>Name</td>
                               <td> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                
                                <td>Mobile Numer</td>
                               <td> <input id="mnumber" type="text" class="form-control @error('mnumber') is-invalid @enderror" name="mnumber"  required autocomplete="mnumber" autofocus>

                                @error('mnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                            </tr>

                        <tr>
                            <td>Email-ID</td>

                            <td>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                
                                <td>PIN</td>

                            <td>
                                <input id="pin" type="text" class="form-control @error('pin') is-invalid @enderror" name="pin" required autocomplete="pin">

                                @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </td>
                                </tr>
                          

                        <tr>
                           <td>Password</td>

                            <td>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
							<td>Confirm Password</td>
                        
                            <td>                        
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </td>
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
