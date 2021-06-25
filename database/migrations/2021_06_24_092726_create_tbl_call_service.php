<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCallService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_call_service', function (Blueprint $table) {
            $table->Increments('call_service_id');
            $table->string('call_service_name');
            $table->integer('call_service_price');
            $table->text('call_service_content');
            $table->integer('call_service_status');
            $table->timestamps();
        });
    }

 }