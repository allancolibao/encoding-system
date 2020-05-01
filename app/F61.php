<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F61 extends Model
{
    protected $table = 'd_f61';

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
    'SURNAME',
    'GIVENNAME', 
    'AGE', 
    'SEX',
    'PSC', 
    'MP', 
    'BF', 
    'AMSNCK',
    'LUNCH',
    'PMSNCK', 
    'SUPPER', 
    'LATESNCK',
    'visitor',
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
