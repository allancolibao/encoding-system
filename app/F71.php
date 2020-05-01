<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use DB;


class F71 extends Model
{
    /**
     * Use to define base table
     * 
     * 
     */
    protected $table = 'd_f71';


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
     * Exclude method
     * 
     * 
     */
    protected $columns = array(
    'id',
    'eacode',
    'hcn',
    'shsn',
    'MEMBER_CODE',
    'RECDAY',
    'LINENO',
    'FOOD_ITEM',
    'FOODDESC',
    'FOODBRND',
    'FVS',
    'ISFORTIFIED',
    'VITA',
    'IRON',
    'OTHF',
    'FOODMAINING',
    'FOODBRNDCD',
    'AMTSIZEMEAS',
    'MEALCD',
    'RFCODE',
    'FIC',
    'FOODCODE',
    'FOODWEIGHT',
    'RCC',
    'CMC',
    'SUPCODE',
    'SRCCODE',
    'CPC',
    'UNITCOST',
    'UNITWGT',
    'UNITMEAS',
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
