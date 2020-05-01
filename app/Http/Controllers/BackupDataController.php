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
use Artisan;
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


class BackupDataController extends Controller
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
     * Show the transmission page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function backup()
    {   

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true;

            Artisan::call('backup:run',['--only-db'=>true]);

            $notification = array(
                'message' => 'Data backup successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

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
