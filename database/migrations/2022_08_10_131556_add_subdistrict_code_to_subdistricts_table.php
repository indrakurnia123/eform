<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubdistrictCodeToSubdistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subdistricts', function (Blueprint $table) {
            $table->string('subdistrict_code')->after('id');
            $table->integer('city_id')->after('district_id');
            $table->integer('province_id')->after('city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subdistricts', function (Blueprint $table) {
            $table->dropColumn('subdistrict_code');
            $table->dropColumn('city_id');
            $table->dropColumn('province_id');
        });
    }
}
