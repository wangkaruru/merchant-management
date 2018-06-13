<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use Form;
use Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class GeneralController extends Controller
{
    //constructor
	public function __construct(){
	 $this->middleware('auth', ['except' => ['get_token','get_code', 'login', 'password_matches', 'logout']]);
	}

public function test2(){

}

public function get_token(){
		//log::info('stage0');

		$f=DB::table('configs')->where('config_name','wallet_api_token')->first();
		$last=date("Y-m-d H:i:s",strtotime('-'.$f->config_val2.' minutes'));
		$dec1=@json_decode($f->config_val1);

		if($f && @$dec1->access_token && $f->date_updated>$last ){//meaning it was last updated less than max specified minutes.
			
			//log::info('stage1');
			return $f->config_val1;
		}

		//meaning token  likely to be expired so fetch another and keep in db.
	    $apiurl =Config::get('api_url.api_url');		
		$url='oauth/access_token';
        $transaction = "CreateAccessToken";

		/*$username = "csm@directcore.com";
		$password = "123456";
		$client_id = "f3d259ddd3ed8ff3843839b";
		$client_secret = "4c7f6f8fa93d59c45502c0ae8c4a95b";*/
		//log::info('stage2');

        $username = env('API_USERNAME'); 
		$password = env('API_PASSWORD'); 
		$client_id = env('API_CLIENT_ID');
		$client_secret =  env('API_CLIENT_SECRET');
		
		$data = array('username' => $username,'password' => $password,'client_id' => $client_id,'client_secret' => $client_secret,'grant_type' => 'password');		


		$data_string = json_encode($data);
	    $ch = curl_init($apiurl.$url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	     $result = curl_exec($ch);

	     //log::info('stage3: '.$result);

	    $res=json_decode($result);
	    $ac=@$res->access_token;
	    if($ac){
	    	$k=DB::table('configs')
	        ->where('config_name','wallet_api_token')
	        ->update([
	        	'date_updated'=>date('Y-m-d H:i:s'),
	        	'config_val1'=>$result,
	        	]);

	        //log::info('stage4');
	     }
	    // log::info('stage5');
		return $result;


}//close fxn 


	//login the  users
	public function login(Request $request){		

		
		$username=trim(input::get('username'));
		$password=(input::get('password'));
	
		//get client ip for logging
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		  } 
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		  }
		 else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		 }

 		if(!isset($ip)){ $ip="unknown ip"; }

		 // validate the info, create rules for the inputs
		$input = Input::all();
		$rules = array(
        'username' => 'Required',
        'password'     => 'Required',
       
		);	
				
		$hashedPassword = Hash::make($password);
		
		$v = Validator::make($input, $rules);

		if($v->passes()) {

		

			$auth = auth()->guard('customers');
	   	    $credentials = [
	        'user_id' => $username,
	        'password' => $password,
	    	];

	    if( $auth->attempt($credentials) ){ //customer exists in 
	    	
		    $p=DB::table('customers')->where('user_id','=',$username)->where('verified','=',1)->get();
		    
		    //confirm code				
				$otp=input::get('code');
				if( !Hash::check($otp, $p[0]->code) || date('Y-m-d H:i:s')>$p[0]->code_date){
					Session::flush();		
							
					return redirect('/login')->with('status1', 'Invalid code');
				}

			$access_token=json_decode($this->get_token())->access_token;
			$apiurl =Config::get('api_url.api_url');
			$msisdn=$p[0]->msisdn;
		    $dec= json_decode(file_get_contents("".$apiurl."GetCustomerByMsisdn?access_token=".$access_token."&customerphone=".$msisdn));

	  		$b= json_decode(file_get_contents("".$apiurl."GetBillerByCustomerId?access_token=".$access_token."&customer_id=".@$dec->customer_id));
	        if(@$b->has_b2c){
	            $biller=$b->has_b2c;
	        }else{
	            $biller=0;
	        }
	        $biller_number=@$b->biller_number;
	        //is agent
	        if($dec->customer_type_id2 && $dec->showinui2){
	            $is_agent=1;
	        }else{
	            $is_agent=0;
	        }

	        //is biller
	        if($dec->customer_type_id3 && $dec->showinui3){
	            $is_biller=1;
	        }else{
	            $is_biller=0;
	        }

	        //is customer- cst services allowed
	        if($dec->customer_type_id1 && $dec->showinui1){
	            $is_customer=1;
	        }else{
	            $is_customer=0;
	        }
					//user is valid
				$status=200;
				$log_action = DB::insert('insert into partner_loginattempts (username, password,clientip,status) values (?,?,?,?)', [$username,$hashedPassword,$ip, $status]);
				 // user is  valid and logged in.rom users where is_active = ? AND email= ? ', [ 1,'test@directcore.com' ]);	

				$cst=$p;
				session(['ref_cid'=>$dec->customer_id]);
                session(['language_id'=>$dec->language_id]);
                session(['user_id'=>$cst[0]->user_id]);
				session(['ref_msisdn'=>$dec->msisdn]);
			    session(['ref_name'=>($dec->first_name." ".$dec->last_name)]);
			    session(['is_customer'=>$is_customer]);
                session(['is_agent'=>$is_agent]);
                session(['is_biller'=>$is_biller]);
                session(['has_b2c'=>$biller]);
                session(['ref_biller_no'=>$biller_number]);
                

               
				return redirect('/partner');								

			} else {
				$status=500;		
				$log_action = DB::insert('insert into partner_loginattempts (username, password,clientip,status) values (?,?,?,?)', [$username,$hashedPassword,$ip, $status]);

				//wrong pass or username
				return redirect('/login')->with('status1', 'Wrong  username or password');	

			}				

		 	
		} else {
			$status=500;		
			$log_action = DB::insert('insert into partner_loginattempts (username, password,clientip,status) values (?,?,?,?)', [$username,$hashedPassword,$ip, $status]);

		 	return redirect('/login')->with('status1', ' username and  password is required');
		}
	

	}// close login fxn


	public function get_code(){

		$username=input::get('username');
		$password=input::get('password');
		$k=DB::table('customers')->where('user_id',$username)->first();
		if($k && @Hash::check($password,$k->password)){
			//user exists and pass matches 
			//generate otp, update db and  send via sms and give feedback

			$otp=rand(1001,9999);
			
			$max_time=date('Y-m-d H:i:s', strtotime("+1 minute"));

			//log::info("otp: ".$otp."   expiry".$max_time);

			DB::table('customers')
			  ->where('id',$k->id)
			  ->update([
			  	'code'=>Hash::make($otp),
			  	'code_date'=>$max_time,
			  	]);
			//send sms

			  $lg_id=$k->language_id;
			  $mr=DB::table('customer_message_templates')->select('message')->where('language_id','=',$lg_id)->where('message_id','=',3)->first();
              $msg= str_replace('{code}', $otp ,$mr->message);
			  $to=$k->msisdn;
			  @app('App\Http\Controllers\PartnerController')->send_sms($to, $msg);
			  
			  $finale['success']=1;

		}else{
			$finale['success']=0;
			$finale['msg']="Wrong username or password";
		}

		return response()->json($finale);

	}//close fxn 

public function password_matches($fed_in, $existing){	
	if(Hash::check($fed_in, $existing)){
		return 1;
	}else{
		return 0;
	}
}//close fxn 


	public function logout(){
		Session::flush();
		return redirect('/login');
	}




	//load masterview dashboard
	public function dashboard(){		
		return view('masterview');
	}
	//fxn to check permissions if sm1 has permissions or not
  public function check_user_permission($p_id){
		$user_id=session('web_user_id');
		$user_roles =  DB::select( 'select role_id from user_roles where user_id = ?', [$user_id] );	
		$finale['allowed']=false;
		$all_p=[];
		
		foreach ($user_roles as $key => $role) {
			$perm = DB::select( 'select permission_id from roles_permissions where role_id = ?', [$role->role_id] );
			//echo json_encode($perm); exit();
			foreach ($perm as  $p) {				
				array_push($all_p, $p->permission_id);
			}			
		}

		if(in_array($p_id, $all_p) ){
				$finale['allowed']=true;
		}
		return $finale['allowed'];

 }//close fxn 

 public function get_all_permissions(){
 	$user_id=session('web_user_id');
		$user_roles =  DB::select( 'select role_id from user_roles where user_id = ?', [$user_id] );	
		$finale['allowed']=false;
		$all_p=[];
		
		foreach ($user_roles as $key => $role) {
			$perm = DB::select( 'select permission_id from roles_permissions where role_id = ?', [$role->role_id] );
			//echo json_encode($perm); exit();
			foreach ($perm as  $p) {				
				array_push($all_p, $p->permission_id);
			}			
		}

		return $all_p;

 }//close fxn 


	//fxn to all allowed  tasks permissions and return them
	public function Get_allowed_tasks_ids($user_id, $web_user_type){
		//array_unique($input);
		$ids=",";
		if($web_user_type){
			$all =  DB::select('select id from tasks where allowed_web_user_types_ids LIKE ? AND  allowed_web_user_ids LIKE ? ', [ '%,1,%', '%'.$user_id.'%']);	
			foreach ($all as $key => $value) {
				$ids=$ids.$value->id.",";
			}
			return $ids;
		}
	}

	//fxn to all allowed  module permissions and return them
	public function Get_allowed_modules_ids($user_id, $web_user_type){
		$ids=",";
		if($web_user_type==1){
			$all =  DB::select('select distinct(module_id) from tasks where allowed_web_user_types_ids LIKE ? AND  allowed_web_user_ids LIKE ? ', [ '%,1,%', '%'.$user_id.'%']);	
			foreach ($all as $key => $value) {
				$ids=$ids.$value->module_id.",";
			}
			return $ids;
		}
	}

	//keep logs of all things happening 
	public function keep_logs($user_id, $web_user_type_id, $task_id, $message, $other_details, $status_code){
		$log_action = DB::insert('insert into logs (user_id, web_user_type_id, task_id, message, other_details,status_code) values (?,?,?,?,?,?)', [$user_id, $web_user_type_id, $task_id, $message, $other_details,$status_code]);	
	}

	//check if customer exists if he does return customer_id
	public function check_if_customer_exists($msisdn, $access_token=null){
		
 		$apiurl =Config::get('api_url.api_url');
 		$link="GetCustomerByMsisdn?customerphone=".$msisdn;
 		
 		if(!empty(trim($msisdn))){
 			$result=$this->do_get($apiurl.$link,$access_token,1);
 			$dec=json_decode($result);

 			if($dec->status_code && $dec->status_code==200 && $dec->customer_id){
 				return $dec->customer_id;
 			}else{
 				return 0;
 			}

 		}else{// msisdn empty
 			return 0;
 		}
	

	}//close fxn 


	//check if customer exists if he does return customer_id
	public function check_if_customer_is_agent($msisdn, $access_token=null){
		
 		$apiurl =Config::get('api_url.api_url');
 		$link="GetCustomerByMsisdn?customerphone=".$msisdn;
 		
 		if(!empty(trim($msisdn))){
 			$result=$this->do_get($apiurl.$link,$access_token,1);
 			$dec=json_decode($result);

 			if($dec->status_code && $dec->status_code==200 && $dec->customer_id){
 				if(@$dec->customer_type_id2){
 					return $dec->customer_id;
 				}else{
 					return 0;
 				}
 			}else{
 				return 0;
 			}

 		}else{// msisdn empty
 			return 0;
 		}
	

	}//close fxn 

//check if customer is an agent. if he is return customer_id
	public function check_if_customer_is_agent2($msisdn, $customer_id=null){
 		$apiurl =Config::get('api_url.api_url');
 		if(isset($msisdn) && $msisdn!==null && $customer_id==null){
 			 $original= file_get_contents("".$apiurl."GetAllCustomerDetailsByMsisdn/".$msisdn); 			
 			 $reply=json_decode($original);
 		   if(strlen($original)>45){ 
			if(($reply[0]->status_code) && ($reply[0]->status_code)==200 && ($reply[0]->customer_id)  ){
				$decoded = json_decode($original); 
			 	$k= $decoded[0]->customer_types; 				
				$ids=[];//store customer ids for searching
				$c=count(array_keys($k));
				for ($i=0; $i<$c; $i++) { 
				    array_push($ids, $k[$i]->customer_type_id);  
				}

				if(in_array(2, $ids)){//search here
					$finale=$reply[0]->customer_id;
				}else{
				   $finale=false;
				}

			return $finale;

			}// couldnt decode so customer doesnt exist
			else{
				return false;
			}
		 }
		else{
				return false;
			}
 		}
 		elseif(isset($customer_id) && $customer_id!==null){
 			$original= json_decode(file_get_contents("".$apiurl."GetCustomerByCustomerId/".$customer_id));
			 $reply=json_decode($original);
			if(($reply[0]->status_code) && ($reply[0]->status_code)==200 && ($reply[0]->customer_id)  ){
				$decoded = json_decode($original);

			 	$k= $decoded[0]->customer_types;
				$ids=[];
				$c=count(array_keys($k));
				for ($i=0; $i<$c; $i++) { 
				    array_push($ids, $k[$i]->customer_type_id);  
				}

				if(in_array(2, $ids)){
					$finale=$reply[0]->customer_id;
				}else{
				   $finale=false;
				}

			return $finale;

			}else{
				return false;
			}
 		}
 		else{
 			return false;
 		}
		

	}//close fxn 
	public function check_if_customer_is_biller($msisdn, $access_token=null){
		
 		$apiurl =Config::get('api_url.api_url');
 		$link="GetCustomerByMsisdn?customerphone=".$msisdn;
 		
 		if(!empty(trim($msisdn))){
 			$result=$this->do_get($apiurl.$link,$access_token,1);
 			$dec=json_decode($result);

 			if($dec->status_code && $dec->status_code==200 && $dec->customer_id){
 				if(@$dec->customer_type_id3){
 					return $dec->customer_id;
 				}else{
 					return 0;
 				}
 			}else{
 				return 0;
 			}

 		}else{// msisdn empty
 			return 0;
 		}
	

	}//close fxn 

//check if customer is a biller. if he, return customer_id
	public function check_if_customer_is_biller2($msisdn, $customer_id=null){
 		$apiurl =Config::get('api_url.api_url');
 		if(isset($msisdn) && $msisdn!==null && $customer_id==null){
 			 $original= file_get_contents("".$apiurl."GetAllCustomerDetailsByMsisdn/".$msisdn); 			
 			 $reply=json_decode($original);
 		   if(strlen($original)>45){ 
			if(($reply[0]->status_code) && ($reply[0]->status_code)==200 && ($reply[0]->customer_id)  ){
				$decoded = json_decode($original); 
			 	$k= $decoded[0]->customer_types; 				
				$ids=[];//store customer ids for searching
				$c=count(array_keys($k));
				for ($i=0; $i<$c; $i++) { 
				    array_push($ids, $k[$i]->customer_type_id);  
				}

				if(in_array(3, $ids)){//search here
					$finale=$reply[0]->customer_id;
				}else{
				   $finale=false;
				}

			return $finale;

			}// couldnt decode so customer doesnt exist
			else{
				return false;
			}
		 }
		else{
				return false;
			}
 		}
 		elseif(isset($customer_id) && $customer_id!==null){
 			$original= json_decode(file_get_contents("".$apiurl."GetCustomerByCustomerId/".$customer_id));
			 $reply=json_decode($original);
			if(($reply[0]->status_code) && ($reply[0]->status_code)==200 && ($reply[0]->customer_id)  ){
				$decoded = json_decode($original);

			 	$k= $decoded[0]->customer_types;
				$ids=[];
				$c=count(array_keys($k));
				for ($i=0; $i<$c; $i++) { 
				    array_push($ids, $k[$i]->customer_type_id);  
				}

				if(in_array(3, $ids)){
					$finale=$reply[0]->customer_id;
				}else{
				   $finale=false;
				}

			return $finale;

			}else{
				return false;
			}
 		}
 		else{
 			return false;
 		}
		

	}//close fxn 

//check if customer exists, get customer id,  status, and customer_types
public function get_basic_details($msisdn, $access_token=null){

	$apiurl =Config::get('api_url.api_url');
 	$link="GetCustomerByMsisdn?customerphone=".$msisdn;
 		$finale=[];
 		$finale['status']=0;
 		$finale['customer_exists']=0;
 		$finale['customer_id']=0;
 		$finale['customer_types']=[];

 		if(!empty(trim($msisdn))){ 			

 			$result=$this->do_get($apiurl.$link,$access_token,1);
 			$dec=json_decode($result);

 			if($dec->status_code && $dec->status_code==200 && $dec->customer_id){
 				$finale['status']=1;
			 	$finale['customer_exists']=1;
				$finale['customer_id']=$dec->customer_id;

				if($dec->customer_type_id1){
					array_push($finale['customer_types'], $dec->customer_type_id1);
				}	
				if($dec->customer_type_id2){
					array_push($finale['customer_types'], $dec->customer_type_id2);
				}
				if($dec->customer_type_id3){
					array_push($finale['customer_types'], $dec->customer_type_id3);
				}			
			
 			  return $finale;
 			}else{
 				return $finale;
 			}

 		}else{// msisdn empty
 			return $finale;
 		}



 }//close fxn


//get the phone numbers of multiple  customer ids (in a comma separated customers ids).
	public function get_msisdns_from_cids($cids, $access_token=null){
		$apiurl =Config::get('api_url.api_url');
		$finale=[];
 		$ids = explode(',', $cids);

		$access_token=json_decode($this->get_token())->access_token;
 	

 		for($i=1; $i<count($ids);$i++) {
 			//Log::warning('key no:'.$i."is:".$ids[$i]);
 			if(trim($ids[$i])!==null || !empty( trim($ids[$i]) )){
 			
 				$link=$apiurl."GetCustomerByCustomerId?customer_id=".$ids[$i];

 				$reply= json_decode($this->do_get($link,$access_token,1));
 				
				if(($reply->status_code) && ($reply->status_code)==200 && ($reply->customer_id) ){
					array_push($finale, $reply->msisdn);
				}else{
					array_push($finale, "unknown");
				}
 			}
 		}//end for each
 		/* Log::info('\n phones are : '.$finale);*/
 		 return $finale; 		

	}//close fxn 

public function get_msisdns_from_cids_new($cids){
		$apiurl =Config::get('api_url.api_url');
		$finale=[];
 		$ids = explode(',', $cids);

 	

 		for($i=1; $i<count($ids);$i++) {
 			//Log::warning('key no:'.$i."is:".$ids[$i]);
 			if(trim($ids[$i])!==null || !empty( trim($ids[$i]) )){
 				//Log::info('call is  :'."".$apiurl."GetCustomerByCustomerId/".$ids[$i]);
	 			$reply= json_decode(file_get_contents("".$apiurl."GetCustomerByCustomerId/".$ids[$i]));

				if(($reply->status_code) && ($reply->status_code)==200 && ($reply->customer_id) ){
					array_push($finale, $reply->msisdn);
				}else{
					array_push($finale, "unknown");
				}
 			}
 		}//end for each
 		/* Log::info('\n phones are : '.$finale);*/
 		 return $finale; 		

	}//close fxn 


}/*end of class*/

