<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableIrregularVisitorLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('irregular_visitor_logs', function (Blueprint $table) {
            $table->binary('blob_image');
            $table->boolean('added_to_collection')->default(0);
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
            $table->dropColumn('blob_image');
            $table->dropColumn('added_to_collection');
        });
    }
}
