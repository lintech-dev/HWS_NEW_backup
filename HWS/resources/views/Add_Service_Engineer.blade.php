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
              <h4 class="mb"><i class="fa fa-angle-right"></i>Add Service Engineer</h4> 


                    
                     <form class="form-horizontal" method="POST" action="add_service_eng" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <table class="table">
                            <tr>

                            <td>Engineer Name</td>
                               <td> <input type="text"  name="ename" class='form-control' required>

                               
                                </td>
                                
                                <td>Expertise</td>
                               <td>
                               
                             <select name="experties[]" required multiple class='form-control'>
                                <option value="">--select--</option>
                                <option value="Network Security">Network Security</option>
                                <option value="WAN/LAN">WAN/LAN</option>
                                <option value="Technical Support and Troubleshooting">Technical Support and Troubleshooting</option>
                                <option value="Network Configuration">Network Configuration</option>
                                <option value="Hardware Development, Analysis, and Testing">Hardware Development, Analysis, and Testing</option>
                                
                                </select>
                                </td>
                            </tr>

                        <tr>
                            <td>Experience</td>

                            <td>
                                <select name="experience" class='form-control'>
                                <option value="">--select--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                </select>

                                </td>
                                
                                <td>Email ID</td>

                            <td>
                                <input type="text"  name="emailid" class='form-control' required>
                                </td>
                                </tr>
                          
                          <tr>
                        <td>Mobile Number</td>
                          <td>
                                <input type="text"  name="mobile_no" class='form-control' required>
                                </td>
                                <td>Address</td>
                                <td>
                                <textarea rows="" cols="" name="address" class='form-control' required></textarea>
                                </td>
                        </tr>

                        <tr>
                        <td>Personal Documents</td>
                          <td>
                                <input type="file"  name="pdocument" class='form-control' required>
                                </td>
                                <td>Experience Documents</td>
                                <td>
                                <input type="file"  name="edocument" class='form-control' required>
                                </td>
                        </tr>
                        
                        
                        
                        
                        
                        
                        
                        </table>
                        
                        <br><br>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add
                                </button>
                            </div>
                        </div>
                    </form>
                
                
                 <h4>Service Engineer Management</h4>
                    <table class="table">
                            <tr>

                            <th>Engineer ID</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Experience</th>
                            <th>No of Service</th>
                            <th>View in Detail</th>
                                                    </tr>
                                                    
                                                    
                                                    <?php 
                                                    include 'conn.php';
                                                    $query="select * from users where role='Service Engineer'";
                                                    $stmt = $conn->query($query);
                                                    while($row = $stmt->fetch())
                                                    {
                                                        $id = $row['id'];
                                                        $name = $row['name'];
                                                        $Expertise = $row['Expertise'];
                                                        $Experience = $row['Experience'];
                                                        //$id = $row['id'];
                                                        
                                                        echo"<tr><td>$id</td><td>$name</td><td>$Expertise</td><td>$Experience</td><td></td><td><a href='edit_service_eng/$id'>View</a></td></tr>";
                                                        
                                                    }
                                                    
                                                    
                                                    ?>
                                                    
                                                    </table>





