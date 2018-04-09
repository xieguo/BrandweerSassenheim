<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleSourceFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function(Blueprint $table)
        {
            $table->string('source')->nullable();
            $table->string('source_guid')->nullable();
            $table->string('source_link')->nullable();

            $table->index('source_guid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function(Blueprint $table)
        {
            $table->dropColumns(['source', 'source_link', 'source_guid'])->nullable();
        });
    }
}
