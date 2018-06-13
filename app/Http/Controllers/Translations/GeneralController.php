<?php

namespace App\Http\Controllers\Translations;

use Illuminate\Http\Request;
use DB;
use PDO;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    //

    
    public function languages(){


        DB::setFetchMode(PDO::FETCH_ASSOC);
        $languages = DB::connection('ussdtranslationsDB')->table('languages')->get();
       
        $menu_error_templates = DB::connection('ussdtranslationsDB')->table('menuerrortemplates')->where('languageID','=','1')->get();
        $menu_options_templates = DB::connection('ussdtranslationsDB')->table('menuoptiontemplates')->where('languageID','=','1')->get();
        $menu_level_templates = DB::connection('ussdtranslationsDB')->table('menuleveltemplates')->where('languageID','=','1')->get();
        $button_text = DB::connection('translationsDB')->table('appbuttontext')->where('languageID','=','1')->get();
        $error_level_templates = DB::connection('translationsDB')->table('apperrorleveltemplates')->where('languageID','=','1')->get();
        $form_levels = DB::connection('translationsDB')->table('appformlevels')->where('languageID','=','1')->get();
        $form_level_templates = DB::connection('translationsDB')->table('appformleveltemplates')->where('languageID','=','1')->get();
        $menu_levels = DB::connection('translationsDB')->table('appmenulevels')->where('languageID','=','1')->get();
        $menu_level_templates = DB::connection('translationsDB')->table('appmenuleveltemplates')->where('languageID','=','1')->get();

        $data=[];

        foreach ($languages as $language){
            $menu_error_templates_lang = DB::connection('ussdtranslationsDB')->table('menuerrortemplates')->where('languageID','=',$language->languageID)->get();
            $menu_options_templates_lang = DB::connection('ussdtranslationsDB')->table('menuoptiontemplates')->where('languageID','=',$language->languageID)->get();
            $menu_level_templates_lang = DB::connection('ussdtranslationsDB')->table('menuleveltemplates')->where('languageID','=',$language->languageID)->get();
            $button_text_lang = DB::connection('translationsDB')->table('appbuttontext')->where('languageID','=','1')->get();
            $error_level_templates_lang = DB::connection('translationsDB')->table('apperrorleveltemplates')->where('languageID','=',$language->languageID)->get();
            $form_levels_lang = DB::connection('translationsDB')->table('appformlevels')->where('languageID','=',$language->languageID)->get();
            $form_level_templates_lang = DB::connection('translationsDB')->table('appformleveltemplates')->where('languageID','=',$language->languageID)->get();
            $menu_levels_lang = DB::connection('translationsDB')->table('appmenulevels')->where('languageID','=',$language->languageID)->get();
            $menu_level_templates_lang = DB::connection('translationsDB')->table('appmenuleveltemplates')->where('languageID','=',$language->languageID)->get();

            $menu_error_templates_percentage=(count($menu_error_templates_lang)/count($menu_error_templates))*100;
            $menu_options_templates_percentage=(count($menu_options_templates_lang)/count($menu_options_templates))*100;
            $menu_level_templates_percentage=(count($menu_level_templates_lang)/count($menu_level_templates))*100; 
            $button_text_percentage=(count($menu_level_templates_lang)/count($menu_level_templates))*100;
            $error_level_templates_percentage=(count($error_level_templates_lang)/count($error_level_templates))*100;
            $form_level_templates_percentage=(count($form_level_templates_lang)/count($form_level_templates))*100;
            $menu_level_templates_percentage=(count($menu_level_templates_lang)/count($menu_level_templates))*100;

            $data[]=[
                'languageID'=>$language->languageID,
                'menu_error_templates_percentage'=>round($menu_error_templates_percentage),
                'menu_options_templates_percentage'=>round($menu_options_templates_percentage),
                'menu_level_templates_percentage'=>round($menu_level_templates_percentage),
                'button_text_percentage'=>round($button_text_percentage),
                'error_level_templates_percentage'=>round($error_level_templates_percentage),
                'form_level_templates_percentage'=>round($form_level_templates_percentage),
                'menu_level_templates_percentage'=>round($menu_level_templates_percentage)
            ];

        }

       // return  $data;
       // $languages = DB::connection('ussdtranslationsDB')->table('languages')->get();
        return view('Translations/languages')->with([
             'languages'=>$languages,
             'progress'=> $data
            ]);
    }

    public function show_language_progress(){
        DB::setFetchMode(PDO::FETCH_ASSOC);
        $languages = DB::connection('ussdtranslationsDB')->table('languages')->get();
        //return view('Translations/languages')->with([
          //   'languages'=>$languages,
          //  ]);
        $menu_error_templates = DB::connection('ussdtranslationsDB')->table('menuerrortemplates')->where('languageID','=','1')->get();
        $menu_options_templates = DB::connection('ussdtranslationsDB')->table('menuoptiontemplates')->where('languageID','=','1')->get();
        $menu_level_templates = DB::connection('ussdtranslationsDB')->table('menuleveltemplates')->where('languageID','=','1')->get();
        $button_text = DB::connection('translationsDB')->table('appbuttontext')->where('languageID','=','1')->get();
        $error_level_templates = DB::connection('translationsDB')->table('apperrorleveltemplates')->where('languageID','=','1')->get();
        $form_levels = DB::connection('translationsDB')->table('appformlevels')->where('languageID','=','1')->get();
        $form_level_templates = DB::connection('translationsDB')->table('appformleveltemplates')->where('languageID','=','1')->get();
        $menu_levels = DB::connection('translationsDB')->table('appmenulevels')->where('languageID','=','1')->get();
        $menu_level_templates = DB::connection('translationsDB')->table('appmenuleveltemplates')->where('languageID','=','1')->get();

        $data=[];

        foreach ($languages as $language){
            $menu_error_templates_lang = DB::connection('ussdtranslationsDB')->table('menuerrortemplates')->where('languageID','=',$language->languageID)->get();
            $menu_options_templates_lang = DB::connection('ussdtranslationsDB')->table('menuoptiontemplates')->where('languageID','=',$language->languageID)->get();
            $menu_level_templates_lang = DB::connection('ussdtranslationsDB')->table('menuleveltemplates')->where('languageID','=',$language->languageID)->get();
            $button_text_lang = DB::connection('translationsDB')->table('appbuttontext')->where('languageID','=','1')->get();
            $error_level_templates_lang = DB::connection('translationsDB')->table('apperrorleveltemplates')->where('languageID','=',$language->languageID)->get();
            $form_levels_lang = DB::connection('translationsDB')->table('appformlevels')->where('languageID','=',$language->languageID)->get();
            $form_level_templates_lang = DB::connection('translationsDB')->table('appformleveltemplates')->where('languageID','=',$language->languageID)->get();
            $menu_levels_lang = DB::connection('translationsDB')->table('appmenulevels')->where('languageID','=',$language->languageID)->get();
            $menu_level_templates_lang = DB::connection('translationsDB')->table('appmenuleveltemplates')->where('languageID','=',$language->languageID)->get();

            $menu_error_templates_percentage=(count($menu_error_templates_lang)/count($menu_error_templates))*100;
            $menu_options_templates_percentage=(count($menu_options_templates_lang)/count($menu_options_templates))*100;
            $menu_level_templates_percentage=(count($menu_level_templates_lang)/count($menu_level_templates))*100; 
            $button_text_percentage=(count($menu_level_templates_lang)/count($menu_level_templates))*100;
            $error_level_templates_percentage=(count($error_level_templates_lang)/count($error_level_templates))*100;
            $form_level_templates_percentage=(count($form_level_templates_lang)/count($form_level_templates))*100;
            $menu_level_templates_percentage=(count($menu_level_templates_lang)/count($menu_level_templates))*100;

            $data[]=[
                'languageID'=>$language->languageID,
                'menu_error_templates_percentage'=>round($menu_error_templates_percentage),
                'menu_options_templates_percentage'=>round($menu_options_templates_percentage),
                'menu_level_templates_percentage'=>round($menu_level_templates_percentage),
                'button_text_percentage'=>round($button_text_percentage),
                'error_level_templates_percentage'=>round($error_level_templates_percentage),
                'form_level_templates_percentage'=>round($form_level_templates_percentage),
                'menu_level_templates_percentage'=>round($menu_level_templates_percentage)
            ];

        }

        return $data;
       
       
    }


    public function app_translations(){
        $languages = DB::connection('ussdtranslationsDB')->table('languages')->get();
    	return view('Translations/App_translations')->with([
             'languages'=>$languages,
            ]);
    }


    public function core_message_translations(){
        $languages = DB::connection('ussdtranslationsDB')->table('languages')->get();
        return view('Translations/core_messages_translations')->with([
             'languages'=>$languages,
            ]);
    }


    public function ussd_translations(){
        $languages = DB::connection('ussdtranslationsDB')->table('languages')->get();
        return view('Translations/ussd_translations')->with([
             'languages'=>$languages,
            ]);
    }


    public function core_translations_load(Request $request)
    {
        $apiurl = Config::get('api_url.api_url');
        $lang_id= $request->input('lang_id');
        $messages=json_decode(file_get_contents("".$apiurl."get_all_core_message_templates?lang_id=".$lang_id));
        return json_encode($messages);
        
        # code...
    }


     public function core_translations_update(Request $request){
              $apiurl = Config::get('api_url.api_url');
             //GetAllCustomerDetailsByMsisdn/{phone}

            
             //return $user_details[0]->customer_id;
             $data=[
                        
                         'id'=>$request->input('id'),
                         'lang_id'=>$request->input('lang_id'),
                         'template_name'=>$request->input('template_name'),
                         'message_text'=>$request->input('message_text'),

                ];
        
                //$walletapiurl = $this->walletapiurl;
                //return $data;
                $data_string = json_encode($data);                                                                                   
                $ch = curl_init("".$apiurl."translate_core_message_templates");                                                                      
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                               
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' .strlen($data_string)));                                                                                                                   
                $result = curl_exec($ch);
                if($result === false)
                {
                
                        $status_code = curl_errno($ch);
                        $message = curl_error($ch); 

                }else {
                    
                 // return $json = json_decode($result);
                  return $result;
        }
                
     }
}
