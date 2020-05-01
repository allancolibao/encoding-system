<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F70 extends Model
{
    protected $table = 'd_f70';

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
    'member_code', 
    'recday',
    'refdate',
    'refday',
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
