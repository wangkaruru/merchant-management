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
class TranslationController extends Controller
{
    //constructor
	public function __construct(){
	
	}

	// get translated content
	public function get_content($item_id){
		if(empty(session('lang_id'))){
			redirect('/login');
		}
		$lang_id = session('lang_id');
		$contents =  DB::select('select content from t_contents where item_id = ? AND lang_id= ? ', [$item_id ,$lang_id]);
		if($contents){
			return $contents[0]->content;
		}else{
			return 'error';
		}
		
	}
























/*------------end of translations fxns-----------*/




	


}/*end of class*/

