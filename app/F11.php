<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F11 extends Model
{
   /**
     * Define base table
     * 
     * 
     */
   protected $table = 'd_f11';

   
   public $fillable = [
   'row_id',
      'id',
   'eacode',
   'hcn',
   'shsn',
   'MEMBER_CODE',
   'SURNAME',
   'GIVENNAME',
   'NBI',
   'MOM',
   'ADOPTED',
   'BIOMOM',
   'BIODAD',
   'DAD',
   'DBIRTH',
   'REFDATE',
   'ES_DBI',
   'AGE',
   'SEX',
   'CSC',
   'PSC',
   'MATERNAL',
   'RHC',
   'EDUC',
   'EDUC_COURSE',
   'EDUC_OTH',
   'SCHOOL',
   'WORK',
   'OCCUPATION',
   'OCCUPATION_CODE',
   'WRKPLACE',
   'W_CLASS',
   'RELIGION',
   'OTH_REL',
   'othREL',
   'REMARKS',
   'memkey',
   'DATE_ADDED',
   'DATE_EDIT',
   'INTERVIEW_STATUS',
   'INTERVIEW_STATUS_OTH',
   'INTERVIEW_STATUS1',
   'INTERVIEW_STATUS2',
   'INTERVIEW_STATUS3',
   'visit1',
   'visit2',
   'visit3',
   'comment1',
   'comment2',
   'comment3',
   'INTERVIEW_STATUSF',
   'username',
   'is_f31',
   'is_f32',
   'is_f41',
   'is_f42',
   'is_f43',
   'is_f44',
   'is_f45',
   'is_f46',
   'is_f47',
   'is_f48',
   'is_f410',
   'is_f52',
   'is_f53',
   'is_f54',
   'is_f55',
   'is_f56',
   'is_f57',
   'is_f58',
   'is_f73',
   'is_f82',
   'is_f411',
   'is_f59',
   'is_f49',
   'is_f74',
   'is_f75',
   'die2ndgen',
   'mp'
   ];

   
   /**
    * Exclude method
    * 
    * 
    */
   protected $columns = array(
   'row_id',
   'id',
   'eacode',
   'hcn',
   'shsn',
   'MEMBER_CODE',
   'SURNAME',
   'GIVENNAME',
   'NBI',
   'MOM',
   'ADOPTED',
   'BIOMOM',
   'BIODAD',
   'DAD',
   'DBIRTH',
   'REFDATE',
   'ES_DBI',
   'AGE',
   'SEX',
   'CSC',
   'PSC',
   'MATERNAL',
   'RHC',
   'EDUC',
   'EDUC_COURSE',
   'EDUC_OTH',
   'SCHOOL',
   'WORK',
   'OCCUPATION',
   'OCCUPATION_CODE',
   'WRKPLACE',
   'W_CLASS',
   'RELIGION',
   'OTH_REL',
   'othREL',
   'REMARKS',
   'memkey',
   'DATE_ADDED',
   'DATE_EDIT',
   'INTERVIEW_STATUS',
   'INTERVIEW_STATUS_OTH',
   'INTERVIEW_STATUS1',
   'INTERVIEW_STATUS2',
   'INTERVIEW_STATUS3',
   'visit1',
   'visit2',
   'visit3',
   'comment1',
   'comment2',
   'comment3',
   'INTERVIEW_STATUSF',
   'username',
   'is_f31',
   'is_f32',
   'is_f41',
   'is_f42',
   'is_f43',
   'is_f44',
   'is_f45',
   'is_f46',
   'is_f47',
   'is_f48',
   'is_f410',
   'is_f52',
   'is_f53',
   'is_f54',
   'is_f55',
   'is_f56',
   'is_f57',
   'is_f58',
   'is_f73',
   'is_f82',
   'is_f411',
   'is_f59',
   'is_f49',
   'is_f74',
   'is_f75',
   'die2ndgen',
   'mp'
   ); 

   public function scopeExclude($query,$value = array()) 
   {
    return $query->select( array_diff( $this->columns,(array) $value) );
   }
}




