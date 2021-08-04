<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'data_service_name', 'data_service_images','data_service_status','data_service_content'
    ];
    protected $primaryKey = 'data_service_id';
 	protected $table = 'tbl_data_service';
}
