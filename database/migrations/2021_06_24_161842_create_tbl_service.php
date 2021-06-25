<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->Increments('service_id');
            $table->string('service_name');
            $table->string('service_images');
            $table->text('service_content');
            $table->integer('service_status');
            $table->timestamps();
        });
    }

    
}

