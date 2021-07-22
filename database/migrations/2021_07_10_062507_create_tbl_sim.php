<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sim', function (Blueprint $table) {
            $table->Increments('sim_id');
            $table->integer('sim_number');
            $table->text('sim_desc');
            $table->integer('sim_status');
            $table->timestamps();
        });
    }

  
}
