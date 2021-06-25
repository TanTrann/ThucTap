<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDataService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data_service', function (Blueprint $table) {
            $table->Increments('data_service_id');
            $table->string('data_service_name');
            $table->integer('data_service_price');
            $table->text('data_service_content');
            $table->integer('data_service_status');
         
            $table->timestamps();
        });
    }

    
}

