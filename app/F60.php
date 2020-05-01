<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F60 extends Model
{   
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'd_f60';

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
    'refdate',
    'refday',
    'pets',
    'meal_pattern',
    'interview_status',
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
