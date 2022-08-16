<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRequestTableNullableField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('subdistrict_id')->nullable()->change();
            $table->string('district_id')->nullable()->change();
            $table->string('city_id')->nullable()->change();
            $table->string('province_id')->nullable()->change();
            $table->string('postcode')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('subdistrict_id')->change();
            $table->string('district_id')->change();
            $table->string('city_id')->change();
            $table->string('province_id')->change();
            $table->string('postcode')->change();
        });
    }
}
