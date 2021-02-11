

                @include('header')

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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Add User</h4> 



                     <form class="form-horizontal" method="POST" action="register_user" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table class="table">
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
                                
                                <td>Role</td>

                            <td>
                                <select name="role" class="form-control">
                                <option value="">--select--</option>
                                <option value="User">User</option>
                                <option value="Coordinator">Coordinator</option>
                                <option value="Service Engineer">Service Engineer</option>
                                <option value="Level 1 Engineer">Level 1 Engineer</option>
                                <option value="Shipper">Shipper</option>
                                </select>

                               
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

                            <td colspan="3">
                                <textarea rows="" cols="" name="address" class="form-control" required></textarea>
                                
                            
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
    </section></section>