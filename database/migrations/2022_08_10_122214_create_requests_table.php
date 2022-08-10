<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_number',50);
            $table->string('nik',16);
            $table->string('name',150);
            $table->string('address',200);
            $table->string('phone',20);
            $table->integer('subdistrict_id');
            $table->integer('district_id');
            $table->integer('city_id');
            $table->integer('province_id');
            $table->integer('postcode');
            $table->integer('office_id');
            $table->date('request_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
