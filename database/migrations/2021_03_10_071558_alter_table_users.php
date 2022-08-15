<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('member_id', 5); //ex. M0001
            $table->string('society_id', 5);
            $table->string('flat_number',5);
            $table->string('phone_number',15)->unique();
            $table->string('role',10);
            $table->string('profile_photo',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('member_id');
            $table->dropColumn('society_id');
            $table->dropColumn('flat_number');
            $table->dropColumn('phone_number');
            $table->dropColumn('role');
            $table->dropColumn('profile_photo');
        });
    }
}
