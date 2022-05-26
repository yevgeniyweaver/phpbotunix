<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskItemTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_item_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->nullable()->unsigned();
            $table->bigInteger('task_type_id')->nullable()->unsigned();
            $table->timestamps();
        });
        //Add foreign keys
        Schema::table('task_item_types', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks')->cascadeOnDelete();
            $table->foreign('task_type_id')->references('id')->on('task_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_item_types');
    }
}
