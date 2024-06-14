<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddImageToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the column doesn't exist before adding it
        if (!Schema::hasColumn('projects', 'image')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('image')->nullable(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('projects', 'image')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
}
