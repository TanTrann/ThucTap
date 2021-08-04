<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DauGia extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'sp_daugia', 'anh_daugia','daugia_status','chitiet_daugia','date_start','date_end','price_start'
    ];
    protected $primaryKey = 'daugia_id';
 	protected $table = 'tbl_daugia';
}
