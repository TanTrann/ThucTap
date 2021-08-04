<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDauGia extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'Hoten_KH', 'Sdt_KH','Diachi_KH','CMND_KH','Giadau_KH','date_end','daugia_id'
    ];
    protected $primaryKey = 'order_daugia_id';
 	protected $table = 'tbl_order_daugia';
}
