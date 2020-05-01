<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\http\Requests;
use Validator;
use Response;
use Auth;
use DB;
use App\Localsurveyareas;
use App\F11;
use App\F60;
use App\F61;
use App\F63;
use App\F70;
use App\F71;
use App\F76;
use App\Options;
use App\Reasons;
use App\Meals;
use App\F74_Questions;
use App\is;

class SendDataController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   /**
     * Send Data to the server
     * 
     * 
     */
    public function transmission(Request $request, $eacode)
    {

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true; 

            // Get data and send it to the live server f11
            $f11 = F11::where('eacode','LIKE','%'.$eacode.'%')->exclude(['row_id','id'])->get()->toArray();
            $insert_f11 = DB::connection('mysqlsec')->table('d_f11')->insertIgnore($f11);

            // Get data and send it to the live server f60
            $f60 = F60::where('eacode','LIKE','%'.$eacode.'%')->exclude('id')->get()->toArray();
            $insert_f60 = DB::connection('mysqlsec')->table('d_f60')->insertIgnore($f60);

            // Get data and send it to the live server f61
            $f61 = F61::where('eacode','LIKE','%'.$eacode.'%')->exclude('id')->get()->toArray();
            $insert_f61 = DB::connection('mysqlsec')->table('d_f61')->insertIgnore($f61);

            // Get data and send it to the live server f63
            $f63 = F63::where('eacode','LIKE','%'.$eacode.'%')->exclude('id')->get()->toArray();
            $insert_f63 = DB::connection('mysqlsec')->table('d_f63')->insertIgnore($f63);

            // Get data and send it to the live server f70
            $f70 = F70::where('eacode','LIKE','%'.$eacode.'%')->exclude('id')->get()->toArray();
            $insert_f70 = DB::connection('mysqlsec')->table('d_f70')->insertIgnore($f70);

            // Get data and send it to the live server f71
            $f71 = F71::where('eacode','LIKE','%'.$eacode.'%')->exclude('id')->get()->toArray();
            $insert_f71 = DB::connection('mysqlsec')->table('d_f71')->insertIgnore($f71);

            // Get data and send it to the live server f76
            $f76 = F76::where('eacode','LIKE','%'.$eacode.'%')->exclude('id')->get()->toArray();
            $insert_f76 = DB::connection('mysqlsec')->table('d_f76')->insertIgnore($f76);
                
            $notification = array(
                'message' => 'Data trasmitted successfully!',
                'alert-type' => 'success'
            );

            return redirect('/transmit')->with($notification);


            fclose($connected);

        } else {

            $is_conn = false; 

            $notification = array(
                'message' => 'Please check your internet connection!',
                'alert-type' => 'error'
            );
            
            return redirect('/transmit')->with($notification);

        }
    }
}
