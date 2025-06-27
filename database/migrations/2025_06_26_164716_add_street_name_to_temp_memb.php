<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStreetNameToTempMemb extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('temp_memb', function (Blueprint $table) {
            $table->string('street_name', 100)->after('street_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('temp_memb', function (Blueprint $table) {
            $table->dropColumn('street_name');
        });
    }
}