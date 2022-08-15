<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntryAllowedToIrregularVisitorLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('irregular_visitor_logs', function (Blueprint $table) {
            $table->boolean('entry_allowed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('irregular_visitor_logs', function (Blueprint $table) {
            $table->dropColumn('entry_allowed');
        });
    }
}
