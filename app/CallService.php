<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallService extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'call_service_name', 'call_service_images','call_service_status','call_service_content'
    ];
    protected $primaryKey = 'call_service_id';
 	protected $table = 'tbl_call_service';
}
