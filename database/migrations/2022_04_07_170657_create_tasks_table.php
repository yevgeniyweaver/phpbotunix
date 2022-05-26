<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->default(1);
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->bigInteger('priority')->nullable();
            $table->char('title');
            $table->text('description');
            $table->timestamps();
            $table->foreign('status_id')->references('status_id')->on('task_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
