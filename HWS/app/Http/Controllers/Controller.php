<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

use DB;
use Session;
use View;
use Hash;
use Auth;
use Excel;
use Mail;
use function Composer\Autoload\includeFile;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    private $razorpayId = "rzp_test_YMH7HKSwk4ggge";  //keyid
    private $razorpayKey = "03dc9CZLGBxj859NcnsBzzEc"; //key
    
    public function register_pub_back(Request $req)
    {
        
        //echo"hello";
         $name = $req->input('name');
        $mnumber = $req->input('mnumber');
        $email = $req->input('email');
        $pin = $req->input('pin');
        $password = $req->input('password');
        $address = $req->input('address');
        
        
        $data1 = array(
            'name'=>$name,
            'mnumber'=>$mnumber,
            'email'=>$email,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
        );
        DB::table('users')->insert($data1);
        
        
        
        $data2 = array(
            'name'=>$name,
            'mnumber'=>$mnumber,
            'email'=>$email,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
        );
        DB::table('direct_users')->insert($data2);
        
        
        return Redirect::to('/')->withMessage('Registred successfully'); 
    }
    
    
    
    public function user_request_back(Request $req)
    {
        
        //echo"hello";
        $type = $req->input('type');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $idetails = $req->input('idetails');
        $serialno = $req->input('serialno');
        $itemno = $req->input('itemno');
        
        
        include"conn.php";
        
        $query="select id from customer_request order by id desc limit 1";
        $stmt = $conn->query($query);
        while($row = $stmt->fetch())
        {
            $id = $row['id'];
        }
        $ids = $id+1;
        $idmerge = "00$ids";
        $email = Auth::user()->email;
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        $status = "New";
        $data1 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'issue'=>$idetails,
            'requested_id'=>$idmerge,
            'Customer_id'=> $email,
            'request_date'=>$defaud_date,
            'status'=>$status,
        );
        DB::table('customer_request')->insert($data1);
        
        
        $data2 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'issue'=>$idetails,
            'requested_id'=>$idmerge,
            'Customer_id'=> $email,
            'request_date'=>$defaud_date,
            'status'=>$status,
        );
        DB::table('direct_customer_request')->insert($data2);
        
        
        return Redirect::to('UDashboard')->withMessage('Request Submitted successfully');
    }
    
    
    
    public function ticket_view_b($id)
    {
        return view('ticket_view_view_cust', compact('id'));
    }
    
    public function closed_ticket_view_b($id)
    {
        return view('closed_ticket_view_view', compact('id'));
    }
    
    
    
    public function user_request_call_back_otp_bac(Request $req)
    {
        function createRandomOtp()
        {
            
            $chars = "01234567890123456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $pass = '' ;
            while ($i <= 6)
            {
                $num = rand() % 33;
                $tmp = substr($chars, $num, 1);
                $pass = $pass . $tmp;
                $i++;
            }
            return $pass;
        }
        $otp_rand = createRandomOtp();
        
        $mobile = $req->input('mobile');
        
        
        $data1 = array(
            'mobile_no'=>$mobile,
            'system_otp'=>$otp_rand,
        );
        DB::table('request_call_back')->insert($data1);
        
        include 'conn.php';
        $query_huddleid="select * from request_call_back where mobile_no='$mobile' order by id desc limit 1";
        $stmt_hid = $conn->query($query_huddleid);
        while($row_hid = $stmt_hid->fetch())
        {
            $id = $row_hid['id'];
        }
        
        //OTP message Functionality to be added
        
        //return Redirect::to('request_call_back_otp')->withMessage('OTP Sent, Enter OTP');
        return view('request_call_back_otp', compact('id'));
        
    }
    
    public function user_request_call_back_sub_bac(Request $req)
    {
        
        $user_otp = $req->input('user_otp');
        $id = $req->input('id');
        
        include 'conn.php';
        $sql = "SELECT count(*) FROM `request_call_back` WHERE system_otp = '$user_otp' AND id = '$id'";
        $result = $conn->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        
        //echo"rows: $number_of_rows";
        if($number_of_rows == 1)
        {
        
        
        
        DB::table('request_call_back')
        ->where('id',$req->id)
        ->update([
            'user_otp' => $user_otp,
            
        ]);
        
        return Redirect::to('request_call_back_registration')->withMessage('Enter OTP is correct');
        }
        else 
        {
            return Redirect::to('request_call_back')->withMessage('Entered OTP is Invalid');
        }
    }
    
    
    
    public function register_user_back(Request $req)
    {
        
        //echo"hello";
        $name = $req->input('name');
        $mnumber = $req->input('mnumber');
        $email = $req->input('email');
        $role = $req->input('role');
        $password = $req->input('password');
        $address = $req->input('address');
        
        
        $data1 = array(
            'name'=>$name,
            'mnumber'=>$mnumber,
            'email'=>$email,
            'role'=>$role,
            'password'=>Hash::make($password),
            'address'=>$address,
        );
        DB::table('users')->insert($data1);
        
        
        return Redirect::to('add_user')->withMessage('Added successfully');
    }
    
    
    
    
    public function Coordinator_request_back_back(Request $req)
    {
        
        //echo"hello";
        
        
        $cname = $req->input('cname');
        $mobile_no = $req->input('mobile_no');
        $emailid = $req->input('emailid');
        $pin = $req->input('pin');
        $address = $req->input('address');
        
        
        $type = $req->input('type');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $serialno = $req->input('serialno');
        $itemno = $req->input('itemno');
        $idetails = $req->input('idetails');
        
        $role = "User";
        include"conn.php";
        
        $password = $mobile_no;
        
        $data1 = array(
            'name'=>$cname,
            'mnumber'=>$mobile_no,
            'email'=>$emailid,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
            'role'=>$role,
        );
        DB::table('users')->insert($data1);
        
        
        $data3 = array(
            'name'=>$cname,
            'mnumber'=>$mobile_no,
            'email'=>$emailid,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
            'role'=>$role,
        );
        DB::table('cordinator_users')->insert($data3);
        
        
        $query="select id from customer_request order by id desc limit 1";
        $stmt = $conn->query($query);
        while($row = $stmt->fetch())
        {
            $id = $row['id'];
        }
        $ids = $id+1;
        $idmerge = "00$ids";
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        $status = "New";
        $data2 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'issue'=>$idetails,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'requested_id'=>$idmerge,
            'Customer_id'=> $emailid,
            'request_date'=>$defaud_date,
            'status'=>$status,
        );
        DB::table('customer_request')->insert($data2);
        
        $data4 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'issue'=>$idetails,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'requested_id'=>$idmerge,
            'Customer_id'=> $emailid,
            'request_date'=>$defaud_date,
            'status'=>$status,
        );
        DB::table('cordinator_customer_request')->insert($data4);
        
        $role = Auth::user()->role;
        
        if($role == "Coordinator")
        {
        return Redirect::to('Coordinator_register_request')->withMessage('Request Submitted successfully');
        }
        else if($role == "Service Engineer")
        {
            return Redirect::to('Service_Engineer_Dashboard')->withMessage('Request Submitted successfully');
        }
        else if($role == "Dealer")
        {
            return Redirect::to('Dealer_register_request')->withMessage('Request Submitted successfully');
        }
        
    }
    
    
    
    public function level1Eng_request_back_back(Request $req)
    {
        
        //echo"hello";
        
        
        $cname = $req->input('cname');
        $mobile_no = $req->input('mobile_no');
        $emailid = $req->input('emailid');
        $pin = $req->input('pin');
        $address = $req->input('address');
        
        
        $type = $req->input('type');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $serialno = $req->input('serialno');
        $itemno = $req->input('itemno');
        $idetails = $req->input('idetails');
        
        $did = $req->input('did');
        $dname = $req->input('dname');
        $dlocation = $req->input('dlocation');
        $dea_ddress = $req->input('dea_ddress');
        
        $role = "User";
        include"conn.php";
        
        $password = $mobile_no;
        
        $data1 = array(
            'name'=>$cname,
            'mnumber'=>$mobile_no,
            'email'=>$emailid,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
            'role'=>$role,
        );
        DB::table('users')->insert($data1);
        
        
        $data3 = array(
            'name'=>$cname,
            'mnumber'=>$mobile_no,
            'email'=>$emailid,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
            'role'=>$role,
        );
        DB::table('leve_engin_users')->insert($data3);
        
        
        $query="select id from customer_request order by id desc limit 1";
        $stmt = $conn->query($query);
        while($row = $stmt->fetch())
        {
            $id = $row['id'];
        }
        $ids = $id+1;
        $idmerge = "00$ids";
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        $status = "New";
       
        /*$data2 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'issue'=>$idetails,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'requested_id'=>$idmerge,
            'Customer_id'=> $emailid,
            'request_date'=>$defaud_date,
            'status'=>$status,
            'dealer_id'=>$did,
            'dealer_name'=>$dname,
            'dealer_location'=>$dlocation,
            'dealer_address'=>$dea_ddress,
        );
        DB::table('customer_request')->insert($data2);*/
        
        $data4 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'issue'=>$idetails,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'requested_id'=>$idmerge,
            'Customer_id'=> $emailid,
            'request_date'=>$defaud_date,
            'status'=>$status,
            'dealer_id'=>$did,
            'dealer_name'=>$dname,
            'dealer_location'=>$dlocation,
            'dealer_address'=>$dea_ddress,
        );
        DB::table('leveloeng_customer_request')->insert($data4);
        
        
        $path = "./hw_potos";
        $g_images=array();
        $files=$req->file('hardware_photos');
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            
            $data5 = array('ticket_id'=>$idmerge,'path'=>$name);
            DB::table('delear_photos')->insert($data5);
            
            //$destinationPath = public_path('/photogallery');
            $destinationPath = public_path($path);
            $file->move($destinationPath,$name);
            
            
            $g_images[]=$name;
        }
        
        $role = Auth::user()->role;
        
        
            return Redirect::to('Dealer_register_request')->withMessage('Request Submitted successfully');
        
        
    }
    
    
    public function ticket_view_back($id)
    {
        return view('ticket_view_all', compact('id'));
    }
    
    
    public function ticket_view_back_new($id)
    {
        return view('ticket_view_all_new', compact('id'));
    }
    
    public function ticket_view_view_co_back($id)
    {
        return view('co_ticket_view_view', compact('id'));
    }
    
    public function ticket_view_view_co_ship_back($id)
    {
        return view('co_ticket_view_view_co_shipp', compact('id'));
    }
    
    public function ticket_view_view_co_ship_del_back($id)
    {
        return view('co__del_ticket_view_view_co_shipp', compact('id'));
    }
    
    
    
    
    
    public function add_service_eng_back(Request $req)
    {
        
        //echo"hello";
        $name = $req->input('ename');
        $mnumber = $req->input('mobile_no');
        $email = $req->input('emailid');
        $role = "Service Engineer";
        $password = "se@123";
        $address = $req->input('address');
        
        $experties = $req->input('experties');
        $experience = $req->input('experience');
        
        //$pdocument = $req->input('pdocument');
        
        if ($req->hasFile('pdocument')) {
            $image1 = $req->file('pdocument');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name_path1 = $req->pdocument->getClientOriginalName();
            $destinationPath1 = public_path('/se_doc');
            $image1->move($destinationPath1, $name_path1);
        }
        //$edocument = $req->input('edocument');
        if ($req->hasFile('edocument')) {
            $image = $req->file('edocument');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name_path = $req->edocument->getClientOriginalName();
            $destinationPath = public_path('/se_doc');
            $image->move($destinationPath, $name_path);
        }
        
        
        $data1 = array(
            'name'=>$name,
            'mnumber'=>$mnumber,
            'email'=>$email,
            'role'=>$role,
            'password'=>Hash::make($password),
            'address'=>$address,
            'Expertise'=>implode("|", $experties),
            'Experience'=>$experience,
            'Personal_Documents'=>$name_path1,
            'Experience_Documents'=>$name_path,
        );
        DB::table('users')->insert($data1);
        
        
        return Redirect::to('Add_Service_Engineer')->withMessage('Added successfully');
    }
    
    
    public function edit_service_eng_bac($id)
    {
        return view('edit_service_eng_view', compact('id'));
    }
    
    
    
    public function upd_service_eng_back(Request $req)
    {
        
        //echo"hello";
        $name = $req->input('ename');
        $mnumber = $req->input('mobile_no');
        $email = $req->input('emailid');
        $address = $req->input('address');
        
        $experties = $req->input('experties');
        $experience = $req->input('experience');
        
        //$pdocument = $req->input('pdocument');
        
        if ($req->hasFile('pdocument')) {
            $image1 = $req->file('pdocument');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name_path1 = $req->pdocument->getClientOriginalName();
            $destinationPath1 = public_path('/se_doc');
            $image1->move($destinationPath1, $name_path1);
        }
        //$edocument = $req->input('edocument');
        if ($req->hasFile('edocument')) {
            $image = $req->file('edocument');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name_path = $req->edocument->getClientOriginalName();
            $destinationPath = public_path('/se_doc');
            $image->move($destinationPath, $name_path);
        }
        
       
        
        DB::table('users')
        ->where('id',$req->id)
        ->update([
            //'user_otp' => $user_otp,
            'name'=>$name,
            'mnumber'=>$mnumber,
            'email'=>$email,
            'address'=>$address,
            'Expertise'=>implode("|", $experties),
            'Experience'=>$experience,
            'Personal_Documents'=>$name_path1,
            'Experience_Documents'=>$name_path,
        ]);
        
        
        return Redirect::to('Add_Service_Engineer')->withMessage('Updated successfully');
    }
    
    
    
    
    public function assign_ticket_shipper_back(Request $req)
    {
        
        //echo"hello";
        $ticket_id = $req->input('ticket_id');
        $shipper = $req->input('shipper');
        $ship_exp = $req->input('ship_exp');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        $ticket_status = "Pending";
        $status = "pickup";
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            //'user_otp' => $user_otp,
            'shipper_id'=>$shipper,
            'shipper_exp'=>$ship_exp,
            'shipper_assigned_date'=>$defaud_date,
            'shipper_status'=>$status,
            'status'=>$ticket_status,
        ]);
        
        
        return Redirect::to('Coordinator_Dashboard')->withMessage('Shipper Assigned successfully');
    }
    
    
    
    public function assign_ticket_shipper_del_back(Request $req)
    {
        
        //echo"hello";
        $ticket_id = $req->input('ticket_id');
        $shipper = $req->input('shipper');
        $ship_exp = $req->input('ship_exp');
        $pup_date_time = $req->input('pup_date_time');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        $ticket_status = "Pending";
        $status = "pickup";
        
        //print_r($ticket_id);
        $count = count($ticket_id);
        //echo"$count";
        
        for($i=0;$i<$count;$i++)
        {
           // echo"$ticket_id[$i] <br>";
        
       
        
        DB::table('customer_request')
        ->where('requested_id',$ticket_id[$i])
        ->update([
            //'user_otp' => $user_otp,
            'shipper_id'=>$shipper,
            'shipper_exp'=>$ship_exp,
            'shipper_assigned_date'=>$defaud_date,
            'shipper_status'=>$status,
            'status'=>$ticket_status,
            'shipper_pickup_date'=>$pup_date_time,
            
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$ticket_id[$i])
        ->update([
            //'user_otp' => $user_otp,
            'shipper_id'=>$shipper,
            'shipper_exp'=>$ship_exp,
            'shipper_assigned_date'=>$defaud_date,
            'shipper_status'=>$status,
            'status'=>$ticket_status,
            'shipper_pickup_date'=>$pup_date_time,
            
        ]);
        }
        
        return Redirect::to('Coordinator_Dashboard')->withMessage('Shipper Assigned successfully');
        
    }
    
    
    public function shipper_ticket_view_back($id)
    {
        return view('shipper_ticket_view_view', compact('id'));
    }
    
    
    public function ticket_shipper_submit_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        
        $path = "./hw_potos";
        $g_images=array();
        $files=$req->file('hardware_photos');
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            
            $data2 = array('ticket_id'=>$ticket_id,'path'=>$name);
            DB::table('shipper_photos')->insert($data2);
            
            //$destinationPath = public_path('/photogallery');
            $destinationPath = public_path($path);
            $file->move($destinationPath,$name);
            
            
            $g_images[]=$name;
        }
        
        //$status = "Closed";
        $status = "In-Transit";
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'shipper_status'=>$status,
            'shipper_closed_date'=>$defaud_date,
        ]);
        
        return Redirect::to('Shipper_Dashboard')->withMessage('Ticket Updated successfully');
        
        
    }
    
    
    
    public function intransit_view_back($id)
    {
        return view('intransit_ticket_view_view', compact('id'));
    }
    
    
    public function ticket_shipper_close_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $shipper_remarks = $req->input('shipper_remarks');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        $status = "Closed";
        $status1 = "Pending";
        
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'shipper_status'=>$status,
            'shipper_closed_date'=>$defaud_date,
            'shipper_remarks'=>$shipper_remarks,
            'status'=>$status1,
            
        ]);
        
        return Redirect::to('Shipper_Dashboard')->withMessage('Ticket Closed successfully');
    }
    
    
    public function service_eng_assing_back($id)
    {
        return view('service_eng_assing_view', compact('id'));
    }
    
    
    
    public function service_eng_assigning_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $seng_id = $req->input('seng_id');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
       
        $status1 = "Pending";
        $status = "Pending";
        
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'service_eng_status'=>$status,
            'service_eng_id'=>$seng_id,
            'service_eng_assign_date'=>$defaud_date,
            'status'=>$status1,
            
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'service_eng_status'=>$status,
            'service_eng_id'=>$seng_id,
            'service_eng_assign_date'=>$defaud_date,
            'status'=>$status1,
            
        ]);
        
        return Redirect::to('Coordinator_Dashboard')->withMessage('Service Engineer Assigned successfully');
    }
    
    
    public function s_eng_ticket_view_back($id)
    {
        return view('service_eng_ticket_view', compact('id'));
    }
    
    //
    
    public function service_eng_update_issue_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $actual_issue = $req->input('actual_issue');
        $cost_inv = $req->input('cost_inv');
        $ac_iss_det = $req->input('ac_iss_det');
        //$ = $req->input('');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        
        //$status1 = "On Progress";
        //$status = "on going";
        $status = "Closed";
        
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'service_eng_status'=>$status,
            'actual_issue'=>$actual_issue,
            'cost_inv'=>$cost_inv,
            'service_eng_remarks'=>$ac_iss_det,
            
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'service_eng_status'=>$status,
            'actual_issue'=>$actual_issue,
            'cost_inv'=>$cost_inv,
            'service_eng_remarks'=>$ac_iss_det,
            
        ]);
        
        return Redirect::to('Service_Engineer_Dashboard')->withMessage('Ticket Updated successfully');
    }
    
    
    public function ticket_app_rej_back($id)
    {
        return view('ticket_app_rej_view', compact('id'));
    }
    
    
    
    public function ticket_approve_reject_cust_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $Approve = $req->input('Approve');
        $Reject = $req->input('Reject');
        $customer_remarks = $req->input('customer_remarks');
        
        
        echo"$ticket_id,$Approve,$Reject";

        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        if($Approve == "Approve")
        {
        $status1 = "On Progress";
        $status2 = "on going";
        
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'status'=>$status1,
            'customer_status'=>$Approve,
            'cust_app_reg_date'=>$defaud_date,
            'service_eng_status'=>$status2,
            'customer_remarks'=>$customer_remarks,
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'status'=>$status1,
            'customer_status'=>$Approve,
            'cust_app_reg_date'=>$defaud_date,
            'service_eng_status'=>$status2,
            'customer_remarks'=>$customer_remarks,
        ]);
        
        return Redirect::to('Coordinator_Dashboard')->withMessage('Ticket Approved successfully');
        }
        else if($Reject == "Reject")
        {
            $status1 = "Reject";
            DB::table('customer_request')
            ->where('requested_id',$req->ticket_id)
            ->update([
                'status'=>$status1,
                'customer_status'=>$Reject,
                'cust_app_reg_date'=>$defaud_date,
                'customer_remarks'=>$customer_remarks,
            ]);
            return Redirect::to('Coordinator_Dashboard')->withMessage('Ticket Rejected successfully');
        }
        
        
        
    }
    
    
    
    public function se_ticket_close_back($id)
    {
        return view('se_ticket_close_view', compact('id'));
    }
    
    
    
    public function service_eng_close_issue_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $close_remarks = $req->input('close_remarks');
        
        //$ = $req->input('');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        
        //$status1 = "On Progress";
        //$status = "on going";
        $status = "Closed";
        
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'service_eng_status'=>$status,
            'se_closed_reamrks'=>$close_remarks,
            'se_closed_date'=>$defaud_date,
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'service_eng_status'=>$status,
            'se_closed_reamrks'=>$close_remarks,
            'se_closed_date'=>$defaud_date,
        ]);
        
        return Redirect::to('Service_Engineer_Dashboard')->withMessage('Ticket Closed successfully');
    }
    
    
    
    public function service_eng_clo_upd_cor_back($id)
    {
        return view('service_eng_clo_upd_cor_view', compact('id'));
    }
    
    
    
    public function assign_ticket_shipper_delivery_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $shipper = $req->input('shipper');
        
        //$ = $req->input('');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        
        //$status1 = "On Progress";
        //$status = "on going";
        $status = "deliver";
        
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'del_shipper_id'=>$shipper,
            'del_shipper_date'=>$defaud_date,
            'del_shipper_status'=>$status,
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'del_shipper_id'=>$shipper,
            'del_shipper_date'=>$defaud_date,
            'del_shipper_status'=>$status,
        ]);
        
        return Redirect::to('Coordinator_Dashboard')->withMessage('Shipper Assigned for Delivery successfully');
    }
    
    
    public function shipper_deliver_dev_back($id)
    {
        return view('shipper_deliver_dev_view', compact('id'));
    }
    
    
    
    public function shipper_delivery_close_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        
        $path = "./hw_potos";
        $g_images=array();
        $files=$req->file('hardware_photos');
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            
            $data2 = array('ticket_id'=>$ticket_id,'path'=>$name);
            DB::table('shipper_photos_del')->insert($data2);
            
            //$destinationPath = public_path('/photogallery');
            $destinationPath = public_path($path);
            $file->move($destinationPath,$name);
            
            
            $g_images[]=$name;
        }
        
        $status = "Closed";
        //$status = "In-Transit";
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        DB::table('customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'del_shipper_status'=>$status,
            'del_shipper_closed_date'=>$defaud_date,
        ]);
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'del_shipper_status'=>$status,
            'del_shipper_closed_date'=>$defaud_date,
        ]);
        
        return Redirect::to('Shipper_Dashboard')->withMessage('Ticket Closed successfully');
        
        
    }
    
    
    public function cb_user_request_back(Request $req)
    {
        $cname = $req->input('cname');
        $mobile_no = $req->input('mobile_no');
        $emailid = $req->input('emailid');
        $pin = $req->input('pin');
        $address = $req->input('address');
        
        $type = $req->input('type');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $serialno = $req->input('serialno');
        $itemno = $req->input('itemno');
        $idetails = $req->input('idetails');
        
        $role = "User";
        include"conn.php";
        
        $password = $mobile_no;
        
        $data1 = array(
            'name'=>$cname,
            'mnumber'=>$mobile_no,
            'email'=>$emailid,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
            'role'=>$role,
        );
        DB::table('users')->insert($data1);
       
        
        $data2 = array(
            'name'=>$cname,
            'mnumber'=>$mobile_no,
            'email'=>$emailid,
            'pin'=>$pin,
            'password'=>Hash::make($password),
            'address'=>$address,
            'role'=>$role,
        );
        DB::table('rcallback_users')->insert($data2);
        
        
        $query="select id from customer_request order by id desc limit 1";
        $stmt = $conn->query($query);
        while($row = $stmt->fetch())
        {
            $id = $row['id'];
        }
        $ids = $id+1;
        $idmerge = "00$ids";
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        $status = "New";
        $data3 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'issue'=>$idetails,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'requested_id'=>$idmerge,
            'Customer_id'=> $emailid,
            'request_date'=>$defaud_date,
            'status'=>$status,
        );
        DB::table('customer_request')->insert($data3);
        
        
        $data4 = array(
            'type'=>$type,
            'brand'=>$brand,
            'model'=>$model,
            'issue'=>$idetails,
            'serialno'=>$serialno,
            'itemno'=>$itemno,
            'requested_id'=>$idmerge,
            'Customer_id'=> $emailid,
            'request_date'=>$defaud_date,
            'status'=>$status,
        );
        DB::table('rcallback_customer_request')->insert($data4);
        
        return Redirect::to('request_call_back')->withMessage('Ticket Created successfully');
    }
    
    
    public function add_dealers_data(Request $req)
    {
        
        //echo"hello";
        $dealer_name = $req->input('dealer_name');
        $contact_person = $req->input('contact_person');
        $mobile = $req->input('mobile');
        $email = $req->input('email');
        $city = $req->input('city');
        $pin_code = $req->input('pin_code');
        $address = $req->input('address');
        $status = $req->input('status');
        $dlocation = $req->input('dlocation');
        $loeng = $req->input('loeng');
        
        $data1 = array(
            'dealer_name'=>$dealer_name,
            'contact_person'=>$contact_person,
            'mobile'=>$mobile,
            'email'=>$email,
            'city'=>$city,
            'pin_code'=>$pin_code,
            'address'=>$address,
            'status'=>$status,
            'dlocation'=>$dlocation,
            'loeng'=>$loeng,
        );
        
        DB::table('dealers')->insert($data1);
        
        return Redirect::to('add_dealers')->withMessage('Dealer Added Successfully');
    }
    
    
    public function del_tick_view_mul_back($id)
    {
        
        $exp = explode("|", $id);
        
        $del_id = $exp[0];
        $del_loc = $exp[1];
        //echo"$del_id,$del_loc ";

        $dealers = DB::select("select * from leveloeng_customer_request where dealer_location='$del_loc' AND dealer_id='$del_id'");
        
        return view('view_dealer_requests', ['dealers'=>$dealers]);
    
    }
    
    public function view_all_dealer_view($id)
    {
        return view('dealer_request_view', compact('id'));
    }
    
    public function del_ship_pickup_view_back($id)
    {
        
        $exp = explode("|", $id);
        
        $del_id = $exp[1];
         $del_loc = $exp[0];
         
        //echo"hello $del_id,$del_loc ";
         $uid = Auth::user()->id;
         
        $dealers1 = DB::select("select * from leveloeng_customer_request where dealer_location='$del_loc' AND dealer_id='$del_id' AND shipper_status='pickup' AND shipper_id='$uid'");
        
        //return view('view_dealer_requests', ['dealers'=>$dealers]);
        
        return view('del_ship_pickup_view_table', ['dealers'=>$dealers1]);
    }
    
    
    public function dealer_request_view_pickup_view_back($id)
    {
        return view('dealer_request_view_pickup_view_view', compact('id'));
    }
    
   // 
    public function delaer_ship_req_sub_back(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        
       
        
        //$status = "Closed";
        $status = "In-Transit";
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'shipper_status'=>$status,
            'shipper_closed_date'=>$defaud_date,
        ]);
        
        return Redirect::to('Shipper_Dashboard')->withMessage('Ticket Updated successfully');
    }
    
    public function intransit_view_back_two($id)
    {
        return view('intransit_ticket_view_view_two', compact('id'));
    }
    
    
    public function ticket_shipper_close_back_two(Request $req)
    {
        
        $ticket_id = $req->input('ticket_id');
        $shipper_remarks = $req->input('shipper_remarks');
        
        date_default_timezone_set ("Asia/Calcutta");
        $defaud_date = date("Y-m-d h:i:s");
        
        $status = "Closed";
        $status1 = "Pending";
        
        DB::table('leveloeng_customer_request')
        ->where('requested_id',$req->ticket_id)
        ->update([
            'shipper_status'=>$status,
            'shipper_closed_date'=>$defaud_date,
            'shipper_remarks'=>$shipper_remarks,
            'status'=>$status1,
            
        ]);
        
        return Redirect::to('Shipper_Dashboard')->withMessage('Ticket Closed successfully');
    }
    
    public function generate_customer_report_back(Request $req)
    {
        $name = $req->input('name');
        $mnumber = $req->input('mnumber');
        $from_date = $req->input('from_date');
        $to_date = $req->input('to_date');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $issue = $req->input('issue');
        $status = $req->input('status');
        
        return view('customer_wise_report_view_view', compact('name','mnumber','from_date','to_date','brand','model','issue','status'));
    }
    
    public function generate_dealer_report_back(Request $req)
    {
        $dealer_name = $req->input('dealer_name');
        $dealer_location = $req->input('dealer_location');
        $from_date = $req->input('from_date');
        $to_date = $req->input('to_date');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $issue = $req->input('issue');
        $status = $req->input('status');
        
        return view('dealer_wise_report_view_view', compact('dealer_name','dealer_location','from_date','to_date','brand','model','issue','status'));
    }
    
    public function generate_service_eng_report_back(Request $req)
    {
        $from_date = $req->input('from_date');
        $to_date = $req->input('to_date');
        $brand = $req->input('brand');
        $model = $req->input('model');
        $issue = $req->input('issue');
        $status = $req->input('status');
        
        return view('service_eng_wise_report_view_view', compact('from_date','to_date','brand','model','issue','status'));
    }
    
    public function generate_shipper_report_back(Request $req)
    {
        $from_date = $req->input('from_date');
        $to_date = $req->input('to_date');
        $shipment_type = $req->input('shipment_type');
        $shipment_from = $req->input('shipment_from');
        $issue = $req->input('issue');
        $status = $req->input('status');
        
        return view('shipper_wise_report_view_view', compact('from_date','to_date','shipment_type','shipment_from','issue','status'));
    }
    
    public function generate_sla_report_back(Request $req)
    {
        $from_date = $req->input('from_date');
        $to_date = $req->input('to_date');
        $issue_category = $req->input('issue_category');
        $status = $req->input('status');
        
        return view('sla_wise_report_view_view', compact('from_date','to_date','issue_category','status'));
    }
    
    public function generate_detail_report_back(Request $req)
    {
        $from_date = $req->input('from_date');
        $to_date = $req->input('to_date');
        $c_name = $req->input('c_name');
        $issue_category = $req->input('issue_category');
        $shipper_pu = $req->input('shipper_pu');
        $service_eng = $req->input('service_eng');
        $cost_inv = $req->input('cost_inv');
        $status = $req->input('status');
        $shipper_del = $req->input('shipper_del');
        
        return view('detail_wise_report_view_view', compact('from_date','to_date','c_name','issue_category','shipper_pu','service_eng','cost_inv','status','shipper_del'));
    }
    
    
    public function Initiate(Request $request)
    {
        // Generate random receipt id
        $receiptId = Str::random(20);
        
        // Create an object of razorpay
        $api = new Api($this->razorpayId, $this->razorpayKey);
        
        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $request->all()['amount'] * 100,
            'currency' => 'INR'
        )
            );
        // Return response on payment page
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'amount' => $request->all()['amount'] * 100,
            'name' => $request->all()['name'],
            'currency' => 'INR',
            'email' => $request->all()['email'],
            'contactNumber' => $request->all()['contactNumber'],
            'address' => $request->all()['address'],
            'description' => 'Testing description',
        ];
        
        // Let's checkout payment page is it working
        return view('payment-page',compact('response'));
        
        //return view('sla_wise_report_view_view', compact('from_date','to_date','issue_category','status'));
    }
    
    
    
    
    public function Complete(Request $request)
    {
        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
            );
        
        // If Signature status is true We will save the payment response in our database
        // In this tutorial we send the response to Success page if payment successfully made
        if($signatureStatus == true)
        {
            // You can create this page
            return view('payment-success-page');
        }
        else{
            // You can create this page
            return view('payment-failed-page');
        }
    }
    
    // In this function we return boolean if signature is correct
    private function SignatureVerify($_signature,$_paymentId,$_orderId)
    {
        try
        {
            // Create an object of razorpay class
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
        }
    }
    
    
}
