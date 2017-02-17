<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_requirements', function (Blueprint $table) {
            $table->unsignedInteger('module_id');
            $table->unsignedInteger('required_module_id');
            $table->foreign('module_id')
                ->references('id')->on('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('required_module_id')
                ->references('id')->on('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['module_id', 'required_module_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_requirements');
    }
}
