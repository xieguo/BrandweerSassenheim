<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportSourceField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function(Blueprint $table)
        {
            $table->string('source')
                ->default('manual')
                ->nullable()
                ->after('is_visible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function(Blueprint $table)
        {
            $table->dropColumn('source');
        });
    }
}
