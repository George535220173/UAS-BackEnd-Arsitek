<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainCategoryToProjectCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('project_categories', function (Blueprint $table) {
            $table->string('main_category')->after('id');
        });
    }

    public function down()
    {
        Schema::table('project_categories', function (Blueprint $table) {
            $table->dropColumn('main_category');
        });
    }
}
