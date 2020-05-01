<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use DB;

class F63 extends Model
{

    /**
     *  Use to define base table
     * 
     * 
     */
    protected $table = 'd_f63';


    /**
     * Insert Ignore Function
     * 
     * 
     */ 
    public static function insertIgnore($array){
        $a = new static();
            if($a->timestamps){
                $now = \Carbon\Carbon::now();
                $array['created_at'] = $now;
                $array['updated_at'] = $now;
            }
            DB::insert('INSERT IGNORE INTO '.$a->table.' ('.implode(',',array_keys($array)).
                ') values (?'.str_repeat(',?',count($array) - 1).')',array_values($array));
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'eacode',
            'hcn',
            'shsn',
            'LINENO',
            'FOODITEM',
            'DESCRIPTION',
            'BRANDNAME',
            'MAINIGNT',
            'BRANDCODE',
            'MEALCD',
            'WRCODE',
            'RFCODE',
            'FOODEX',
            'FOODDESC',
            'FOODDESC',
            'FOODWEIGHT',
            'RCC',
            'CMC',
            'SUPCODE',
            'SRCCODE',
            'OTH_SRC',
            'PW_WGT',
            'PW_RCC',
            'PW_CMC',
            'PURCODE',
            'GO_WGT',
            'GO_RCC',
            'GO_CMC',
            'LO_WGT',
            'LO_RCC',
            'LO_CMC',
            'UNITCOST',
            'UNITWGT',
            'UNIT'
        ];

    /**
     * Exclude method
     * 
     * 
     */
    protected $columns = array(
    'id',
    'eacode', 
    'hcn', 
    'shsn', 
    'LINENO',
    'FOODITEM',
    'DESCRIPTION',
    'BRANDNAME',
    'MAINIGNT',
    'BRANDCODE',
    'MEALCD',
    'WRCODE',
    'RFCODE',
    'FOODCODE', 
    'FOODDESC',
    'FOODWEIGHT',
    'RCC',
    'CMC',
    'SUPCODE',
    'SRCCODE',
    'PW_WGT',
    'PW_RCC',
    'PW_CMC',
    'PURCODE',
    'GO_WGT',
    'GO_RCC',
    'GO_CMC',
    'LO_WGT',
    'LO_RCC',
    'LO_CMC',
    'UNITCOST',
    'UNITWGT',
    'UNIT',
    'encoded_by',
    'updated_by',
    'created_at', 
    'updated_at' 
    ); 
             
    public function scopeExclude($query,$value = array()) 
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }
}


