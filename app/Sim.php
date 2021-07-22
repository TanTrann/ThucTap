<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sim extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'sim_name','sim_content','sim_price','sim_status'];
    protected $primaryKey = 'sim_id';
 	protected $table = 'tbl_sim';


 

}
