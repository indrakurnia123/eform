<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViciScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vici_scores', function (Blueprint $table) {
            $table->id();
            $table->string('request_reff_id',25)->nullable();
            $table->longtext('requests')->nullable();
            $table->longtext('response')->nullable();
            $table->string('status')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('code')->nullable();
            $table->string('response_time')->nullable();
            $table->string('message')->nullable();
            $table->string('trx_id')->nullable();
            $table->longtext('data')->nullable();
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
        Schema::dropIfExists('vici_scores');
    }
}
