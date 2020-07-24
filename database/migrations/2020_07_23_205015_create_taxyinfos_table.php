<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxyinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxy_infos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('plat_no')->nullable();
                $table->string('model')->nullable();
                $table->string('brand')->nullable();
                $table->string('type')->nullable();
                $table->string('area')->nullable();
                $table->string('status')->nullable();
                //$table->date('expirydate')->nullable();
                $table->timestamps();
                //$table->biginteger('user_id')->unsigned(); 
                //$table->foreign('user_id')->references('id')->on('users');                           
            });

    }

            

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxyinfos');
    }
}
