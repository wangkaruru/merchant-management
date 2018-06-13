<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use DB;
use Illuminate\Contracts\Auth\Guard;


class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request, Guard $auth)
    {
       // view()->composer('*', function($view) use ($auth) {
            // get the current user
            //return  $currentUser = $auth->user(); exit();

       /*   $lang =   DB::table('customers')->select('id','f_name', 'l_name',
                'language_id')->where('customer_id','=',session('ref_cid'))->first();
            if ($lang) {
                $defaultlang= $lang->language_id;

            } else {
                $defaultlang=1;
            }*/

            //$defaultlang=1;
           // $data=DB::connection('portaltranslationsDB')->table('side_nav')->where('languageID','=',$defaultlang)->get();
            /*echo json_encode($data); exit();*/
           /* $data_1=DB::connection('portaltranslationsDB')->table('commisions')->where('languageID','=',$defaultlang)->get();
            $data_2=DB::connection('portaltranslationsDB')->table('tariffs')->where('languageID','=',$defaultlang)->get();
            $data_3=DB::connection('portaltranslationsDB')->table('float_purchase')->where('languageID','=',$defaultlang)->get();
            $data_4=DB::connection('portaltranslationsDB')->table('translations')->where('languageID','=',$defaultlang)->get();
            $data_5=DB::connection('portaltranslationsDB')->table('airtime')->where('languageID','=',$defaultlang)->get();
            $data_6=DB::connection('portaltranslationsDB')->table('messaging')->where('languageID','=',$defaultlang)->get();
            $data_7=DB::connection('portaltranslationsDB')->table('configs')->where('languageID','=',$defaultlang)->get();
            $data_8=DB::connection('portaltranslationsDB')->table('ops')->where('languageID','=',$defaultlang)->get();
            $data_9=DB::connection('portaltranslationsDB')->table('csm')->where('languageID','=',$defaultlang)->get();


            session([
                'key' => $data,
                'commisions'=>$data_1,
                'tariff'=>$data_2,
                'float'=>$data_3,
                'translations'=>$data_4,
                'airtime'=>$data_5,
                'messaging'=>$data_6,
                'configs'=>$data_7
            ]);

            $value = session('key');
            $commision = session('commisions');
            $tariff = session('tariff');
            $float=session('float');
            $translations=session('translations');
            $airtime=session('airtime');
            $messaging=session('messaging');
            $configs=session('configs');
            $csm=$data_9;
            $ops=$data_8;

            \View::share('language_text', $this->convert_obj_to_array($value));
            \View::share('language_text_comms', $this->convert_obj_to_array($commision));
            \View::share('Tariffs', $this->convert_obj_to_array($tariff));
            \View::share('float_purchase',$this->convert_obj_to_array($float));
            \View::share('translations_text',$this->convert_obj_to_array($translations));
            \View::share('airtime_text',$this->convert_obj_to_array($airtime));
            \View::share('messaging_text',$this->convert_obj_to_array($messaging));
            \View::share('configs_text',$this->convert_obj_to_array($configs));
            \View::share('csm_text',$this->convert_obj_to_array($csm));
            \View::share('ops_text',$this->convert_obj_to_array($ops));*/

            // pass the data to the view
            //$view->with('currentUser', $currentUser);
       // });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function convert_obj_to_array($var)
    {
        $sample=[];
        foreach ($var as $key=> $value) {
            $sample[$value->menuID]= $value;
        }
        return json_decode(json_encode($sample),true);
    }
}
