<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'service_name', 'service_images','service_status','service_content'
    ];
    protected $primaryKey = 'service_id';
 	protected $table = 'tbl_service';
}
