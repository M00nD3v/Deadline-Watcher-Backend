<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lvas', function (Blueprint $table) {
            $table->string('name_long')->virtualAs('concat(abbreviation, \' - \', name)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lvas', function (Blueprint $table) {
            $table->dropColumn('name_long');
        });
    }
};
