<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->Increments('news_id');
            $table->string('news_name');
            $table->string('news_images');
            $table->text('news_content');
            $table->text('news_desc');
            $table->integer('news_status');
            $table->timestamps();
        });
    }

   
}
