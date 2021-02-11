                    
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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Dealer Dashboard</h4> 
                    
                    <!-- <table class="table">
                            <tr>

                            <th>
                            Pending Requests
                            <br>
                            <a href="ticket_view_co/Pending">View</a>
                            </th>
                            <th>
                            On-Progress Requests
                            <br>
                            <a href="ticket_view_co/On Progress">View</a>
                            </th>
                            <th>
                            Closed Requests
                            <br>
                            <a href="ticket_view_co/Closed">View</a>
                            </th>
                            
                                                    </tr>
                                                    

                            <tr>

                            <th>
                            New Requests
                            <br>
                            <a href="ticket_view_co/New">View</a>
                            </th>
                            <th>
                            Escalated Requests
                            <br>
                            <a href="ticket_view_co/Escalated">View</a>
                            </th>
                            <th>
                            Shipped Requests
                            <br>
                            <a href="ticket_view_co/Shipped">View</a>
                            </th>
                            
                                                    </tr>
                                                           
                                     
		                    </table>
		                    
		                  -->   
		                    
		                                        
                </div>
            </div>
        </div>
    </section></section>
