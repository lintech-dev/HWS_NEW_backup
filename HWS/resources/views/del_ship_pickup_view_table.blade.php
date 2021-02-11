<?php
//echo"$id";
?>
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Request From Dealer Place</h4> 
                                                                                
                    <!-- <h3>Request Detail View</h3> -->
                    <table class="table">
                        <tr>
                           <th>Request ID</th>
                           <th>Email ID</th>
                           <th>Model Number & Brand</th>
                           <th>Serial Number</th>                           
                           <th>Actions</th>  
                        </tr>

                        @foreach($dealers as $row)
                        <tr> 
                          <td>{{ $row->requested_id }}</td>          
                          <td>{{ $row->Customer_id }}</td>
                          <td>{{ $row->model }} , {{ $row->brand }}</td>          
                          <td>{{ $row->serialno }}</td>                          
                          <td>
                          <a href="{{ URL::asset("dealer_request_view_pickup_view/$row->requested_id") }}">Click to View</a>
                            <!-- <a href="dealer_request_view/{{ $row->id }}">Click to View</a> -->
                          </td>          
                        </tr>
                        @endforeach
                    </table>

                 </div>
            </div>
        </div>
  </section></section>
   
  @include('footer');