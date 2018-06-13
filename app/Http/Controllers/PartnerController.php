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
use PDF;
use Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PartnerController extends Controller
{
     //constructor
public function __construct(){
	//$this->middleware('auth', ['except' => ['login_code', 'first_time','reset_my_password']]);
}

public function merchant(){

    return view('merchant');

}// close fxn 


public function load_data(){

    $finale['all']= DB::table('accounts')->get();

    return response()->json($finale);

}

public function create_merchant_customer(){

    $acc_no=input::get('acc_no');
    $s_type=input::get('s_type');

    if(empty(trim($acc_no)) || empty(trim($s_type))){

        $finale['success']=0;
        $finale['msg']="Enter all fields";

        return response()->json($finale);
    }

    $exists= DB::table('accounts')
           ->where('account_number',$acc_no)
           ->get();

    if(count($exists)){

        $finale['success']=0;
        $finale['msg']="The account number already exists";

    }else{

        DB::table('accounts')
        ->insert([
            'account_number'=>$acc_no,
            'service_type'=>$s_type,
            'balance'=>0,
            ]);

        $finale['success']=1;
        $finale['msg']="The account number  added successfully!";
    }

    return response()->json($finale);

}//close fxn 







/*----end of fxns---*/

}/*-----close this class*/
