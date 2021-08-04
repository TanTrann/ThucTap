<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDaugia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_daugia', function (Blueprint $table) {
            $table->Increments('daugia_id');
            $table->string('sp_daugia');
            $table->string('anh_daugia');
            $table->text('chitiet_daugia');
            $table->text('date_end');
            $table->text('date_start');
            $table->text('price');
            $table->timestamps();
        });
    }

  
}
