<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_employee', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('task_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onUpdate('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_employee');
    }
}
