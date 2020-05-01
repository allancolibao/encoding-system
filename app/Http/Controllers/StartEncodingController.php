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


class StartEncodingController extends Controller
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
     * Show the start encoding page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app.start_encoding');
    }


    /**
     * Search function
     * 
     * 
     */
    public function searchArea(Request $request)
    {
        
        $rules = array
        (
            'key' => 'required|min:4|max:12'
        );
    
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
        return redirect('/start')->with('error', 'Please re-enter the eacode [ 4-12 digits required ], Thank you');
        
        else 
        {
        $key = Input::get ('key');

        $areas = Localsurveyareas::where('eacode','LIKE','%'.$key.'%')->get();

        return view('app.area',compact('areas'));
        }   
    }


    /**
     * Household
     * 
     * 
     */
    public function household($eacode)
    {
        $count = F11::where('eacode','LIKE','%'.$eacode.'%')->distinct()->get(['eacode','hcn','shsn'])->count();

        $households = F11::where('eacode','LIKE','%'.$eacode.'%')->distinct()->get(['eacode','hcn','shsn','die2ndgen']);

        return view('app.household',compact('count','households','eacode'));
    }   


    /**
     * Membership 
     * 
     * 
     */ 
    public function membership($eacode, $hcn, $shsn)
    {
        $count = F11::where('eacode','LIKE','%'.$eacode.'%')
                    ->where('hcn','LIKE','%'.$hcn.'%')
                    ->where('shsn','LIKE','%'.$shsn.'%')
                    ->distinct()
                    ->get(['member_code'])
                    ->count();

        $memberships = F11::where('eacode','LIKE','%'.$eacode.'%')
                        ->where('hcn','LIKE','%'.$hcn.'%')
                        ->where('shsn','LIKE','%'.$shsn.'%')
                        ->orderBy('MEMBER_CODE', 'ASC')
                        ->get();

        $f60 = F60::where('eacode','LIKE','%'.$eacode.'%')
                        ->where('hcn','LIKE','%'.$hcn.'%')
                        ->where('shsn','LIKE','%'.$shsn.'%')
                        ->get();

        return view('app.membership',compact('count','memberships','f60', 'eacode','hcn','shsn'));
    } 

// +++++++++++++++++++++++++++++++++++++  Start of Insert Other 50 Controller  ++++++++++++++++++++++++++++++++++ //

    /**
     * Insert Other50 Modal
     * 
     * 
     */ 
    public function other50(Request $request, $eacode)
    {
        $is = is::all();

        return view('app.add_other50',compact('eacode','is'));
    }


    /**
     * Insert the other50 data
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insertOther50(Request $request)
    {
        $rules = array(
            'hcn' => 'min:4|max:4',
            'shsn' => 'min:4|max:4',
            'member_code' => Rule::unique('d_f11')->where(function ($query) use ($request) {
                        return $query
                        ->where('eacode','=', $request->get("eacode"))
                        ->where('hcn','=', $request->get("hcn"))
                        ->where('shsn','=', $request->get("shsn"))
                        ->where('member_code','=', $request->get("member_code"));
                })
            );

        $notification = array(
            'message' => 'Oops! Something went wrong',
            'alert-type' => 'error'
        );
    
        $validator = Validator::make ( Input::all(), $rules);
            if ($validator->fails()) 
            return redirect()->back()->with($notification);

        else {
        $member = new F11;
        $member->eacode = $request->get("eacode");
        $member->hcn = $request->get("hcn");
        $member->shsn = $request->get("shsn");
        $member->member_code = $request->get("member_code");
        $member->surname = $request->get("surname");
        $member->givenname = $request->get("givenname");
        $member->age = $request->get("age");
        $member->sex = $request->get("sex");
        $member->psc = $request->get("psc");
        $member->mp = $request->get("mp");
        $member->dbirth = $request->get("dbirth");
        $member->refdate = $request->get("refdate");
        $member->interview_status = $request->get("interview_status");
        $member->save();


        $notification = array(
            'message' => 'Data inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }
        
    }

    // +++++++++++++++++++++++++++++++++++++  End of Insert Other 50 Controller  ++++++++++++++++++++++++++++++++++ //


    // +++++++++++++++++++++++++++++++++++++  Start Form 6.0 CRUD Controller  ++++++++++++++++++++++++++++++++++ //


    /**
    *  Insert Membership Form 6.0
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function insertF60(Request $request)
    {
        $rules = array(
            'refdate' => 'required',
            'refday' => 'required',
            'pets' => 'required',
            'meal_pattern' => 'required',
            'interview_status' => 'required'
            );

            $notification = array(
                'message' => 'Oopps! All fields required',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( $request->all(), $rules);
            if ($validator->fails())
            return redirect()->back()->with($notification);

        else {
        $hh = new F60;
        $hh->eacode = $request->get("eacode");
        $hh->hcn = $request->get("hcn");
        $hh->shsn = $request->get("shsn");
        $hh->refdate = $request->get("refdate");
        $hh->refday = $request->get("refday");
        $hh->pets = $request->get("pets");
        $hh->meal_pattern = $request->get("meal_pattern");
        $hh->interview_status = $request->get("interview_status");
        $hh->encoded_by = Auth::user()->name;
        $hh->save();

        $notification = array(
            'message' => 'Data inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }
        
    }



    /**
    *  Update Membership Form 6.0
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateF60(Request $request, $id)
    {
        $rules = array(
            'refdate' => 'required',
            'refday' => 'required',
            'pets' => 'required',
            'meal_pattern' => 'required',
            'interview_status' => 'required'
            );

            $notification = array(
                'message' => 'Oopps! All fields required',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( $request->all(), $rules);
            if ($validator->fails())
            return redirect()->back()->with($notification);

        else {
        $hh = F60::find($id);
        $hh->eacode = $request->get("eacode");
        $hh->hcn = $request->get("hcn");
        $hh->shsn = $request->get("shsn");
        $hh->refdate = $request->get("refdate");
        $hh->refday = $request->get("refday");
        $hh->pets = $request->get("pets");
        $hh->meal_pattern = $request->get("meal_pattern");
        $hh->interview_status = $request->get("interview_status");
        $hh->updated_by = Auth::user()->name;
        $hh->save();

        $notification = array(
            'message' => 'Data updated successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
        }
        
    }



    // +++++++++++++++++++++++++++++++++++++  End Form 6.0 CRUD Controller  ++++++++++++++++++++++++++++++++++ //





    // +++++++++++++++++++++++++++++++++++++  Start Form 6.1 CRUD Controller  ++++++++++++++++++++++++++++++++++ //


    /**
     * Encode Form 6.1
    *
    *
    */
    public function membershipEncode($eacode, $hcn, $shsn, $membercode, $givenname, $surname, $age, $sex, $psc, $mp)
    {
    $memberships = F61::where('eacode','LIKE','%'.$eacode.'%')
                        ->where('hcn','LIKE','%'.$hcn.'%')
                        ->where('shsn','LIKE','%'.$shsn.'%')
                        ->where('MEMBER_CODE','LIKE','%'.$membercode.'%')
                        ->get();
                        

        return view('app.form61',compact('memberships','eacode','hcn','shsn','membercode','givenname', 'surname', 'age','sex', 'psc','mp'));
    } 



    /**
    *  Insert Membership Form 6.1
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function insertRecord(Request $request)
    {
        $rules = array(
            
            'MEMBER_CODE' => Rule::unique('d_f61')->where(function ($query) use ($request) {
                        return $query
                        ->where('eacode','=', $request->get("eacode"))
                        ->where('hcn','=', $request->get("hcn"))
                        ->where('shsn','=', $request->get("shsn"))
                        ->where('MEMBER_CODE','=', $request->get("MEMBER_CODE"));
                })
            );

        $notification = array(
            'message' => 'Oops! Please double check the member number',
            'alert-type' => 'error'
        );
    
        $validator = Validator::make ( Input::all(), $rules);
            if ($validator->fails()) 
            return redirect()->back()->with($notification);

        else {
        $member = new F61;
        $member->eacode = $request->get("eacode");
        $member->hcn = $request->get("hcn");
        $member->shsn = $request->get("shsn");
        $member->MEMBER_CODE = $request->get("MEMBER_CODE");
        $member->SURNAME = $request->get("SURNAME");
        $member->GIVENNAME = $request->get("GIVENNAME");
        $member->AGE = $request->get("AGE");
        $member->SEX = $request->get("SEX");
        $member->PSC = $request->get("PSC");
        $member->MP = $request->get("MP");
        $member->BF = $request->get("BF");
        $member->AMSNCK = $request->get("AMSNCK");
        $member->LUNCH = $request->get("LUNCH");
        $member->PMSNCK = $request->get("PMSNCK");
        $member->SUPPER = $request->get("SUPPER");
        $member->LATESNCK = $request->get("LATESNCK");
        $member->visitor = $request->get("visitor");
        $member->encoded_by = Auth::user()->name;
        $member->save();


        $notification = array(
            'message' => 'Data inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }
        
    }


    /**
     * Add visitor
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addVisitor($eacode, $hcn, $shsn)
    {
        return view('app.add_visitor', compact('eacode','hcn','shsn'));
    }
    
        


    /**
     * View Form 6.1
     * 
     * 
     */ 
    public function membershipView($eacode, $hcn, $shsn)
    {
        $count = F61::where('eacode','LIKE','%'.$eacode.'%')
                        ->where('hcn','LIKE','%'.$hcn.'%')
                        ->where('shsn','LIKE','%'.$shsn.'%')
                        ->distinct()
                        ->get(['eacode','hcn','shsn','MEMBER_CODE'])->count();

        $memberships = F61::where('eacode','LIKE','%'.$eacode.'%')
        ->where('hcn','LIKE','%'.$hcn.'%')
        ->where('shsn','LIKE','%'.$shsn.'%')
        ->orderBy('MEMBER_CODE', 'ASC')
        ->get();

        $f60 = F60::where('eacode','LIKE','%'.$eacode.'%')
                            ->where('hcn','LIKE','%'.$hcn.'%')
                            ->where('shsn','LIKE','%'.$shsn.'%')
                            ->get();

        return view('app.form61_table_mem',compact('count','memberships','eacode','hcn','shsn','f60'));
    }


    /**
     * Edit Form 6.1
     * 
     * 
     *  
     */   
    public function membershipEdit($eacode, $hcn, $shsn, $membercode, $id)
    {

        $member = F61::find($id);
        return view('app.form61_edit',compact('id','member','eacode','hcn','shsn','membercode'));
    }



    /**
    * Update Membership Form 6.1
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function membershipUpdate(Request $request, $id)
    {
        $rules = array(
            
            'MEMBER_CODE' => Rule::unique('d_f61')->ignore($id)->where(function ($query) use ($request) {
                        return $query
                        ->where('eacode','=', $request->get("eacode"))
                        ->where('hcn','=', $request->get("hcn"))
                        ->where('shsn','=', $request->get("shsn"))
                        ->where('MEMBER_CODE','=', $request->get("MEMBER_CODE"));
                })
            );

            $notification = array(
                'message' => 'Oops! Duplicate member number',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( Input::all(), $rules);
            if ($validator->fails()) 
            return redirect()->back()->with($notification);

        else {
        $member = F61::find($id);
        $member->MEMBER_CODE = $request->get("MEMBER_CODE");
        $member->SURNAME = $request->get("SURNAME");
        $member->GIVENNAME = $request->get("GIVENNAME");
        $member->AGE = $request->get("AGE");
        $member->SEX = $request->get("SEX");
        $member->PSC = $request->get("PSC");
        $member->MP = $request->get("MP");
        $member->BF = $request->get("BF");
        $member->AMSNCK = $request->get("AMSNCK");
        $member->LUNCH = $request->get("LUNCH");
        $member->PMSNCK = $request->get("PMSNCK");
        $member->SUPPER = $request->get("SUPPER");
        $member->LATESNCK = $request->get("LATESNCK");
        $member->updated_by = Auth::user()->name;
        $member->save();

        $notification = array(
            'message' => 'Data updated successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
        }
        
    }


    // +++++++++++++++++++++++++++++++++++++  End Form 6.1 Controller  ++++++++++++++++++++++++++++++++++ //




    // +++++++++++++++++++++++++++++++++++++  Start Form 6.3 Controller  ++++++++++++++++++++++++++++++++++ //

    
    /**
     * Encode Form 6.3
     * 
     * 
    */ 
    public function foodrecordIndex($eacode, $hcn, $shsn)
    {

    $fct = DB::table('fct_new')->select('foodcode', 'fooddesc')->get();

    return view('app.foodrecord',compact('fct','eacode','hcn','shsn'));
    }


    /**
     * Insert Record Form 6.3
     * 
     * 
     */ 
    public function addRecord(Request $request)
    {   
        
        $data = $request->all();

        if(count($request->LINENO) > 0)
        {
            foreach($request->LINENO as $input => $value)
            {
                $foodRecord = array(
                'eacode' => $request->get('eacode'),
                'hcn' => $request->get('hcn'),
                'shsn' => $request->get('shsn'),
                'LINENO'=>$request->LINENO[$input],
                'FOODITEM' => $request->FOODITEM[$input],
                'DESCRIPTION' => $request->DESCRIPTION[$input],
                'BRANDNAME' => $request->BRANDNAME[$input],
                'MAINIGNT' => $request->MAINIGNT[$input],
                'BRANDCODE' => $request->BRANDCODE[$input],
                'MEALCD' => $request->MEALCD[$input],
                'WRCODE' => $request->WRCODE[$input],
                'RFCODE' => $request->RFCODE[$input],
                'FOODCODE' => Str::substr($request->FOODDESC[$input], 0, 4),
                'FOODDESC' => $request->FOODDESC[$input],
                'FOODWEIGHT' => $request->FOODWEIGHT[$input],
                'RCC' => $request->RCC[$input],
                'CMC' => $request->CMC[$input],
                'SUPCODE' => $request->SUPCODE[$input],
                'SRCCODE' => $request->SRCCODE[$input],
                'PW_WGT' => $request->PW_WGT[$input],
                'PW_RCC' => $request->PW_RCC[$input],
                'PW_CMC' => $request->PW_CMC[$input],
                'PURCODE' => $request->PURCODE[$input],
                'GO_WGT' => $request->GO_WGT[$input],
                'GO_RCC' => $request->GO_RCC[$input],
                'GO_CMC' => $request->GO_CMC[$input],
                'LO_WGT' => $request->LO_WGT[$input],
                'LO_RCC' => $request->LO_RCC[$input],
                'LO_CMC' => $request->LO_CMC[$input],
                'UNITCOST' => $request->UNITCOST[$input],
                'UNITWGT' => $request->UNITWGT[$input],
                'UNIT' => $request->UNIT[$input],    
                'encoded_by' => Auth::user()->name         
                );

                F63::insertIgnore($foodRecord);
            }
        }

        $notification = array(
            'message' => 'Data inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    /**
     *  Retrieve all data from table d_f6.3
    *
    *
    */ 
    public function viewRecord($eacode, $hcn, $shsn)
    {

    $records = F63::where('eacode','LIKE','%'.$eacode.'%')
                ->where('hcn','LIKE','%'.$hcn.'%')
                ->where('shsn','LIKE','%'.$shsn.'%')
                ->orderBy('LINENO', 'ASC')
                ->get();

    $count = F63::where('eacode','LIKE','%'.$eacode.'%')
            ->where('hcn','LIKE','%'.$hcn.'%')
            ->where('shsn','LIKE','%'.$shsn.'%')
            ->get()->count();

    return view('app.foodrecord_view', compact('eacode','hcn','shsn','records','count'));
    }



    /**
     * Retrieve Food record  line data for edit
     * 
     * 
     */  
    public function editRecord($eacode, $hcn, $shsn, $id)
    {

    $fct = DB::table('fct_new')->select('foodcode', 'fooddesc')->get();
    $line = F63::find ($id);
    return view('app.foodrecord_edit', compact('fct','line','id', 'eacode','hcn','shsn'));
    }



    /**
     * Update Membership Form 6.3
     *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateRecord(Request $request, $id)
    {
        $rules = array(

            'LINENO' => Rule::unique('d_f63')->ignore($id)->where(function ($query) use ($request) {
                        return $query
                        ->where('eacode','=', $request->get("eacode"))
                        ->where('hcn','=', $request->get("hcn"))
                        ->where('shsn','=', $request->get("shsn"));
                })
            );

            $notification = array(
                'message' => 'Oopps! Duplicate line number',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( $request->all(), $rules);
            if ($validator->fails())
            return redirect()->back()->with($notification);

        else {
            $record = F63::find($id);
            $record->LINENO = $request->get('LINENO');
            $record->FOODITEM = $request->get('FOODITEM');
            $record->DESCRIPTION = $request->get('DESCRIPTION');
            $record->BRANDNAME = $request->get('BRANDNAME');
            $record->MAINIGNT = $request->get('MAINIGNT');
            $record->BRANDCODE = $request->get('BRANDCODE');
            $record->MEALCD = $request->get('MEALCD');
            $record->WRCODE = $request->get('WRCODE');
            $record->RFCODE = $request->get('RFCODE');
            $record->FOODCODE = Str::substr($request->get('FOODDESC'), 0, 4);
            $record->FOODDESC = $request->get('FOODDESC');
            $record->FOODWEIGHT = $request->get('FOODWEIGHT');
            $record->RCC = $request->get('RCC');
            $record->CMC = $request->get('CMC');
            $record->SUPCODE = $request->get('SUPCODE');
            $record->SRCCODE = $request->get('SRCCODE');
            $record->PW_WGT = $request->get('PW_WGT');
            $record->PW_RCC = $request->get('PW_RCC');
            $record->PW_CMC = $request->get('PW_CMC');
            $record->PURCODE = $request->get('PURCODE');
            $record->GO_WGT = $request->get('GO_WGT');
            $record->GO_RCC = $request->get('GO_RCC');
            $record->GO_CMC = $request->get('GO_CMC');
            $record->LO_WGT = $request->get('LO_WGT');
            $record->LO_RCC = $request->get('LO_RCC');
            $record->LO_CMC = $request->get('LO_CMC');
            $record->UNITCOST = $request->get('UNITCOST');
            $record->UNITWGT = $request->get('UNITWGT');
            $record->UNIT = $request->get('UNIT');
            $record->updated_by = Auth::user()->name;
            $record->save();

            $notification = array(
                'message' => 'Data updated successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);

        }
    }

        
    // +++++++++++++++++++++++++++++++++++++  End Form 6.3 Controller  ++++++++++++++++++++++++++++++++++ //





    // +++++++++++++++++++++++++++++++++++++  Start Form 7.0 Controller  ++++++++++++++++++++++++++++++++++ //



    /**
    *  Insert Membership Form 7.0
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function insertF70(Request $request)
    {
        $rules = array(
            'refdate' => 'required',
            'refday' => 'required',
            'interview_status' => 'required'
            );

            $notification = array(
                'message' => 'Oopps! All fields required',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( $request->all(), $rules);
            if ($validator->fails())
            return redirect()->back()->with($notification);

        else {
        $indiv = new F70;
        $indiv->eacode = $request->get("eacode");
        $indiv->hcn = $request->get("hcn");
        $indiv->shsn = $request->get("shsn");
        $indiv->member_code = $request->get("member_code");
        $indiv->recday = $request->get("recday");
        $indiv->refdate = $request->get("refdate");
        $indiv->refday = $request->get("refday");
        $indiv->interview_status = $request->get("interview_status");
        $indiv->encoded_by = Auth::user()->name;
        $indiv->save();

        $notification = array(
            'message' => 'Data inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }
    }


    /**
    *  Update Membership Form 7.0
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateF70(Request $request, $id)
    {
        $rules = array(
            'refdate' => 'required',
            'refday' => 'required',
            'interview_status' => 'required'
            );

            $notification = array(
                'message' => 'Oopps! All fields required',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( $request->all(), $rules);
            if ($validator->fails())
            return redirect()->back()->with($notification);

        else {
        $indiv = F70::find($id);
        $indiv->eacode = $request->get("eacode");
        $indiv->hcn = $request->get("hcn");
        $indiv->shsn = $request->get("shsn");
        $indiv->member_code = $request->get("member_code");
        $indiv->recday = $request->get("recday");
        $indiv->refdate = $request->get("refdate");
        $indiv->refday = $request->get("refday");
        $indiv->interview_status = $request->get("interview_status");
        $indiv->updated_by = Auth::user()->name;
        $indiv->save();

        $notification = array(
            'message' => 'Data updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
        }
    }


     // +++++++++++++++++++++++++++++++++++++  End Form 7.0 Controller  ++++++++++++++++++++++++++++++++++ //




    // +++++++++++++++++++++++++++++++++++++  Start Form 7.2 Controller  ++++++++++++++++++++++++++++++++++ //


    /**
     * Get the Form 6.1 Membership
    *
    *
    *
    */  
    public function foodrecall($eacode, $hcn, $shsn)
    {
        $count = F11::where('eacode','LIKE','%'.$eacode.'%')
                    ->where('hcn','LIKE','%'.$hcn.'%')
                    ->where('shsn','LIKE','%'.$shsn.'%')
                    ->distinct()->get(['member_code'])->count();

        $memberships = F11::where('eacode','LIKE','%'.$eacode.'%')
                        ->where('hcn','LIKE','%'.$hcn.'%')
                        ->where('shsn','LIKE','%'.$shsn.'%')
                        ->orderBy('member_code', 'ASC')
                        ->get();

        return view('app.foodrecall',compact('count', 'memberships', 'eacode','hcn','shsn'));
    }


    /**
    * Encode Form 7.2
    *
    *
    *
    */
    public function foodrecallEncode($eacode, $hcn, $shsn, $membercode, $givenname, $surname, $age, $sex, $psc)
    {
    $memberships = F61::where('eacode','LIKE','%'.$eacode.'%')
                        ->where('hcn','LIKE','%'.$hcn.'%')
                        ->where('shsn','LIKE','%'.$shsn.'%')
                        ->where('MEMBER_CODE','LIKE','%'.$membercode.'%')
                        ->get();

        return view('app.foodrecall_encode',compact('memberships','eacode','hcn','shsn','membercode','givenname', 'surname', 'age','sex', 'psc'));
    } 


    /**
     * Food recall day  
     * 
     * 
     */ 
    public function foodRecallDay($eacode, $hcn, $shsn, $membercode, $givenname, $surname, $age, $sex, $psc, $recday)
    {

    $fct = DB::table('fct_new')->select('foodcode', 'fooddesc')->get();


    $f70 = F70::where('eacode','LIKE','%'.$eacode.'%')
                    ->where('hcn','LIKE','%'.$hcn.'%')
                    ->where('shsn','LIKE','%'.$shsn.'%')
                    ->where('member_code','LIKE','%'.$membercode.'%')
                    ->where('recday','LIKE','%'.$recday.'%')
                    ->get();

    return view('app.foodrecall_day',compact('fct','eacode','hcn','shsn','membercode','givenname', 'surname', 'age','sex', 'psc', 'recday','f70'));
    }


    /**
     * Insert Recall day 1 or 2
     * 
     * 
     */  
    public function insertRecall(Request $request)
    {

        $data = $request->all();

        if(count($request->LINENO) > 0)
        {
            foreach($request->LINENO as $input => $value)
            {
                $foodRecall = array(
                'eacode' => $request->get('eacode'),
                'hcn' => $request->get('hcn'),
                'shsn' => $request->get('shsn'),
                'MEMBER_CODE' => $request->get('MEMBER_CODE'),
                'RECDAY' => $request->get('RECDAY'),
                'LINENO' => $request->LINENO[$input],
                'FOOD_ITEM' => $request->FOOD_ITEM[$input],
                'FOODDESC' => $request->FOODDESC[$input],
                'FOODBRND' => $request->FOODBRND[$input],
                'FOODMAINING' => $request->FOODMAINING[$input],
                'FOODBRNDCD' => $request->FOODBRNDCD[$input],
                'FVS' => $request->FVS[$input],
                'ISFORTIFIED' => $request->ISFORTIFIED[$input],
                'VITA' => $request->VITA[$input],
                'IRON' => $request->IRON[$input],
                'OTHF' => $request->OTHF[$input],
                'MEALCD' => $request->MEALCD[$input],
                'RFCODE' => $request->RFCODE[$input],
                'FIC' => Str::substr($request->FOODCODE[$input], 0, 4),
                'FOODCODE' => $request->FOODCODE[$input],
                'FOODWEIGHT' => $request->FOODWEIGHT[$input],
                'RCC' => $request->RCC[$input],
                'CMC' => $request->CMC[$input],
                'SUPCODE' => $request->SUPCODE[$input],
                'SRCCODE' => $request->SRCCODE[$input],
                'CPC' => $request->CPC[$input],
                'UNITCOST' => $request->UNITCOST[$input],
                'UNITWGT' => $request->UNITWGT[$input],
                'UNITMEAS' => $request->UNITMEAS[$input],
                'encoded_by' => Auth::user()->name,        
                );

                F71::insertIgnore($foodRecall);
            }
        }

        $notification = array(
            'message' => 'Data inserted successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
        
    }
          


    /**
     * Retrieve all data from table d_f7.1 //
    *
    *
    */ 
    public function foodRecallDayView($eacode, $hcn, $shsn, $membercode, $givenname, $surname, $age, $sex, $psc, $recday)
    {

        $recalls = F71::where('eacode','LIKE','%'.$eacode.'%')
                ->where('hcn','LIKE','%'.$hcn.'%')
                ->where('shsn','LIKE','%'.$shsn.'%')
                ->where('MEMBER_CODE','LIKE','%'.$membercode.'%')
                ->where('RECDAY','LIKE','%'.$recday.'%')
                ->orderBy('LINENO', 'ASC')
                ->get();

        $count = F71::where('eacode','LIKE','%'.$eacode.'%')
                ->where('hcn','LIKE','%'.$hcn.'%')
                ->where('shsn','LIKE','%'.$shsn.'%')
                ->where('shsn','LIKE','%'.$shsn.'%')
                ->where('MEMBER_CODE','LIKE','%'.$membercode.'%')
                ->where('RECDAY','LIKE','%'.$recday.'%')
                ->get()->count();

        $f70 = F70::where('eacode','LIKE','%'.$eacode.'%')
                ->where('hcn','LIKE','%'.$hcn.'%')
                ->where('shsn','LIKE','%'.$shsn.'%')
                ->where('member_code','LIKE','%'.$membercode.'%')
                ->where('recday','LIKE','%'.$recday.'%')
                ->get();

    return view('app.foodrecall_view', compact('eacode','hcn','shsn','recalls','count','membercode','recday','givenname', 'surname', 'age','sex', 'psc', 'f70'));

    }


    /**
     * Retrieve Food record  line data for edit 
    *
    *
    */ 
    public function editRecall($eacode, $hcn, $shsn, $membercode, $givenname, $surname, $age, $sex, $psc, $recday, $id)
    {

    $fct = DB::table('fct_new')->select('foodcode', 'fooddesc')->get();
    $line = F71::find ($id);
    return view('app.foodrecall_edit', compact('fct','line','id', 'eacode','hcn','shsn', 'membercode','givenname', 'surname', 'age','sex', 'psc','recday'));

    }


        
    /**
     * Update Membership Form 7.2 
     *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateRecall(Request $request, $id)
    {

        $rules = array(
            
            'LINENO' => Rule::unique('d_f71')->ignore($id)->where(function ($query) use ($request) {
                        return $query
                        ->where('eacode','=', $request->get("eacode"))
                        ->where('hcn','=', $request->get("hcn"))
                        ->where('shsn','=', $request->get("shsn"))
                        ->where('MEMBER_CODE','=', $request->get("MEMBER_CODE"))
                        ->where('RECDAY','=', $request->get("RECDAY"));
                })
            );

            $notification = array(
                'message' => 'Oopps! Duplicate line number',
                'alert-type' => 'error'
            );

        $validator = Validator::make ( Input::all(), $rules);
            if ($validator->fails()) 
            return redirect()->back()->with($notification);

        else {
            $line = F71::find($id);
            $line->LINENO = $request->get("LINENO");
            $line->FOOD_ITEM = $request->get("FOOD_ITEM");
            $line->FOODDESC = $request->get("FOODDESC");
            $line->FOODBRND = $request->get("FOODBRND");
            $line->FOODMAINING = $request->get("FOODMAINING");
            $line->FOODBRNDCD = $request->get("FOODBRNDCD");
            $line->FVS = $request->get("FVS");
            $line->ISFORTIFIED = $request->get("ISFORTIFIED");
            $line->VITA = $request->get("VITA");
            $line->IRON = $request->get("IRON");
            $line->OTHF = $request->get("OTHF");
            $line->MEALCD = $request->get("MEALCD");
            $line->RFCODE = $request->get("RFCODE");
            $line->FIC = Str::substr($request->get('FOODCODE'), 0, 4);
            $line->FOODCODE = $request->get("FOODCODE");
            $line->FOODWEIGHT = $request->get("FOODWEIGHT");
            $line->RCC = $request->get("RCC");
            $line->CMC = $request->get("CMC");
            $line->SUPCODE = $request->get("SUPCODE");
            $line->SRCCODE = $request->get("SRCCODE");
            $line->CPC = $request->get("CPC");
            $line->UNITCOST = $request->get("UNITCOST");
            $line->UNITWGT = $request->get("UNITWGT");
            $line->UNITMEAS = $request->get("UNITMEAS");
            $line->updated_by = Auth::user()->name;
            $line->save();

            $notification = array(
                'message' => 'Data updated successfully!',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
    }

    // +++++++++++++++++++++++++++++++++++++  End Form 7.2 Controller  ++++++++++++++++++++++++++++++++++ //





    // +++++++++++++++++++++++++++++++++++++  Start Form 7.4 Controller  ++++++++++++++++++++++++++++++++++ //


    /**
     * Food recall form 7.4 
     * 
     * 
     */  
        public function foodRecallF74($eacode, $hcn, $shsn, $membercode, $givenname, $surname, $age, $sex, $psc )
    {   

        // f74 Questions
        $questions_1 = F74_Questions::where('f74_q_no','=','1')->get();
        $questions_2 = F74_Questions::where('f74_q_no','=','2')->get();
        $questions_3 = F74_Questions::where('f74_q_no','=','3')->get();
        $questions_4 = F74_Questions::where('f74_q_no','=','4')->get();
        $questions_5 = F74_Questions::where('f74_q_no','=','5')->get();
        $questions_6 = F74_Questions::where('f74_q_no','=','6')->get();

        // Meals
        $meals_1 = Meals::where('meals_cat','=','1')->get();
        $meals_2 = Meals::where('meals_cat','=','2')->get();
        $meals_4 = Meals::where('meals_cat','=','4')->get();
        $meals_6 = Meals::where('meals_cat','=','6')->get();
        $meals_7 = Meals::where('meals_cat','=','7')->get();
        $meals_9 = Meals::where('meals_cat','=','9')->get();
        $meals_11 = Meals::where('meals_cat','=','11')->get();
        $meals_12 = Meals::where('meals_cat','=','12')->get();

        // Options
        $options_1 = Options::where('options_cat','=','1')->get();
        $options_2 = Options::where('options_cat','=','2')->get();
        $options_7 = Options::where('options_cat','=','7')->get();

        // Reasons
        $reasons_1 = Reasons::where('reasons_cat','=','1')->get();
        $reasons_5 = Reasons::where('reasons_cat','=','5')->get();
        $reasons_8 = Reasons::where('reasons_cat','=','8')->get();
        $reasons_10 = Reasons::where('reasons_cat','=','10')->get();
        $reasons_13 = Reasons::where('reasons_cat','=','13')->get();

        $is = is::all();

        $form74 = F76::where('eacode','LIKE','%'.$eacode.'%')
            ->where('hcn','LIKE','%'.$hcn.'%')
            ->where('shsn','LIKE','%'.$shsn.'%')
            ->where('MEMBER_CODE','LIKE','%'.$membercode.'%')
            ->get();
        
        return view('app.foodrecall_f74',compact(
            'eacode',
            'hcn',
            'shsn', 
            'membercode',
            'givenname',
            'surname', 
            'age',
            'sex', 
            'psc',
            'questions_1',
            'questions_2',
            'questions_3',
            'questions_4',
            'questions_5',
            'questions_6',
            'meals_1',
            'meals_2',
            'meals_4',
            'meals_6',
            'meals_7',
            'meals_9',
            'meals_11',
            'meals_12',
            'options_1',
            'options_2',
            'options_7',
            'reasons_1',
            'reasons_5',
            'reasons_8',
            'reasons_10',
            'reasons_13',
            'is',
            'form74'
        ));

    }


    /**
     * Insert Form 7.4 Data 
    *
    *
    */  
    public function insertForm74(Request $request)
    {

        $line = new F76;
        $line->eacode = $request->get("eacode");
        $line->hcn = $request->get("hcn");
        $line->shsn = $request->get("shsn");
        $line->MEMBER_CODE = $request->get("MEMBER_CODE");
        $line->RES_NO = $request->get("RES_NO");
        $line->RES_NAME = $request->get("RES_NAME");
        $line->tick_A = $request->get("tick_A");
        $line->tick_B = $request->get("tick_B");
        $line->tick_C = $request->get("tick_C");
        $line->tick_D = $request->get("tick_D");
        $line->tick_E = $request->get("tick_E");
        $line->tick_F = $request->get("tick_F");
        $line->BF_1 = $request->get("BF_1");
        $line->BF_1_OTH = $request->get("BF_1_OTH");
        $line->LU_1 = $request->get("LU_1");
        $line->LU_1_OTH = $request->get("LU_1_OTH");
        $line->SU_1 = $request->get("SU_1");
        $line->SU_1_OTH = $request->get("SU_1_OTH");
        $line->BF_2 = $request->get("BF_2");
        $line->BF_2_OTH = $request->get("BF_2_OTH");
        $line->LU_2 = $request->get("LU_2");
        $line->LU_2_OTH = $request->get("LU_2_OTH");
        $line->SU_2 = $request->get("SU_2");
        $line->SU_2_OTH = $request->get("SU_2_OTH");
        $line->time_3 = $request->get("time_3");
        $line->cost_3 = $request->get("cost_3");
        $line->lack_3 = $request->get("lack_3");
        $line->vary_3 = $request->get("vary_3");
        $line->health_3 = $request->get("health_3");
        $line->safe_3 = $request->get("safe_3");
        $line->qual_3 = $request->get("qual_3");
        $line->util_3 = $request->get("util_3");
        $line->oth_3 = $request->get("oth_3");
        $line->BF_4 = $request->get("BF_4");
        $line->BF_4_OTH = $request->get("BF_4_OTH");
        $line->LU_4 = $request->get("LU_4");
        $line->LU_4_OTH = $request->get("LU_4_OTH");
        $line->SU_4 = $request->get("SU_4");
        $line->SU_4_OTH = $request->get("SU_4_OTH");
        $line->time_5 = $request->get("time_5");
        $line->cost_5 = $request->get("cost_5");
        $line->lack_5 = $request->get("lack_5");
        $line->vary_5 = $request->get("vary_5");
        $line->health_5 = $request->get("health_5");
        $line->safe_5 = $request->get("safe_5");
        $line->qual_5 = $request->get("qual_5");
        $line->util_5 = $request->get("util_5");
        $line->cc_5 = $request->get("cc_5");
        $line->oth_5 = $request->get("oth_5");
        $line->BF_6 = $request->get("BF_6");
        $line->BF_6_OTH = $request->get("BF_6_OTH");
        $line->LU_6 = $request->get("LU_6");
        $line->LU_6_OTH = $request->get("LU_6_OTH");
        $line->SU_6 = $request->get("SU_6");
        $line->SU_6_OTH = $request->get("SU_6_OTH");
        $line->BF_7 = $request->get("BF_7");
        $line->BF_7_OTH = $request->get("BF_7_OTH");
        $line->LU_7 = $request->get("LU_7");
        $line->LU_7_OTH = $request->get("LU_7_OTH");
        $line->SU_7 = $request->get("SU_7");
        $line->SU_7_OTH = $request->get("SU_7_OTH");
        $line->time_8 = $request->get("time_8");
        $line->cost_8 = $request->get("cost_8");
        $line->lack_8 = $request->get("lack_8");
        $line->vary_8 = $request->get("vary_8");
        $line->health_8 = $request->get("health_8");
        $line->safe_8 = $request->get("safe_8");
        $line->qual_8 = $request->get("qual_8");
        $line->util_8 = $request->get("util_8");
        $line->cc_8 = $request->get("cc_8");
        $line->oth_8 = $request->get("oth_8");
        $line->BF_9 = $request->get("BF_9");
        $line->BF_9_OTH = $request->get("BF_9_OTH");
        $line->LU_9 = $request->get("LU_9");
        $line->LU_9_OTH = $request->get("LU_9_OTH");
        $line->SU_9 = $request->get("SU_9");
        $line->SU_9_OTH = $request->get("SU_9_OTH");
        $line->time_10 = $request->get("time_10");
        $line->cost_10 = $request->get("cost_10");
        $line->lack_10 = $request->get("lack_10");
        $line->vary_10 = $request->get("vary_10");
        $line->health_10 = $request->get("health_10");
        $line->safe_10 = $request->get("safe_10");
        $line->qual_10 = $request->get("qual_10");
        $line->util_10 = $request->get("util_10");
        $line->cc_10 = $request->get("cc_10");
        $line->oth_10 = $request->get("oth_10");
        $line->BF_11 = $request->get("BF_11");
        $line->BF_11_OTH = $request->get("BF_11_OTH");
        $line->LU_11 = $request->get("LU_11");
        $line->LU_11_OTH = $request->get("LU_11_OTH");
        $line->SU_11 = $request->get("SU_11");
        $line->SU_11_OTH = $request->get("SU_11_OTH");
        $line->BF_12 = $request->get("BF_12");
        $line->BF_12_OTH = $request->get("BF_12_OTH");
        $line->LU_12 = $request->get("LU_12");
        $line->LU_12_OTH = $request->get("LU_12_OTH");
        $line->SU_12 = $request->get("SU_12");
        $line->SU_12_OTH = $request->get("SU_12_OTH");
        $line->time_13 = $request->get("time_13");
        $line->cost_13 = $request->get("cost_13");
        $line->lack_13 = $request->get("lack_13");
        $line->vary_13 = $request->get("vary_13");
        $line->health_13 = $request->get("health_13");
        $line->safe_13 = $request->get("safe_13");
        $line->qual_13 = $request->get("qual_13");
        $line->util_13 = $request->get("util_13");
        $line->cc_13 = $request->get("cc_13");
        $line->oth_13 = $request->get("oth_13");
        $line->INTERVIEW_STATUS = $request->get("INTERVIEW_STATUS");
        $line->encoded_by = Auth::user()->name;
        $line->save();

        $notification = array(
            'message' => 'Data inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    
    }



        
    /**
     * Update Membership Form 7.4 
     *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateF74(Request $request, $id)
    {

        $line = F76::find($id);
        $line->tick_A = $request->get("tick_A");
        $line->tick_B = $request->get("tick_B");
        $line->tick_C = $request->get("tick_C");
        $line->tick_D = $request->get("tick_D");
        $line->tick_E = $request->get("tick_E");
        $line->tick_F = $request->get("tick_F");
        $line->BF_1 = $request->get("BF_1");
        $line->BF_1_OTH = $request->get("BF_1_OTH");
        $line->LU_1 = $request->get("LU_1");
        $line->LU_1_OTH = $request->get("LU_1_OTH");
        $line->SU_1 = $request->get("SU_1");
        $line->SU_1_OTH = $request->get("SU_1_OTH");
        $line->BF_2 = $request->get("BF_2");
        $line->BF_2_OTH = $request->get("BF_2_OTH");
        $line->LU_2 = $request->get("LU_2");
        $line->LU_2_OTH = $request->get("LU_2_OTH");
        $line->SU_2 = $request->get("SU_2");
        $line->SU_2_OTH = $request->get("SU_2_OTH");
        $line->time_3 = $request->get("time_3");
        $line->cost_3 = $request->get("cost_3");
        $line->lack_3 = $request->get("lack_3");
        $line->vary_3 = $request->get("vary_3");
        $line->health_3 = $request->get("health_3");
        $line->safe_3 = $request->get("safe_3");
        $line->qual_3 = $request->get("qual_3");
        $line->util_3 = $request->get("util_3");
        $line->oth_3 = $request->get("oth_3");
        $line->BF_4 = $request->get("BF_4");
        $line->BF_4_OTH = $request->get("BF_4_OTH");
        $line->LU_4 = $request->get("LU_4");
        $line->LU_4_OTH = $request->get("LU_4_OTH");
        $line->SU_4 = $request->get("SU_4");
        $line->SU_4_OTH = $request->get("SU_4_OTH");
        $line->time_5 = $request->get("time_5");
        $line->cost_5 = $request->get("cost_5");
        $line->lack_5 = $request->get("lack_5");
        $line->vary_5 = $request->get("vary_5");
        $line->health_5 = $request->get("health_5");
        $line->safe_5 = $request->get("safe_5");
        $line->qual_5 = $request->get("qual_5");
        $line->util_5 = $request->get("util_5");
        $line->cc_5 = $request->get("cc_5");
        $line->oth_5 = $request->get("oth_5");
        $line->BF_6 = $request->get("BF_6");
        $line->BF_6_OTH = $request->get("BF_6_OTH");
        $line->LU_6 = $request->get("LU_6");
        $line->LU_6_OTH = $request->get("LU_6_OTH");
        $line->SU_6 = $request->get("SU_6");
        $line->SU_6_OTH = $request->get("SU_6_OTH");
        $line->BF_7 = $request->get("BF_7");
        $line->BF_7_OTH = $request->get("BF_7_OTH");
        $line->LU_7 = $request->get("LU_7");
        $line->LU_7_OTH = $request->get("LU_7_OTH");
        $line->SU_7 = $request->get("SU_7");
        $line->SU_7_OTH = $request->get("SU_7_OTH");
        $line->time_8 = $request->get("time_8");
        $line->cost_8 = $request->get("cost_8");
        $line->lack_8 = $request->get("lack_8");
        $line->vary_8 = $request->get("vary_8");
        $line->health_8 = $request->get("health_8");
        $line->safe_8 = $request->get("safe_8");
        $line->qual_8 = $request->get("qual_8");
        $line->util_8 = $request->get("util_8");
        $line->cc_8 = $request->get("cc_8");
        $line->oth_8 = $request->get("oth_8");
        $line->BF_9 = $request->get("BF_9");
        $line->BF_9_OTH = $request->get("BF_9_OTH");
        $line->LU_9 = $request->get("LU_9");
        $line->LU_9_OTH = $request->get("LU_9_OTH");
        $line->SU_9 = $request->get("SU_9");
        $line->SU_9_OTH = $request->get("SU_9_OTH");
        $line->time_10 = $request->get("time_10");
        $line->cost_10 = $request->get("cost_10");
        $line->lack_10 = $request->get("lack_10");
        $line->vary_10 = $request->get("vary_10");
        $line->health_10 = $request->get("health_10");
        $line->safe_10 = $request->get("safe_10");
        $line->qual_10 = $request->get("qual_10");
        $line->util_10 = $request->get("util_10");
        $line->cc_10 = $request->get("cc_10");
        $line->oth_10 = $request->get("oth_10");
        $line->BF_11 = $request->get("BF_11");
        $line->BF_11_OTH = $request->get("BF_11_OTH");
        $line->LU_11 = $request->get("LU_11");
        $line->LU_11_OTH = $request->get("LU_11_OTH");
        $line->SU_11 = $request->get("SU_11");
        $line->SU_11_OTH = $request->get("SU_11_OTH");
        $line->BF_12 = $request->get("BF_12");
        $line->BF_12_OTH = $request->get("BF_12_OTH");
        $line->LU_12 = $request->get("LU_12");
        $line->LU_12_OTH = $request->get("LU_12_OTH");
        $line->SU_12 = $request->get("SU_12");
        $line->SU_12_OTH = $request->get("SU_12_OTH");
        $line->time_13 = $request->get("time_13");
        $line->cost_13 = $request->get("cost_13");
        $line->lack_13 = $request->get("lack_13");
        $line->vary_13 = $request->get("vary_13");
        $line->health_13 = $request->get("health_13");
        $line->safe_13 = $request->get("safe_13");
        $line->qual_13 = $request->get("qual_13");
        $line->util_13 = $request->get("util_13");
        $line->cc_13 = $request->get("cc_13");
        $line->oth_13 = $request->get("oth_13");
        $line->INTERVIEW_STATUS = $request->get("INTERVIEW_STATUS");
        $line->updated_by = Auth::user()->name;
        $line->save();

        $notification = array(
            'message' => 'Data updated successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }



    // +++++++++++++++++++++++++++++++++++++  End Form 7.4 Controller  ++++++++++++++++++++++++++++++++++ //



    
}
