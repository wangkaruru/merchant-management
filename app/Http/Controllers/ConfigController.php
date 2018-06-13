<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

class ConfigController extends Controller{

	public function __construct(){ 
		$this->middleware('auth');

	}

// 
	public function test(){

 	 return $t="Test ok!";
	}


//This function contacts general controller and obtains access token
public function get_token(){
	$val=app('App\Http\Controllers\GeneralController')->get_token();
	return $val;
}
public function do_get($full_url, $access_token=null){
	return file_get_contents($full_url);

}
//check permissions
public function has_permission_for($p_id){
	$result=app('App\Http\Controllers\GeneralController')->check_user_permission($p_id);
	return $result;
}


//common fxn to post data
public function do_post($data, $full_url, $access_token=null){

			$data_string = json_encode($data);
			$ch = curl_init($full_url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
			return $result = curl_exec($ch);
}


    //
    public function price_modes(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.pricemodes');
    	        }
    	        //for getting existing 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['price_modes']= (file_get_contents("".$apiurl."GetAllPriceModes"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$price_mode_name =Input::get('price_mode_name');	
				    $is_active=Input::get('is_active');	
					
	                $data = array(
					"price_mode_name"=> $price_mode_name,
					"is_active"=> $is_active,
					);                                                                    
					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreatePriceMode");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 


      public function fee_sources(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.feesources');
    	        }
    	        //for getting existing  
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['fee_sources']= (file_get_contents("".$apiurl."GetAllTransactionFeeSources"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$charged_party_name =Input::get('charged_party_name');	
				    $is_active=Input::get('is_active');	
					
	                $data = array(
					"charged_party_name"=> $charged_party_name,
					"is_active"=> $is_active,
					);                                                                    
					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateTransactionFeeSource");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 





      public function limit_types(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.limittypes');
    	        }
    	        //for getting existing ones 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['limit_types']= (file_get_contents("".$apiurl."GetTransactionLimitTypes"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$transaction_limit_type_name =Input::get('transaction_limit_type_name');	
				    $is_active=Input::get('is_active');	
					
	                $data = array(
					"transaction_limit_type_name"=> $transaction_limit_type_name,
					"is_active"=> $is_active,
					);                                                                    
					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateTransactionLimitType");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn


      public function access_channels(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.accesschannels');
    	        }
    	        //for getting existing ones 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['access_channels']= (file_get_contents("".$apiurl."GetAllAccessChannels"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$access_channel_name =Input::get('access_channel_name');	
				    $is_active=Input::get('is_active');	
					
	                $data = array(
					"access_channel_name"=> $access_channel_name,
					"is_active"=> $is_active,
					);                                                                    
					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateAccessChannel");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn


//
      public function transaction_types(){

    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.transactiontypes');
    	        }
    	        //for getting existing ones 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['transaction_types']= (file_get_contents("".$apiurl."GetTransactionTypes"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){    	        	
			        $is_active=Input::get('is_active');  
			        $transaction_name=Input::get('transaction_name');
			        $friendly_name=Input::get('friendly_name');
			        $description=Input::get('description');
			        $show_in_mini_statement=Input::get('show_in_mini_statement');
			        $show_in_full_statement=Input::get('show_in_full_statement');
			        $notify_customers_on_resume=Input::get('notify_customers_on_resume');
									
		            $data = array(
					"transaction_name"=> $transaction_name,
					"friendly_name"=> $friendly_name,
					"description"=> $description,
					"show_in_mini_statement"=> $show_in_mini_statement,
					"show_in_full_statement"=> $show_in_full_statement,
					"is_active"=> $is_active,
					"notify_customers_on_resume"=> $notify_customers_on_resume
					);

					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateTransactionType");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn


    public function billing_modes(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.billingmodes');
    	        }
    	        //for getting existing 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['billing_modes']= (file_get_contents("".$apiurl."GetBillingModes"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$billing_mode_name =Input::get('billing_mode_name');	
				    $is_active=Input::get('is_active');	
					
	                $data = array(
					"billing_mode_name"=> $billing_mode_name,
					"is_active"=> $is_active,
					);                                                                    
					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateBillingMode");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 


    public function blacklist_reasons(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');
    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.blacklistreasons');
    	        }
    	        //for getting existing 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['blacklist_reasons']= (file_get_contents("".$apiurl."GetBlacklistReasons"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$reason =Input::get('reason');
    	        	$reason_text =Input::get('reason_text');	
				    $allow_transactions =Input::get('allow_transactions');	
					
	                $data = array(
					"reason"=> $reason,
					"reason_text"=> $reason_text,
					"allow_transactions"=> $allow_transactions,
					);        

					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateBlacklistReason");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 


 public function business_status(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');

    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.businessstatus');
    	        }
    	        //for getting existing 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['business_status']= (file_get_contents("".$apiurl."GetBusinessStatus"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){

    	        	$status_name =Input::get('status_name');	
				    $is_active=Input::get('is_active');	
					
	               

						if($dec->status_code && $dec->status_code==200){
							
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 



 public function biller_types(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');

    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.billertypes');
    	        }
    	        //for getting existing 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['biller_types']= (file_get_contents("".$apiurl."GetBillerTypes"));
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	$name =Input::get('name');	
				    $is_active=Input::get('is_active');	
					
	                $data = array(
					"name"=> $name,
					"is_active"=> $is_active,
					);  

					$data_string = json_encode($data);                                                                                   
					$ch = curl_init("". $apiurl."CreateBillerType");                                                                      
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                                                                                                                   
					$result = curl_exec($ch);

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 


     public function users(){
    	        $apiurl = Config::get('api_url.api_url');

    	        $action=Input::get('action');

    	        if(!isset($action) || empty($action)){// return page
    	        	return view('config.users');
    	        }
    	        //for getting existing 
    	        if( isset($action) && !empty($action) && $action=='get_existing' ){ //call to get existing records

    	        	$finale['users']= DB::table('users')->select('id','name', 'email','username','is_active',
    	        		'created_at','languageid')->get();
    	        	$finale['languages']=$this->do_get($apiurl.'GetLanguages');
    	        	$roles=[];

    	        	foreach ($finale['users'] as $key => $value) {
    	        		$r = DB::table('user_roles')->select('role_id')->where('user_id','=',$value->id)->get();
    	        		$rl=[];// store all roles for a user
    	        		foreach ($r as $k => $v) {
    	        			$p = DB::table('roles')->select('role_name')->where('role_id','=',$v->role_id)->get();
    	        			array_push($rl,$p[0]->role_name);
    	        		}
    	        	array_push($roles, $rl);
    	        	}

    	        	$finale['roles']=json_encode($roles);
    	        	$finale['success']=1;
    	        	return response()->json($finale);
    	        }

    	        // creating 
    	        if(isset($action) && !empty($action) && $action=='create'){
    	        	if($this->has_permission_for(27)){
    	        		$p = DB::table('users')
    	        		->select('id')
    	        		->where('username','=',Input::get('username'))
    	        		->orWhere('email','=',Input::get('email'))->get();

				        if(count($p)==0){ // no other person with similar usernameor email
						  $r=DB::table('users')
						 		->insert(['name'=>Input::get('name'),
						                  'username'=>Input::get('username'),
						                  'email'=>Input::get('email'),
						                  'is_active'=>Input::get('is_active'),
						                 ]); 
						        if($r){
						        	$finale['success']=1; 
						        	$finale['msg']='success';
									return response()->json($finale);
						        }else{
						        	$finale['msg']='Failed';
						        	$finale['success']=0; 
									return response()->json($finale);
						        }

    	        		}else{
							$finale['success']=0; 
							$finale['msg']='The username or email is already taken, choose another unique one!';
							return response()->json($finale); 
						}


					}else{
							$finale['success']=0; 
							$finale['msg']='You have no permissions for this task';
							return response()->json($finale); 
						}

					$dec=json_decode($result);	

						if($dec->status_code && $dec->status_code==200){
							
							$finale['success']=1;
							$finale['msg']="Added successfully";

							return response()->json($finale);
						}else{
							$finale['success']=0;
							$finale['msg']="Could not add.Check your data.";

							return response()->json($finale);
						}

							
			    }
				

    }//close fxn 



    /*---------------end of fxns--------------*/
   
}
