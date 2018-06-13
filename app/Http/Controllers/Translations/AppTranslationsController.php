<?php

namespace App\Http\Controllers\Translations;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppTranslationsController extends Controller
{
    //
    public function app_translations_load(Request $request){
      $lang_id=$request->input('lang_id');
    	$button_text = DB::connection('translationsDB')->table('apptranslatecontent')->where('languageID','=',$lang_id)->get();
    	$error_level_templates = DB::connection('translationsDB')->table('menuerrortemplates')->where('languageID','=',$lang_id)->get();
    	$form_levels = [];
    	$form_level_templates = DB::connection('translationsDB')->table('menuoptiontemplates')->where('languageID','=',$lang_id)->get();
    	$menu_levels =  [];
    	$menu_level_templates = DB::connection('translationsDB')->table('menuleveltemplates')->where('languageID','=',$lang_id)->get();
       
        $translations=[
        		'button_text'=>$button_text,
						'error_level_templates'=>$error_level_templates,//menuerror
						'form_levels'=>$form_levels,
						'form_level_templates'=>$form_level_templates,//menuoption
						'menu_levels'=>$menu_levels,
						'menu_level_templates'=>$menu_level_templates,//menulevels
						];
        return json_encode($translations);
		//return $translations;//json_decode(json_encode());
    	//return view('Translations/App_translations');
    }

     public function app_button_text_translate(Request $request){
     	$lang_id=$request->input('lang_id');
     	$menu_level=$request->input('id');
     	$value=$request->input('description');
     	//$menu_position=$request->input('menu_position');
     //	$menu_level_id=$request->input('menu_level_id');
      $button_text_check = DB::connection('translationsDB')
                                ->table('apptranslatecontent');
      $menu_level_1=$button_text_check->where('id','=',$menu_level)->first()->menu_template_id;

     
                            
                   if($button_text_check->where('menu_template_id','=', $menu_level_1)->where('languageID','=',$lang_id)->first()){
                      $button_text_check->where('menu_template_id','=',$menu_level_1)->where('languageID','=',$lang_id)->delete();
                   	    if (DB::connection('translationsDB')->insert('insert into apptranslatecontent (menu_template_id,menu_text,languageID) values (?, ?, ?)', [$menu_level_1,$value,$lang_id])){
                   	    	
                   	    	 return 200;
                   	    }else{
                   	    	 return 500;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('translationsDB')->insert('insert into apptranslatecontent (menu_template_id,menu_text,languageID) values (?, ?, ?)', [$menu_level_1,$value,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }


                   }

     }



     public function app_error_level_text_translate(Request $request)
     {
     	$lang_id=$request->input('lang_id');
     	$menu_level=$request->input('id');
      $value=$request->input('description');
      //var_dump($value);

     	$error_text_check = DB::connection('translationsDB')
                              ->table('apperrorleveltemplates');
                            
                   if($error_text_check->where('errorID','=',$menu_level)->where('languageID','=',$lang_id)->first()){
                    $error_text_check->where('errorID','=',$menu_level)->where('languageID','=',$lang_id)->delete();
                   		$update=DB::connection('translationsDB')->insert('insert into apperrorleveltemplates(errorID,errorText,languageID) values (?, ?, ?)', [$menu_level,$value,$lang_id]);

                      
                   	    if($update){	
                   	    	 return 200;
                   	    }else{
                   	    	 return $lang_id;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('translationsDB')->insert('insert into apperrorleveltemplates(errorID,errorText,languageID) values (?, ?, ?)', [$menu_level,$value,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }
					}
     }


     public function app_menu_level_text_translate(Request $request)
     {
		     	$lang_id=$request->input('lang_id');
		     	$unique_id=$request->input('id');
		     	$value=$request->input('description');
		     //	$menu_position=$request->input('menu_position');
		     //	$menu_level_id=$request->input('menu_level_id');

		     	$menu_text_check = DB::connection('translationsDB')
                              ->table('menuleveltemplates');
                            
                   if($menu_text_check->where('menuLevelID','=',$unique_id)->where('languageID','=',$lang_id)->first()){
                      $menu_text_check->where('menuLevelID','=',$unique_id)->where('languageID','=',$lang_id)->delete();
                   		$update=DB::connection('translationsDB')->insert('insert into menuleveltemplates(menuLevelID,menuText,languageID) values (?, ?, ?)', [$unique_id,$value,$lang_id]);
                   	    if($update){	
                   	    	 return 200;
                   	    }else{
                   	    	 return 500;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('translationsDB')->insert('insert into menuleveltemplates(menuLevelID,menuText,languageID) values (?, ?, ?)', [$unique_id,$value,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }
					}
     }

     public function app_form_level_text_translate(Request $request)
     {
     	        $lang_id=$request->input('lang_id');
		     	$unique_id=$request->input('id');
		     	$value=$request->input('description');
		     	$menu_position=$request->input('menu_position');
		     	$menu_level_id=$request->input('form_level_id');

		     	$menu_text_check = DB::connection('translationsDB')
                              ->table('appformleveltemplates');
                            
                   if($menu_text_check->where('uniqueID','=',$unique_id)->where('languageID','=',$lang_id)->first()){
                    $menu_text_check->where('uniqueID','=',$unique_id)->where('languageID','=',$lang_id)->delete();
                   		$update=DB::connection('translationsDB')->insert('insert into appformleveltemplates(uniqueID,FormText,MenuPosition,FormlevelID,languageID) values (?, ?, ?, ?, ?)', [$unique_id,$value,$menu_position,$menu_level_id,$lang_id]);
                   	    if($update){	
                   	    	 return 200;
                   	    }else{
                   	    	 return 500;
                   	    }
                   		                  	
                   }else{
		            	if (DB::connection('translationsDB')->insert('insert into appformleveltemplates(uniqueID,FormText,MenuPosition,FormlevelID,languageID) values (?, ?, ?, ?, ?)', [$unique_id,$value,$menu_position,$menu_level_id,$lang_id])) {
		                   	return 200;
		                   }else{
		                   	return 500;
		                   }
					}
     }
}
