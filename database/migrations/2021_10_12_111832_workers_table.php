<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Wokers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('e_status');
            $table->integer('wage')->nullable()->default(NULL);
            $table->integer('t_time')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Wokers');
    }
}
