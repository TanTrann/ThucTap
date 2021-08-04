<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderDaugia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_daugia', function (Blueprint $table) {
            $table->Increments('daugia_id');    
            $table->string('Hoten_KH');
            $table->text('Sdt_KH');
            $table->text('Giadau_KH');
            $table->text('Diachi_KH');
            $table->text('Donhang_code');
            $table->timestamps();
        });
    }

  
}
