<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;
use App\F11;
use App\Csvdata;
use Session;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app.home');
    }

    // Import CSV to view table
    public function parseImport(CsvImportRequest $request)
    {   
        
        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }
        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
          
            $csv_data = array_slice($data, 0, 9);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        return view('app.view_csv', compact( 'csv_header_fields','csv_data', 'csv_data_file'));
    }
    

    // Upload csv to DB
    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $f11 = new F11();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $f11->$field = $row[$request->fields[$field]];
                } else {
                    $f11->$field = $row[$request->fields[$index]];
                }
            }
            $f11->save();
        }

        $notification = array(
            'message' => 'Data inserted successfully!',
            'alert-type' => 'success'
        );

        return redirect('/home')->with($notification);
    }

}
