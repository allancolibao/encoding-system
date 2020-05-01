<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csvdata extends Model
{
    protected $connection = 'mysql';
    
    protected $table = 'csv_data';
    
    protected $fillable = ['csv_filename', 'csv_header', 'csv_data'];
}
