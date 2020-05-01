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

class DataTransmissionController extends Controller
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
    public function index()
    {
        $areas = DB::table('d_f71')
                    ->join('localsurveyareas', function ($join) {
                        $join->on('localsurveyareas.eacode', '=', 'd_f71.eacode');   
                    })
                    ->distinct()
                    ->get(['d_f71.eacode','localsurveyareas.areaname']);
        
        return view('app.trans',compact('areas'));
    }
}
