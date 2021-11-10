<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimesUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Times',function (Blueprint $table) {
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->after('time');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->after('update_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Times',function (Blueprint $table) {
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->after('time');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->after('update_at');
        });
    }
}
