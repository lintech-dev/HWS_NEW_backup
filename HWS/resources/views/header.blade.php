<?php
$created_by = Auth::user()->email;
$role = Auth::user()->role;
//$role = Session::get('role');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>HWS</title>

  <!-- Favicons -->
  <!-- <link href="img/favicon.png" rel="icon"> -->
  <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/style-responsive.css') }}" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo">
      <!-- <img alt="logo" src="{{ URL::asset('img/convergent_logo.png') }}" style="width: 160px; height: 30px;"> -->
      LOGO
      </a>
      <!--logo end-->

      <div class="top-menu">
         <ul class="nav pull-right top-menu">
          <li>
            <!-- <a class="logout" href="{{ URL::asset('logout') }}">Logout</a> -->
            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
          </li>
        </ul> 
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <!-- <p class="centered">
            <a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a>
          </p> -->
          
          <?php 
          include 'conn.php';
          $email = Auth::user()->email;
          //echo"$admin_email";
          $query1="Select * from users where email='$email'";
          $stmt1= $conn->query($query1);
          while($row1 = $stmt1->fetch())
          {
              $role=$row1['role'];
          }
          if($role == "User")
          {
          ?>
          <li class="sub"><a href="{{ url('UDashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <li class="sub"><a href="{{ url('Create_User_Request') }}"><i class="fa fa-ticket"></i><span>Customer Request</span></a></li>
           <?php 
          }
          else if($role == "Coordinator")
          {
          ?>
          <li class="sub"><a href="{{ url('Coordinator_Dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <li class="sub"><a href="{{ url('Coordinator_register_request') }}"><i class="fa fa-ticket"></i><span>Generate Request</span></a></li>
         <li class="sub"><a href="{{ url('add_user') }}"><i class="fa fa-ticket"></i><span>Add User</span></a></li>
         <li class="sub"><a href="{{ url('Add_Service_Engineer') }}"><i class="fa fa-ticket"></i><span>Add Service Engineer</span></a></li>
         <li class="sub"><a href="{{ url('add_dealers') }}"><i class="fa fa-ticket"></i><span>Add Dealer</span></a></li>
         
         <li class="sub"><a href="{{ url('customer_wise_report') }}"><i class="fa fa-ticket"></i><span>Customer Report</span></a></li>
         <li class="sub"><a href="{{ url('dealer_wise_report') }}"><i class="fa fa-ticket"></i><span>Dealer Report</span></a></li>
         <li class="sub"><a href="{{ url('service_eng_wise_report') }}"><i class="fa fa-ticket"></i><span>Service Eng Report</span></a></li>
         <li class="sub"><a href="{{ url('shipper_wise_report') }}"><i class="fa fa-ticket"></i><span>Shipper Report</span></a></li>
         <li class="sub"><a href="{{ url('sla_wise_report') }}"><i class="fa fa-ticket"></i><span>SLA Wise Report</span></a></li>
         <li class="sub"><a href="{{ url('Detailed_report') }}"><i class="fa fa-ticket"></i><span>Detailed Report</span></a></li>
         
         <?php 
          }
          else if($role == "Level 1 Engineer")
          {
         ?>
         <li class="sub"><a href="{{ url('Dealer_Dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <li class="sub"><a href="{{ url('Dealer_register_request') }}"><i class="fa fa-ticket"></i><span>Generate Request</span></a></li>
         <?php 
          }
          else if($role == "Shipper")
          {
         ?>
         <li class="sub"><a href="{{ url('Shipper_Dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
         <?php 
          }
          else if($role == "Service Engineer")
          {
          ?>
         <li class="sub"><a href="{{ url('Service_Engineer_Dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
         <?php 
          }
          ?>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

   