<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleProgrammingLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_programming_language', function (Blueprint $table) {
            $table->unsignedInteger('module_id');
            $table->unsignedInteger('programming_language_id');

            $table->foreign('module_id')
                ->references('id')->on('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('programming_language_id')
                ->references('id')->on('programming_languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['module_id', 'programming_language_id'], 'module_programming_language_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_programming_language');
    }
}
