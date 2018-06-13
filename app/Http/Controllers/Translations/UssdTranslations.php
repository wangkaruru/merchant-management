<?php

namespace App\Http\Controllers\Translations;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UssdTranslations extends Controller
{
    //
    public function ussd_translations_load(Request $request){
    	
      $lang_id=$request->input('lang_id');
    	$menu_error_templates = DB::connection('ussdtranslationsDB')->table('menuerrortemplates')->where('languageID','=',$lang_id)->get();
    	$menu_options_templates = DB::connection('ussdtranslationsDB')->table('menuoptiontemplates')->where('languageID','=',$lang_id)->get();
    	$menu_level_templates = DB::connection('ussdtranslationsDB')->table('menuleveltemplates')->where('languageID','=',$lang_id)->get();
       
      $translations=[
					  'menu_error_templates'=>$menu_error_templates,
						'menu_options_templates'=>$menu_options_templates,
						'menu_level_templates'=>$menu_level_templates
						];
      return json_encode($translations);
		//return $translations;//json_decode(json_encode());
    	//return view('Translations/App_translations');
    }

    public function ussd_menu_level_text_translate(Request $request)
    {
    	$lang_id=$request->input('lang_id');
     	$value=$request->input('description');
     	$menu_level_id=$request->input('menu_level_id');

        $button_text_check = DB::connection('ussdtranslationsDB')
                              ->table('menuleveltemplates');
                            
                   if($button_text_check->where('menuLevelID','=',$menu_level_id)->where('languageID','=',$lang_id)->first()){
                          $button_text_check->where('menuLevelID','=',$menu_level_id)->where('languageID','=',$lang_id)->delete();
                   	    if (DB::connection('ussdtranslationsDB')->insert('insert into menuleveltemplates (menuLevelID,menuText,languageID) values (?, ?, ?)', [$menu_level_id,$value,$lang_id])){
                   	    	
                   	    	 return 200;
                   	    }else{
                   	    	 return 500;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('ussdtranslationsDB')->insert('insert into menuleveltemplates (menuLevelID,menuText,languageID) values (?, ?, ?)', [$menu_level_id,$value,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }


                   }
    }


    public function ussd_menu_option_text_translate(Request $request)
    {
    	$lang_id=$request->input('lang_id');
     	$value=$request->input('description');
     	$menu_level_id=$request->input('menu_level_id');

        $button_text_check = DB::connection('ussdtranslationsDB')
                              ->table('menuoptiontemplates');
                  //var_dump( $button_text_check->where('menuOptionID','=',$menu_level_id)->where('languageID','=',$lang_id)->first());         
                   if($button_text_check->where('menuOptionID','=',$menu_level_id)->where('languageID','=',$lang_id)->first()){
                    $button_text_check->where('menuOptionID','=',$menu_level_id)->where('languageID','=',$lang_id)->delete();
                   	$update=DB::connection('ussdtranslationsDB')->insert('insert into menuoptiontemplates (menuOptionID,menuOptionText,languageID) values (?, ?, ?)', [$menu_level_id,$value,$lang_id]);
                   	    if($update){
                   	    	 return 200;
                   	    }else{
                   	    	 return $value;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('ussdtranslationsDB')->insert('insert into menuoptiontemplates (menuOptionID,menuOptionText,languageID) values (?, ?, ?)', [$menu_level_id,$value,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }


                   }
    }

    public function ussd_menu_error_text_translate(Request $request)
    {
    	$lang_id=$request->input('lang_id');
     	$value=$request->input('description');
     	$menu_level_id=$request->input('menu_level_id');

        $button_text_check = DB::connection('ussdtranslationsDB')
                              ->table('menuerrortemplates');
                            
                   if($button_text_check->where('errorID','=',$menu_level_id)->where('languageID','=',$lang_id)->first()){
                   	    if ($button_text_check->where('errorID','=',$menu_level_id)->where('languageID','=',$lang_id)->update(['errorText'=>$value])){
                   	    	
                   	    	 return 200;
                   	    }else{
                   	    	 return 500;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('ussdtranslationsDB')->insert('insert into menuerrortemplates (errorID,errorText,languageID) values (?, ?, ?)', [$menu_level_id,$value,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }


                   }
    }
}
