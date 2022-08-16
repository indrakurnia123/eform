<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNpwpToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('vici_id')->after('request_number')->nullable();
            $table->string('npwp',20)->after('nik')->nullable();
            $table->string('birth_place',20)->after('name')->nullable();
            $table->date('birth_date')->after('birth_place')->nullable();
            $table->string('mother_name')->after('address')->nullable();
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
            $table->dropColumn('vici_id');
            $table->dropColumn('npwp');
            $table->dropColumn('birth_place');
            $table->dropColumn('birth_date');
            $table->dropColumn('mother_name');
        });
    }
}
