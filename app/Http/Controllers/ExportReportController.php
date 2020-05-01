<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\http\Requests;
use Validator;
use Response;
use Auth;
use DB;
use App\User;
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

class ExportReportController extends Controller
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
     * Export Report
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exportReport()
    {
        $today = Carbon::now()->toDateString();

        $user = User::orderBy('last_name', 'asc')->get();


        $filename = "Encoder Report $today.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Name of Encoders', 'Booklet 9', 'Booklet 10A', 'Booklet 10B','Booklet 10C', 'Total'));

        foreach($user as $row) {

            $b9 = DB::table('d_f63')
                    ->join('users', 'users.name', '=', 'd_f63.encoded_by')
                    ->where('d_f63.created_at', 'LIKE', '%'.$today.'%')
                    ->where('d_f63.encoded_by', '=', $row->name)
                    ->get(['d_f63.LINENO'])->count();

            $b10a = DB::table('d_f71')
                    ->join('d_f11', function ($join) {
                        $join->on('d_f11.eacode', '=', 'd_f71.eacode')
                             ->on('d_f11.hcn', '=', 'd_f71.hcn')
                             ->on('d_f11.shsn', '=', 'd_f71.shsn')
                             ->on('d_f11.member_code', '=', 'd_f71.MEMBER_CODE');     
                    })
                    ->where('d_f11.age', '<', 3)
                    ->where('d_f71.encoded_by', '=', $row->name)
                    ->where('d_f71.created_at', 'LIKE', '%'.$today.'%')
                    ->get(['d_f71.LINENO'])->count();

            $b10b = DB::table('d_f71')
                    ->join('d_f11', function ($join) {
                        $join->on('d_f11.eacode', '=', 'd_f71.eacode')
                             ->on('d_f11.hcn', '=', 'd_f71.hcn')
                             ->on('d_f11.shsn', '=', 'd_f71.shsn')
                             ->on('d_f11.member_code', '=', 'd_f71.MEMBER_CODE');        
                    })
                    ->where('d_f11.age', '>', 3)
                    ->where('d_f11.age', '<', 15)
                    ->where('d_f71.encoded_by', '=', $row->name)
                    ->where('d_f71.created_at', 'LIKE', '%'.$today.'%')
                    ->get(['d_f71.LINENO'])->count();

             $b10c = DB::table('d_f71')
                    ->join('d_f11', function ($join) {
                        $join->on('d_f11.eacode', '=', 'd_f71.eacode')
                             ->on('d_f11.hcn', '=', 'd_f71.hcn')
                             ->on('d_f11.shsn', '=', 'd_f71.shsn')
                             ->on('d_f11.member_code', '=', 'd_f71.MEMBER_CODE');  
                    })
                    ->where('d_f11.age', '>', 15)
                    ->where('d_f71.encoded_by', '=', $row->name)
                    ->where('d_f71.created_at', 'LIKE', '%'.$today.'%')
                    ->get(['d_f71.LINENO'])->count();

            $total = $b9 + $b10a + $b10b + $b10c;

            
            fputcsv($handle, array($row->last_name.' '.$row->first_name, $b9, $b10a, $b10b, $b10c, $total  ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'csv',
        );
        

        return Response::download($filename, "Encoder Report $today.csv", $headers)->deleteFileAfterSend(true);
    }
}
