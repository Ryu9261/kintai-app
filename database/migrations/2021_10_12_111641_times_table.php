<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date')->nullable()->default(NULL);
            $table->timestamp('s_time')->nullable()->default(NULL);
            $table->timestamp('e_time')->nullable()->default(NULL);
            $table->integer('time')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Times');
    }
}
